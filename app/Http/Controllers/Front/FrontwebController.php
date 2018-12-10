<?php
// 由於規劃將前台的控制器全部放置於Front之下,所以下面兩行必須存在
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\J_member;
use App\Contact;
use App\Wine;
use App\Variety;
use App\Type_manager; 
use App\Origin;
use App\Taste; 
use App\News;
use App\Winery;   
  
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
        
        // 找出要放在首頁的酒
        $wine = Wine::orderBy('created_at')->get();
        $news = News::orderBy('created_at','dsc')->get();
        return view('index',['wines'=>$wine,'news'=>$news]);
    }
    // 關於緯昶
    public function about(){
        
        return view('about');
    }
    // 最新消息
    public function news(){
        $news = News::orderBy('created_at','dsc')->get();
        return view('news',['news'=>$news]);
    }
    public function newsd($request , $type){
        $news = News::where('id',$type)->get();
        return view("newsd",['news'=>$news]);
    }
    // 商品
    public function goods( $request , $type ,$num ){
        if( !empty($type) ){
            
            $nowType = $type;
        }else{
            $nowType = 1;
        }
        $wine  = Wine::where('type',1)->orderBy('created_at')->get();
        $wine2 = Wine::where('type',2)->orderBy('created_at')->get();
        $wine5 = Wine::where('type',5)->orderBy('created_at')->get();
        $type = Type_manager::all(); 
        

        $alvariety = Variety::all();
        $alorigin  = Origin::all();
        $altaste   = Taste::all();
        $altype    = Type_manager::all(); 

        $kvariety = Variety::where('id',$num)->get();
        $kwine    = Wine::inRandomOrder()->where('origin',$num)->first();
            
        $kwine1   = Wine::where('type',1)->where('taste',1)->get();
        $kwine2   = Wine::where('type',1)->where('taste',2)->get();
        $kwine3   = Wine::where('type',1)->where('taste',4)->get();
        $kwine4   = Wine::where('type',1)->where('taste',3)->get();

        $kwine5   = Wine::where('type',2)->where('taste',5)->get();
        $kwine6   = Wine::where('type',2)->where('taste',1)->get();

        $kwine7   = Wine::where('type',5)->where('taste',6)->get();
        $kwine8   = Wine::where('type',5)->where('taste',7)->get();        
        return view("goods",['wines'=>$wine,'wines2'=>$wine2,'wines5'=>$wine5,'types'=>$type,
                                     'altype' => $altype,
                                     'kvariety'=>$kvariety,
                                     'alvariety'=>$alvariety,
                                     'alorigin'=>$alorigin,
                                     'altaste'=>$altaste,
                                     'kwine' => $kwine,
                                     'kwine1'=>$kwine1,
                                     'kwine2'=>$kwine2,
                                     'kwine3'=>$kwine3,
                                     'kwine4'=>$kwine4,
                                     'kwine5'=>$kwine5,
                                     'kwine6'=>$kwine6,
                                     'kwine7'=>$kwine7,
                                     'kwine8'=>$kwine8,
                                     'nowType'=>$nowType
                            ]);
    }
    // 商品詳細
    public function detail($request , $type ,$num){
         
        $wine   = Wine::where('id',$type)->get();
        //echo $wine;
        //echo $wine[0]->origin;
        //echo $wine[0]->variety;
        //echo Origin::select('name')->where('id',$wine[0]->origin)->get();
        $altype = Type_manager::all();
        $winery = Winery::where('id',$wine[0]->winery)->get();

        foreach ($altype as $key => $val) {
            
            $ald[$val->id] =  Wine::where('type',$val->id)->get();
        }

        return view("detail",['wine'=>$wine,'types'=>$altype,'ald'=>$ald,'winery'=>$winery]);
    }
    // 知識專區
    public function knowledge($request , $type ,$num){
        
        $alvariety = Variety::all();
        $alorigin  = Origin::all();
        $altaste   = Taste::all();
        $altype    = Type_manager::all();  
        if($type == 1){

            if($num==1){

                $num = 3;
            }
            $variety = Variety::where('id',$num)->get();

            $wine    = Wine::inRandomOrder()->where('variety',$num)->get();
            
            // 撈出相同品種葡萄酒
            $sameVariety = Wine::where('variety',$num)->get();

            return view("vknowledge",['variety'=>$variety,
                                      'alvariety'=>$alvariety,
                                      'alorigin'=>$alorigin,
                                      'altaste'=>$altaste,
                                      'wine' => $wine,
                                      'sameVarietys'=>$sameVariety
                                    ]);
        }        
        if($type == 2){

            $origin  = Origin::where('id',$num)->get(); 
            $wine    = Wine::inRandomOrder()->where('origin',$num)->get();
            
            // 撈出相同產地葡萄酒
            $sameOrigin = Wine::where('origin',$num)->get();

            return view("knowledge",['origin'=>$origin,
                                     'alvariety'=>$alvariety,
                                     'alorigin'=>$alorigin,
                                     'altaste'=>$altaste,
                                     'wine' => $wine,
                                     'sameOrigins'=>$sameOrigin
                                    ]);
        }
        if($type == 3){
            $variety = Variety::where('id',$num)->get();
            $wine    = Wine::inRandomOrder()->where('origin',$num)->first();
            
            $wine1   = Wine::where('type',1)->where('taste',1)->get();
            $wine2   = Wine::where('type',1)->where('taste',2)->get();
            $wine3   = Wine::where('type',1)->where('taste',4)->get();
            $wine4   = Wine::where('type',1)->where('taste',3)->get();

            $wine5   = Wine::where('type',2)->where('taste',5)->get();
            $wine6   = Wine::where('type',2)->where('taste',1)->get();

            $wine7   = Wine::where('type',5)->where('taste',6)->get();
            $wine8   = Wine::where('type',5)->where('taste',7)->get();
            return view("tknowledge",[
                                     'altype' => $altype,
                                     'variety'=>$variety,
                                     'alvariety'=>$alvariety,
                                     'alorigin'=>$alorigin,
                                     'altaste'=>$altaste,
                                     'wine' => $wine,
                                     'wine1'=>$wine1,
                                     'wine2'=>$wine2,
                                     'wine3'=>$wine3,
                                     'wine4'=>$wine4,
                                     'wine5'=>$wine5,
                                     'wine6'=>$wine6,
                                     'wine7'=>$wine7,
                                     'wine8'=>$wine8,
                                    ]);
        }
        if($type == 4 || $type ==5){

            return view("knowledge.$type.knowledge$num",[
                                     'alvariety'=>$alvariety,
                                     'alorigin'=>$alorigin,
                                     'altaste'=>$altaste,
                                     
                                    ]);
        }

    }    
    // 聯絡我們
    public function contacts(){
        
        return view('contacts');
    }
    public function contactsdo($request){
        if( $request->isMethod('post') ){
            $this->validate($request, [
                    'name'      => 'required|max:20',
                    'phone'     => 'required|digits:10',
                    'email'     => 'required|email',
                    'msg'       => 'required'

            ]);

                $Contact = new Contact;
                $Contact->name     = $request->name;
                $Contact->phone    = $request->phone;
                $Contact->email    = $request->email;
                $Contact->msg      = $request->msg;
                $Contact->save();
                
                echo json_encode("留言成功");

        }

    }
    // 登入會員
    // 加入我們
    public function join(){
        exit;
        $year = date("Y");
        return view('signup',['year'=>$year]);
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
                    'year'      => 'required',
                    'mon'      => 'required',
                    'day'      => 'required',
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
                $request->sex = 1;
            }

            $count = J_member::where('account',$request->account)->count();

            if( $count  < 1){

                $J_member = new J_member;
                
                $J_member->account  = $request->account;
                $J_member->password = md5($request->password);
                $J_member->sex      = $request->sex;
                $J_member->birthday = $request->year.'-'.$request->mon.'-'.$request->day;
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
    public function rule(){
        return view('rule');
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
