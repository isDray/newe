<?php
// 由於規劃將前台的控制器全部放置於Front之下,所以下面兩行必須存在
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\J_member;
class FrontwebController extends Controller
{
    
    /*--------------------------------------------------------------------------------
    | 2017-07-17 新增前台控制器
    |---------------------------------------------------------------------------------
    | 1. index -> 根據不同的act將使用者導向不同區塊
    | 2. 假設act不存在則應該採取404回應
    |
    */
    public function index( Request $request , $act = 'hindex' ,$type=1,$num=1)
    {   
        
        // 如果act 有對應的funciton,繼續往下做,如果沒有回應404錯誤
        if( method_exists(get_called_class(), $act) ){
            
            return $this->$act( $request , $type ,$num);

        }else{
  
            abort(404);
        }

    }
    // 首頁
    public function hindex($request, $type ,$num){

        return view('index');
    }
    // 關於緯昶
    public function about(){
        
        return view('index');
    }
    // 最新消息
    public function news(){
        
        return view('news');
    }
    public function newsd($request , $type){
        
        return view("newsd.newsd$type");
    }
    // 商品
    public function goods( $request , $type ,$num ){
      
        return view("goods$type");
    }
    // 商品
    public function detail($request , $type ,$num){

        return view("detail.$type.detail$num");
        //return view("detail.$type.detail$num");
    }
    // 知識專區
    public function knowledge(){
        
        return view('index');
    }    
    // 聯絡我們
    public function contacts(){
        
        return view('index');
    }
    // 登入會員
    // 加入我們
    public function join(){
        return view('signup');
    }
    public function joindo($request){
        
        if( $request->isMethod('post') ){
            //var_dump(  $request->all() );
            
            // 開始檢驗
            $this->validate($request, [
                    'account'   => 'required|min:6|max:12',
                    'password'  => 'required|min:6|max:12',
                    'password2' => 'required|min:6|max:12',
                    'sex'       => 'required|in:b,g',
                    'birthday'  => 'required|date',
                    'name'      => 'required',
                    'phone'     => 'required|digits:10',
                    'address'   => 'required',
                    'email'     => 'required|email',
            ]);

            if( $request->input('password') !=  $request->input('password2') ){
                echo json_encode("輸入密碼不一致");
                exit;
            }

            if( $request->sex =='b'){
                $request->sex = 0;
            }else{
                $request->sex = 0;
            }

            $count = J_member::where('account',$request->account)->count();

            if( $count  < 1){

                $J_member = new J_member;
                
                $J_member->account  = $request->account;
                $J_member->password = md5($request->password);
                $J_member->sex      = $request->sex;
                $J_member->birthday = $request->birthday;
                $J_member->name     = $request->name;
                $J_member->phone    = $request->phone;
                $J_member->address  = $request->address;
                $J_member->email    = $request->email;
    
                $J_member->save();
                
                echo json_encode("會員新增成功");
            
            }else{

                echo json_encode("此帳號已經存在"); 
            }
            
        }
    }
    public function join_account(){

        return view('front.join_account');
    }

    public function join_account_do( $request ){

        if( $request->isMethod('post') ){
            var_dump(  $request->all() );

        $data = array(
            'secret' => "6LcVdCkUAAAAALZW9nbQY8V29m0G6SorzfjGsVKm",
            'response' => $_POST['g-recaptcha-response']
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        var_dump($response);


        }
    }
}
