<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

## 相關Eloquent
use App\Features_list;
use App\Features_role;
use App\User;

/*------------------------------------------------------------------------
| 2017-06-29 會員管理功能
|-------------------------------------------------------------------------
| A) 功能列表( function or menu ):
|
|    1. index - 用來取得當下的controller名稱
|    2. lists - 列出當前所有會員
|    3. account_new - 新增會員介面
|    4. account_new_do - 新增會員寫入區域
|
| B) 會員權限與資料庫對照表 :
|
|    全功能|新增|修改|列表|刪除
|    ------+----+----+----+-----
|       0  |  1 |  2 |  3 |  4
|
|
*/
class AccountController extends Controller
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
    public function index()
    {
        $currentAction = \Route::currentRouteAction();
        list($controller, $method) = explode('@', $currentAction);
        $controller = preg_replace('/.*\\\/', '', $controller); 
        return $controller;
    }


    public function lists(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(3);

        ## mrole 為列表功能
        if( $mrole == 1){
            $data = User::all();
            return view('account',['data' => $data]);
        }else{
            echo '無權限';
        }

        
    }// lists end 

    public function account_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(1);
        
        ## mrole 為列表功能
        if( $mrole == 1){
            
            return view('account_new');
        }else{
            echo '你沒有該頁面權限';
        }
    }

    public function account_new_do(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(1);
        
        if( $mrole == 1){
                                                            
            $adminRole = \HttpOz\Roles\Models\Role::whereSlug($_POST['acc_role'])->first();
            $admin = \App\User::create([
                'name' => $_POST['acc_name'],
                'email' => $_POST['acc_email'],
                'password' => bcrypt($_POST['acc_passwd'])
            ]);
            $admin->attachRole($adminRole);

        }else{

        }
    }

    ## 修改會員資料 
    public function account_edit($id){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        if( $mrole == 1){

            $data = User::where('id', $id)->get();
            if ($data[0]->isRole('admin')) {
                $which_role = 'admin';
            }else if($data[0]->isRole('advanced')){
                $which_role = 'advanced';
            }else{
                $which_role = 'general';
            }
            return view('account_edit',['data' => $data,'which_role' => $which_role]);
        }else{
            echo '無權限';
        }
    }

    ## 修改會員實作
    public function account_edit_do(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        if( $mrole == 1){
            ## 首先先取出加密的密碼
            $data = User::where('name', $_POST['acc_name'])->get();

            if( $_POST['acc_passwd'] == $data[0]->password ){
                ## 不改密碼
                
                if ($data[0]->isRole('admin')) {
                    $which_role = 'admin';
                }else if($data[0]->isRole('advanced')){
                    $which_role = 'advanced';
                }else{
                    $which_role = 'general';
                }

                if($which_role == $_POST['acc_role']){
                    $data[0]->update(['name' => $_POST['acc_name'],
                                      'email' => $_POST['acc_email']
                                     ]);
                }else{
                    $data[0]->update(['name' => $_POST['acc_name'],
                                     'email' => $_POST['acc_email']
                                     ]);
                    $data[0]->detachAllRoles();
                    $adminRole = \HttpOz\Roles\Models\Role::whereSlug($_POST['acc_role'])->first();
                    $data[0]->attachRole($adminRole);
                }
            }else{

                ## 改密碼
                if ($data[0]->isRole('admin')) {
                    $which_role = 'admin';
                }else if($data[0]->isRole('advanced')){
                    $which_role = 'advanced';
                }else{
                    $which_role = 'general';
                }

                if($which_role == $_POST['acc_role']){
                    $data[0]->update(['name' => $_POST['acc_name'],
                                      'email' => $_POST['acc_email'],
                                      'password' =>bcrypt($_POST['acc_passwd'])
                                     ]);
                }else{
                    $data[0]->update(['name' => $_POST['acc_name'],
                                     'email' => $_POST['acc_email'],
                                     'password' =>bcrypt($_POST['acc_passwd'])
                                     ]);
                    $data[0]->detachAllRoles();
                    $adminRole = \HttpOz\Roles\Models\Role::whereSlug($_POST['acc_role'])->first();
                    $data[0]->attachRole($adminRole);
                }
            }

        }else{
            echo '無權限';
        }
    }

    ## 會員刪除 
    public function account_del($id){
        $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        if( $mrole == 1){
            $data = User::where('id', $id)->get();
            $data[0]->detachAllRoles();
            $data[0]->delete();
        }else{
            echo '無權限';
        }
    }
}
