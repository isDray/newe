<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Features_list;
use App\Features_role;
use App\User;
use App\Act_log;

class ActlogController extends Controller
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
    public function index()
    {
        $currentAction = \Route::currentRouteAction();
        list($controller, $method) = explode('@', $currentAction);
        $controller = preg_replace('/.*\\\/', '', $controller); 
        return $controller;
    }

    /*-------------------------------------------------------------------
    | 2017-07-11 行為分配器
    |--------------------------------------------------------------------
    | 依照網址上不同的act參數,將其分配到不同的function執行對應功能
    |
    |
    */ 
    public function act_assign(  Request $request , $act = 'lists')
    {
       return $this->$act( $request );
    }
    
    public function lists(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(3);
        $can   = $this->chk_can();

        if( $mrole == 1){
            
            $act_log = DB::table('act_log')->get();
            return view('actlog.actlog',['act_logs'=>$act_log , 'can'=>$can]);
        }else{
            echo '無權限';
        }
    }
    /*--------------------------------------------------------------------------
    | 2017-07-14 - 回應操作紀錄server端
    |---------------------------------------------------------------------------
    | 1) 判斷有沒有附加條件
    | 
    |
    |
    |
    */
    public function forajax( Request $request ){
        
        // 確認權限
        $this->user = Auth::user();
        $mrole = $this->chk_power(3);
        $can   = $this->chk_can();
        
        // 如果權限吻合才呈現
        if( $mrole == 1){
            
            // 基礎的DB query
            $act_log    = DB::table('act_log');
            // 先取整張表共有幾筆
            $nof_allrec = $act_log->get()->count();
            
            // 如果有其他條件時,增加對應條件
            if( $request->input("search") ){
               
                $act_log->where('user_id', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('ip', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('created_at', 'like', "%".$request->input('search')['value']."%" );
                $act_log->orwhere('log', 'like', "%".$request->input('search')['value']."%" );

            }
            

            switch ($request->input("order")[0]['column']) {
                case '1':
                    $ordertype = 'ip';
                    break;
                case '2':
                    $ordertype = 'log';
                    break;
                case '3':
                    $ordertype = 'created_at';
                    break;
                default:
                    $ordertype = 'user_id';
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
                array_push($tem_arr, $value->user_id);
                array_push($tem_arr, $value->ip);
                array_push($tem_arr, $value->log);
                array_push($tem_arr, $value->created_at);
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
}
