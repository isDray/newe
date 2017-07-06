<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

## 相關Eloquent
use App\Features_list;
use App\Features_role;
use App\User;
class ModController extends Controller
{
    private $user;
    private $nowcontroller;

    public function __construct(){

        $currentAction = \Route::currentRouteAction();
        list($controller, $method) = explode('@', $currentAction);
        $this->nowcontroller = $controller = preg_replace('/.*\\\/', '', $controller); 

    }

    ## 檢測權限
    public function chk_power($wp){
        
        ## 取得現在權限
        if ($this->user->isRole('admin')) {
            $which_role = '1';
        }else if($this->user->isRole('advanced')){
            $which_role = '2';
        }else{
            $which_role = '3';
        }
        ## 取得現在功能
        $nowrole = Features_list::where('features',$this->nowcontroller)->get();
        ## 取得功能id
        $f_id    = $nowrole[0] ->id; 
        $f_power = Features_role::where('features_id',$f_id)->where('role_id',$which_role)->get();
        $mrole   = $f_power[0] ->power;
        $mrole   = explode(',', $mrole)[$wp];
        
        return $mrole;
    }
    public function chk_can(){

        if ($this->user->isRole('admin')) {
            $which_role = '1';
        }else if($this->user->isRole('advanced')){
            $which_role = '2';
        }else{
            $which_role = '3';
        }

        return $can = DB::table('features_role')
                    ->where('role_id',$which_role)
                    ->get();
    }

    ## lists 條列所有功能
    public function lists(){
       
        $this->user = Auth::user();
        $mrole = $this->chk_power(3);
        $can   = $this->chk_can();
        ## mrole 為列表功能
        if( $mrole == 1){
            $data = DB::table('roles')->get();
            return view('mod.mod',['data' => $data , 'can'=>$can]);
        }else{
            echo '無權限';
        }
    }// lists end 

    public function mod_edit($id){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        if( $mrole == 1){
            
            ## 撈出全部功能
            $data = DB::table('features_role')
                  ->leftJoin('features_list', 'features_role.features_id', '=', 'features_list.id')
                  ->where('features_role.role_id','=',$id)
                  ->get();
            
            return view('mod.mod_edit',['data' => $data,'nid'=>$id,'can'=>$can]);


        }else{
            echo '無權限';
        }
    }

    public function mod_edit_do(Request $request,$id){
        
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        if( $mrole == 1){
            ##　取出所有功能

/*

            if( in_array("AccountController",$request->input('f_arr') ) ) {
                echo '有';
            }else{
                echo '沒有';
            }*/
            
            $data = DB::table('features_list')
                  ->leftJoin('features_role', 'features_role.features_id', '=', 'features_list.id')
                  ->where('features_role.role_id','=',$id)
                  ->get();
            

            $temparr;

            foreach ($data  as $key => $value) {
                if( in_array("$value->features",$request->input('f_arr')) ){

                    $temparr = explode(",",$value->power);
                    $temparr[3] = '1';
                    ## 如果1234全為1就把0也改成1
                    if( $temparr[1] == '1' &&
                        $temparr[2] == '1' && 
                        $temparr[3] == '1' && 
                        $temparr[4] == '1'){

                        $temparr[0] = '1';
                    }
                    $enstr = implode(",",$temparr);

                    DB::table('features_role')
                    ->where('features_id', $value->features_id)
                    ->where('role_id', $id)
                    ->update(['power' => $enstr ]);

                }else{
                    $temparr = explode(",",$value->power);
                    $temparr[3] = '0';
                    if( $temparr[1] == '0' &&
                        $temparr[2] == '0' && 
                        $temparr[3] == '0' && 
                        $temparr[4] == '0'){
                        
                        $temparr[0] = '0';
                    }
                    $enstr = implode(",",$temparr);
                    
                    DB::table('features_role')
                    ->where('features_id', $value->features_id)
                    ->where('role_id', $id)
                    ->update(['power' => $enstr ]);
                }
               
            }
            echo json_encode("success");
        }else{
            echo '無權限';
        }
    }
}
