<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

## 相關Eloquent
use App\Features_list;
use App\Features_role;
use App\User;

class GrppowerController extends Controller
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
            return view('grppower.grppower',['data' => $data,'can'=>$can]);
        }else{
            echo '無權限';
        }
    }// lists end 

    public function grppower_new(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(1);
        $can   = $this->chk_can();
        ## mrole 為列表功能
        if( $mrole == 1){
            return view('grppower.grppower_new',['can'=>$can]);
        }else{
            echo '沒有權限';
        }
    }

    public function grppower_new_do(Request $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(1);
        $can   = $this->chk_can();
        if( $mrole == 1){

            \HttpOz\Roles\Models\Role::create([
                'name' =>  ucfirst($request->input('grp_name')),
                'slug' => $request->input('grp_name'),
                'description' => $request->input('grp_des'),
            ]);
            $all_Fs = Features_list::all();
            $role_id = DB::table('roles')->where('name',ucfirst($request->input('grp_name')))->get();

            foreach($all_Fs as $all_F){
                
                DB::table('features_role')->insert(
                    ['features_id' => $all_F->id ,
                     'role_id' => $role_id[0]->id,
                     'power' =>  '0,0,0,0,0',
                     'create_date' =>  date("Y-m-d H:i:s"),
                     'upload_date' =>  date("Y-m-d H:i:s")
                    
                ]);
                
            }

        }else{
            echo '沒有權限';
        }
    }
    public function grppower_edit($id){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();
        if( $mrole == 1){
            ## 取出所有權限
            $all_role = DB::table('features_role')->where('role_id',$id)->leftJoin('features_list', 'features_role.features_id', '=', 'features_list.id')->get();
            //var_dump($all_role);
            return view('grppower.grppower_edit',['data' => $all_role,'fcid'=>$id,'can'=>$can]);
            
        }else{
            echo '沒有權限';
        }
    }

    public function grppower_edit_do(Request $request,$id){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();
        if( $mrole == 1){
             
            $all_features = DB::table('features_list')->get();
            
            foreach( $all_features as $nowf){
                echo $request->input($nowf->features);
                echo '<br/>';

                DB::table('features_role')
                ->where('role_id',$id)
                ->where('features_id',$nowf->id)
                ->update(['power' => $request->input($nowf->features)]);
            }
            
        }else{
            echo '沒有權限';
        }
    }
    public function grppower_del($id){
        $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        if( $mrole == 1){
            DB::table('roles')->where('id',$id)->delete();
            DB::table('features_role')->where('role_id',$id)->delete();
        }else{
            echo '沒有權限';
        }
    }
}
