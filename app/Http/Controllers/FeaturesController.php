<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

## 相關Eloquent
use App\Features_list;
use App\Features_role;
use App\User;

class FeaturesController extends Controller
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

    ## lists 條列所有功能
    public function lists(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(3);
        ## mrole 為列表功能
        if( $mrole == 1){

            $data = Features_list::all();
            return view('features.features',['data' => $data]);
        }else{
            echo '無權限';
        }
    }// lists end 
    
    ## 新增功能
    public function features_new(){
        
        $this->user = Auth::user();
        $mrole = $this->chk_power(1);
        
        ## mrole 為列表功能
        if( $mrole == 1){
            
            return view('features.features_new');
        }else{
            echo '你沒有該頁面權限';
        }
    }

    public function features_new_do(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(1);
        
        if( $mrole == 1){
                                             
            
            $Features_list = new Features_list;

            $Features_list->name = $_POST['f_name'];
            $Features_list->features = $_POST['f_controller'];
            $Features_list->save();   

           /* $adminRole = \HttpOz\Roles\Models\Role::whereSlug($_POST['acc_role'])->first();
            $admin = \App\User::create([
                'name' => $_POST['acc_name'],
                'email' => $_POST['acc_email'],
                'password' => bcrypt($_POST['acc_passwd'])
            ]);
            $admin->attachRole($adminRole);*/

        }else{

        }
    }

    ## 功能修改
    public function features_edit($id){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);

        if( $mrole == 1){

            $data = Features_list::where('id',$id)->get();
            return view('features.features_edit',['data' => $data]);
        }else{
            echo '無權限';
        }
    }

    public function features_edit_do( Request $request ){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
 

        if( $mrole == 1){
        
            Features_list::where('id',$request->input('f_id'))
                         ->update([ 'name' => $request->input('f_name'),
                                    'features' => $request->input('f_controller') ]);
           
            
        }else{
            echo '無權限';
        }
    }
    
    ## 刪除功能
    public function features_del($id){

        $this->user = Auth::user();
        $mrole = $this->chk_power(4);

        if( $mrole == 1){
            Features_list::where('id', $id)->delete();
        }else{
            echo '無權限';
        }
    }
}
