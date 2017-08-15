<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Features_list;
use App\Features_role;
use App\User;
use App\Act_log;

/*--------------------------------------------------------------------------------
| 2017-08-14 : EditController 前台編輯器
|---------------------------------------------------------------------------------
|
|
*/
class EditController extends Controller
{

    private $user;
    private $nowcontroller;
    
    // 取得當下的控制器名稱
    public function __construct(){
        $currentAction = \Route::currentRouteAction();
        list($controller, $method) = explode('@', $currentAction);
        $this->nowcontroller = $controller = preg_replace('/.*\\\/', '', $controller); 
    }
    
    // 檢查權限
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
    
    // 行為分配器
    public function page_assign(  Request $request , $act = 'home'){
       
       return $this->$act( $request );
    }
    
    // 修改首頁相關,需要有修改權限(2)
    public function home(){
        
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
        
            return view('edit.home',['can'=>$can]);
        }else{

        }
    }
    public function index()
    {
        //
    }

    
}
