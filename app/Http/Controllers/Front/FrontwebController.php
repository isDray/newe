<?php
// 由於規劃將前台的控制器全部放置於Front之下,所以下面兩行必須存在
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FrontwebController extends Controller
{
    
    /*--------------------------------------------------------------------------------
    | 2017-07-17 新增前台控制器
    |---------------------------------------------------------------------------------
    | 1. index -> 根據不同的act將使用者導向不同區塊
    | 2. 假設act不存在則應該採取404回應
    |
    */
    public function index( Request $request , $act = 'home')
    {   
        
        // 如果act 有對應的funciton,繼續往下做,如果沒有回應404錯誤
        if( method_exists(get_called_class(), $act) ){
            
            return $this->$act( $request );
        
        }else{
  
            abort(404);
        }

    }
    
    public function home(){
        
        return view('front.app');
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
