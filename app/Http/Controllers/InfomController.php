<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Features_list;
use App\Features_role;
use App\User;
use App\Act_log;  

class InfomController extends Controller
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
    public function page_assign(  Request $request , $act = 'msg'){
       return $this->$act( $request );
    }
    
    public function msg(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $msg = DB::table('contact')->get();
            return view('ifom.actlog',['msg'=>$msg,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        } 
    }
    public function msgforajax( Request $request ){
        // 確認權限
        $this->user = Auth::user();
        $mrole = $this->chk_power(3);
        $can   = $this->chk_can();
        
        // 如果權限吻合才呈現
        if( $mrole == 1){
            
            // 基礎的DB query
            $act_log    = DB::table('contact');
            // 先取整張表共有幾筆
            $nof_allrec = $act_log->get()->count();
            
            // 如果有其他條件時,增加對應條件
            if( $request->input("search") ){
               
                $act_log->where('name', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('email', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('phone', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('msg', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('date', 'like', "%".$request->input('search')['value']."%" );
            }
            

            switch ($request->input("order")[0]['column']) {
                case '1':
                    $ordertype = 'email';
                    break;
                case '2':
                    $ordertype = 'phone';
                    break;
                case '3':
                    $ordertype = 'msg';
                    break;
                case '4':
                    $ordertype = 'date';
                    break;
                default:
                    $ordertype = 'name';
                    break;
            }
           

            $total   = $act_log->get()->count();
            $act_log->orderBy("$ordertype",$request->input("order")[0]['dir']);

            $act_log->offset(  $request->input('start')  )
                    ->limit(   $request->input('length') );
            
            /*
            $act_log->offset(  $request->input('start')  )
                    ->limit(   $request->input('length') );
            */
            
            $act_log = $act_log->get();
            

            $myd = array( "draw" => $request->input('draw'),
                          "recordsTotal" =>$nof_allrec,
                          "recordsFiltered" =>$total,
                        );
            
            $myd2 = array();

            
            foreach ($act_log as $key => $value) {
                
                $tem_arr = array();
                array_push($tem_arr, $value->name);
                array_push($tem_arr, $value->email);
                array_push($tem_arr, $value->phone);
                array_push($tem_arr, $value->msg);
                array_push($tem_arr, $value->date);
                array_push($myd2,$tem_arr);
            }

            $myd['data'] =$myd2; 
        
            echo json_encode($myd);
        }else{
            echo '無權限';
        }
        /*$act_log = json_encode(array('data' =>$act_log));
        echo $act_log;*/
        //var_dump( $act_log );
        //var_dump( json_encode($act_log) );

    }
    public function jmbr(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $msg = DB::table('j_member')->get();
            return view('ifom.actlog2',['msg'=>$msg,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        } 
    }
    public function jmbrforajax( Request $request ){
        // 確認權限
        $this->user = Auth::user();
        $mrole = $this->chk_power(3);
        $can   = $this->chk_can();
        
        // 如果權限吻合才呈現
        if( $mrole == 1){
            
            // 基礎的DB query
            $act_log    = DB::table('j_member');
            // 先取整張表共有幾筆
            $nof_allrec = $act_log->get()->count();
            
            // 如果有其他條件時,增加對應條件
            if( $request->input("search") ){
               
                $act_log->where('name', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('email', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('phone', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('sex', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('address', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('phone', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('birthday', 'like', "%".$request->input('search')['value']."%");

            }
            

            switch ($request->input("order")[0]['column']) {
                case '1':
                    $ordertype = 'sex';
                    break;
                case '2':
                    $ordertype = 'email';
                    break;
                case '3':
                    $ordertype = 'phone';
                    break;
                case '4':
                    $ordertype = 'birthday';
                    break;
                case '5':
                    $ordertype = 'address';
                    break;                    
                default:
                    $ordertype = 'name';
                    break;
            }
           

            $total   = $act_log->get()->count();
            $act_log->orderBy("$ordertype",$request->input("order")[0]['dir']);

            $act_log->offset(  $request->input('start')  )
                    ->limit(   $request->input('length') );
            
            /*
            $act_log->offset(  $request->input('start')  )
                    ->limit(   $request->input('length') );
            */
            
            $act_log = $act_log->get();
            

            $myd = array( "draw" => $request->input('draw'),
                          "recordsTotal" =>$nof_allrec,
                          "recordsFiltered" =>$total,
                        );
            
            $myd2 = array();

            
            foreach ($act_log as $key => $value) {
                if($value->sex ==0){
                    $tmsex = '男';
                }else{
                    $tmsex = '女';
                }
                $tem_arr = array();
                array_push($tem_arr, $value->name);
                array_push($tem_arr, $tmsex); 
                array_push($tem_arr, $value->email);
                array_push($tem_arr, $value->phone);
                array_push($tem_arr, $value->birthday);
                array_push($tem_arr, $value->address);                                

                array_push($myd2,$tem_arr);
            }

            $myd['data'] =$myd2; 
        
            echo json_encode($myd);
        }else{
            echo '無權限';
        }
        /*$act_log = json_encode(array('data' =>$act_log));
        echo $act_log;*/
        //var_dump( $act_log );
        //var_dump( json_encode($act_log) );

    }        
    public function index()
    {
        //
    }


}
