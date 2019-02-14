<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Grafika\Grafika;
use Storage;
use File;
use App\Features_list;
use App\Features_role;
use App\User;
use App\Act_log;       
use App\Type_manager;  // 葡萄酒種表
use App\Variety;       // 葡萄品種表
use App\Origin;        // 產地表
use App\Taste;         // 口感表
use App\Winery;        // 酒莊表
use App\Wine;
use App\News;          
use Image;


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
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    // 2017-08-22 商品類別管理
    public function type_manager(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $Type_manager = Type_manager::all();
            return view('edit.type_manager',['Type_manager'=> $Type_manager,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function type_manager_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            return view('edit.type_manager_new',['can'=>$can]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function type_manager_new_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            $this->validate($request, [
                'typename' => 'required',
            ]);
            
             $Type_manager = new Type_manager;
             $Type_manager->name   = $request->typename;
             $Type_manager->status = $request->status;
             
             if( $Type_manager->save() ){
                 echo json_encode('success');
             }else{
                 echo json_encode('err');
             }

        }else{
            echo json_encode('err');
        }

    }
    public function type_manager_edit( $request ){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            // 由資料庫取出資料
            $tmdata = Type_manager::where('id',$request->id)->get();
            
            return view('edit.type_manager_edit',['can'=>$can,'tmdata'=>$tmdata]);
        
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }

    }
    public function type_manager_edit_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            $this->validate($request, [
                'typename' => 'required',
            ]);
            
            $Type_manager = Type_manager::find($request->id);
            $Type_manager ->name = $request->typename;
            $Type_manager ->status = $request->status;
             
             if( $Type_manager->save() ){
                 echo json_encode('success');
             }else{
                 echo json_encode('err');
             }

        }else{
            echo json_encode('err');
        }

    }
    public function type_manager_del($request){
                $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            
            $Type_manager = Type_manager::find($request->id);
 
            if( $Type_manager->delete() ){
                echo json_encode('success');
            }else{
                echo json_encode('err');
            }

        }else{
            echo json_encode('err');
        }
    }
    /*--------------------------------------------------------------------------------
     |葡萄品種區塊
     ---------------------------------------------------------------------------------*/
    public function variety_manager(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            $variety = Variety::orderBy('sort')
            ->get();

            return view('edit.variety_manager',['variety_manager'=>$variety,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function variety_manager_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            return view('edit.variety_manager_new',['can'=>$can]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }

    public function variety_manager_new_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            // 驗證全部都有填寫
            $this->validate($request, [
                'typename' => 'required',
                'des'      => 'required',
                'sort'     => 'required|min:0',
                'status'   => 'required|between:0,1',
            ]);

                     
            $Variety = new Variety;
            $Variety->name         = $request->typename;
            $Variety->status       = $request->status;
            $Variety->sort         = $request->sort;
            $Variety->description  = $request->des;
            $Variety->pic_name     = '';//這時候還不知道先留空

            if( $Variety->save() ){

                if ($request->hasFile('import_file')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file' =>'image'
                ]);
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "filename.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/variety/".$Variety->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'variety/'.$Variety->id.'.'.$extension);
                    $o_n_path   = public_path('image/variety/'.$Variety->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/variety/v_'.$Variety->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'variety/'.$Variety->id.'.'.$extension);
                    $o_n_path   = public_path('image/variety/'.$Variety->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/variety/v_'.$Variety->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
                }
                
                $Variety_addpic = Variety::find($Variety->id);
                $Variety_addpic->pic_name   = "v_$Variety->id.$extension";             
                
                if( $Variety_addpic->save() ){
                    echo json_encode('success');
                }else{
                    echo json_encode('err');  
                }

            }else{
                echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }    
    }

    public function variety_manager_edit( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            $variety = Variety::where('id',$request->id)->get();
            return view('edit.variety_manager_edit',['variety_manager'=>$variety,'can'=>$can]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function variety_manager_edit_do( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            //var_dump($request->all());
            //var_dump($request->import_file);

            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file')) {

                
                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file' =>'image'
                ]);
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "filename.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/variety/$request->id.$extension");
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'variety/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/variety/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/variety/v_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'variety/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/variety/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/variety/v_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }
            
            $this->validate($request, [
                'typename' => 'required',
                'des'      => 'required',
                'sort'     => 'required|min:0',
                'status'   => 'required|between:0,1',
            ]);

            $Variety = Variety::find($request->id);
            $Variety->name         = $request->typename;
            $Variety->status       = $request->status;
            $Variety->sort         = $request->sort;
            $Variety->description  = $request->des;
            if ($request->hasFile('import_file')) {
                $Variety->pic_name     = "v_$request->id.$extension";
            }
            if( $Variety->save() ){
                echo json_encode('success');
            }else{
                 echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }

    public function variety_manager_del($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            
            $variety = Variety::find($request->id);
 
            if( $variety->delete() ){
                echo json_encode('success');
            }else{
                echo json_encode('err');
            }

        }else{
            echo json_encode('err');
        }
    }
    /*-----------------------------------------------------------------------------------
    | 產地管理
    ------------------------------------------------------------------------------------*/
    public function origin_manager(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            $origin = Origin::orderBy('sort')
            ->get();
            
            return view('edit.origin_manager',['origin_manager'=>$origin,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    // 新增產地
    public function origin_manager_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            return view('edit.origin_manager_new',['can'=>$can]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }

    public function origin_manager_new_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            // 驗證全部都有填寫
            $this->validate($request, [
                'typename' => 'required',
                'des'      => 'required',
                'sort'     => 'required|min:0',
                'status'   => 'required|between:0,1',
            ]);

                     
            $Origin = new Origin;
            $Origin->name         = $request->typename;
            $Origin->status       = $request->status;
            $Origin->sort         = $request->sort;
            $Origin->description  = $request->des;
            $Origin->pic_name     = '';//這時候還不知道先留空

            if( $Origin->save() ){

                if ($request->hasFile('import_file')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file' =>'image'
                ]);
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "filename.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/origin/".$Origin->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'origin/'.$Origin->id.'.'.$extension);
                    $o_n_path   = public_path('image/origin/'.$Origin->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/origin/o_'.$Origin->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'origin/'.$Origin->id.'.'.$extension);
                    $o_n_path   = public_path('image/origin/'.$Origin->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/origin/o_'.$Origin->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
                }
                
                $Origin_addpic = Origin::find($Origin->id);
                $Origin_addpic->pic_name   = "o_$Origin->id.$extension";             
                
                if( $Origin_addpic->save() ){
                    echo json_encode('success');
                }else{
                    echo json_encode('err');  
                }

            }else{
                echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }    
    }
    // 修改產地
    public function origin_manager_edit( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $origin = Origin::where('id',$request->id)->get();
            return view('edit.origin_manager_edit',['origin_manager'=>$origin,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }

    public function origin_manager_edit_do( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            //var_dump($request->all());
            //var_dump($request->import_file);
            
            
            
            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file')) {

                
                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file' =>'image'
                ]);
                
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "filename.$extension");
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */                                                       
                $directoryPath = public_path("image/origin/$request->id.$extension");
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'origin/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/origin/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/origin/o_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'origin/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/origin/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 300);
                    $f_n_path   = public_path('image/origin/o_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }
            
            $this->validate($request, [
                'typename' => 'required',
                'des'      => 'required',
                'sort'     => 'required|min:0',
                'status'   => 'required|between:0,1',
            ]);

            $Origin = Origin::find($request->id);
            $Origin->name         = $request->typename;
            $Origin->status       = $request->status;
            $Origin->sort         = $request->sort;
            $Origin->description  = $request->des;
            if ($request->hasFile('import_file')) {
                $Origin->pic_name     = "o_$request->id.$extension";
            }
            if( $Origin->save() ){
                echo json_encode('success');
            }else{
                 echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function origin_manager_del($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            
            $variety = Origin::find($request->id);
 
            if( $variety->delete() ){
                echo json_encode('success');
            }else{
                echo json_encode('err');
            }

        }else{
            echo json_encode('err');
        }
    }
    /*-------------------------------------------------------------------------------------
    | 口感管理
    --------------------------------------------------------------------------------------*/    
    public function taste_manager(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $Taste_manager = Taste::all();
            return view('edit.taste_manager',['Taste_manager'=> $Taste_manager,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function taste_manager_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            return view('edit.taste_manager_new',['can'=>$can]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function taste_manager_new_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            $this->validate($request, [
                'typename' => 'required',
            ]);
            
             $Taste = new Taste;
             $Taste->name   = $request->typename;
             $Taste->status = $request->status;
             
             if( $Taste->save() ){
                 echo json_encode('success');
             }else{
                 echo json_encode('err');
             }

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }

    }        
    public function taste_manager_edit( $request ){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            // 由資料庫取出資料
            $tmdata = Taste::where('id',$request->id)->get();
            
            return view('edit.taste_manager_edit',['can'=>$can,'tmdata'=>$tmdata]);
        
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }

    }
    public function taste_manager_edit_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            $this->validate($request, [
                'typename' => 'required',
            ]);
            
            $Taste = Taste::find($request->id);
            $Taste ->name   = $request->typename;
            $Taste ->status = $request->status;
             
             if( $Taste->save() ){
                 echo json_encode('success');
             }else{
                 echo json_encode('err');
             }

        }else{
            echo json_encode('err');
        }

    }   
    public function taste_manager_del($request){
                $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            
            $Taste_manager = Taste::find($request->id);
 
            if( $Taste_manager->delete() ){
                echo json_encode('success');
            }else{
                echo json_encode('err');
            }

        }else{
            echo json_encode('err');
        }
    }
    /*--------------------------------------------------------------------------------
    | 酒廠管理
    ----------------------------------------------------------------------------------*/     
    public function winery_manager(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $winery = Winery::orderBy('sort')->get();
            return view('edit.winery_manager',['winery_manager'=>$winery,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function winery_manager_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            return view('edit.winery_manager_new',['can'=>$can]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function winery_manager_new_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            // 驗證全部都有填寫
            $this->validate($request, [
                'typename' => 'required',
                'des'      => 'required',
                'sort'     => 'required|min:0',
                'status'   => 'required|between:0,1',
            ]);

                     
            $Winery = new Winery;
            $Winery->name         = $request->typename;
            $Winery->status       = $request->status;
            $Winery->sort         = $request->sort;
            $Winery->description  = $request->des;
            $Winery->pic_name     = '';//這時候還不知道先留空
            $Winery->pic_name2     = '';//這時候還不知道先留空

            if( $Winery->save() ){

                if ($request->hasFile('import_file')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file'  =>'image'
                ]);
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "filename.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/winery/".$Winery->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'winery/'.$Winery->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery/'.$Winery->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(120, 120);
                    $f_n_path   = public_path('image/winery/w_'.$Winery->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'winery/'.$Winery->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery/'.$Winery->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(120, 120);
                    $f_n_path   = public_path('image/winery/w_'.$Winery->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
                }

                if ($request->hasFile('import_file2')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file2'  =>'image'
                ]);
                
                $extension = $request->import_file2->extension();
                $path      = $request->import_file2->storeAs('image', "filename2.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/winery2/".$Winery->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'winery2/'.$Winery->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery2/'.$Winery->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 200);
                    $f_n_path   = public_path('image/winery2/w_'.$Winery->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'winery2/'.$Winery->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery2/'.$Winery->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 200);
                    $f_n_path   = public_path('image/winery2/w_'.$Winery->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
                }                
                
                if ($request->hasFile('import_file3')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file3'  =>'image'
                ]);
                
                $extension = $request->import_file3->extension();
                $path      = $request->import_file3->storeAs('image', "filename3.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/winery3/".$Winery->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'winery3/'.$Winery->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery3/'.$Winery->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 200);
                    $f_n_path   = public_path('image/winery3/w_'.$Winery->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'winery3/'.$Winery->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery3/'.$Winery->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 200);
                    $f_n_path   = public_path('image/winery3/w_'.$Winery->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
                }                 
                $Winery_addpic = Winery::find($Winery->id);
                $Winery_addpic->pic_name    = "w_$Winery->id.$extension";
                $Winery_addpic->pic_name2   = "w_$Winery->id.$extension";                
                $Winery_addpic->pic_name3   = "w_$Winery->id.$extension";
                
                if( $Winery_addpic->save() ){
                    echo json_encode('success');
                }else{
                    echo json_encode('err');  
                }

            }else{
                echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }    
    }
    public function winery_manager_edit( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $winery = Winery::where('id',$request->id)->get();
            $img1 = public_path('image/winery/'.$winery[0]->pic_name);
            $img2 = public_path('image/winery2/'.$winery[0]->pic_name2);
            $img3 = public_path('image/winery3/'.$winery[0]->pic_name3);
            return view('edit.winery_manager_edit',['winery_manager'=>$winery,
                                                    'can'=>$can ,
                                                    'img1'=>$img1,
                                                    'img2'=>$img2,
                                                    'img3'=>$img3]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function winery_manager_edit_do( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();
        

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            
            
            
            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file')) {

                
                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file' =>'image'
                ]);
                
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "filename.$extension");
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */                                                       
                $directoryPath = public_path("image/winery/$request->id.$extension");
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'winery/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(120, 120);
                    $f_n_path   = public_path('image/winery/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'winery/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/winery/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(120, 120);
                    $f_n_path   = public_path('image/winery/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }

            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file2')) {

                
                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file2' =>'image'
                ]);
                
                
                $extension2 = $request->import_file2->extension();
                $path       = $request->import_file2->storeAs('image', "filename2.$extension2");
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */                                                       
                $directoryPath = public_path("image/winery2/$request->id.$extension2");
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'winery2/'.$request->id.'.'.$extension2);
                    $o_n_path   = public_path('image/winery2/'.$request->id.'.'.$extension2);
                    $img        = Image::make($o_n_path)->resize(300, 200);
                    $f_n_path   = public_path('image/winery2/w_'.$request->id.'.'.$extension2);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'winery2/'.$request->id.'.'.$extension2);
                    $o_n_path   = public_path('image/winery2/'.$request->id.'.'.$extension2);
                    $img        = Image::make($o_n_path)->resize(300, 200);
                    $f_n_path   = public_path('image/winery2/w_'.$request->id.'.'.$extension2);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }            

            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file3')) {

                
                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file3' =>'image'
                ]);
                
                
                $extension3 = $request->import_file3->extension();
                $path       = $request->import_file3->storeAs('image', "filename3.$extension3");
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */                                                       
                $directoryPath = public_path("image/winery3/$request->id.$extension3");
                
                if(File::exists($directoryPath)){
                    
                    
                    File::delete($directoryPath);
                    Storage::move($path,'winery3/'.$request->id.'.'.$extension3);
                    $o_n_path   = public_path('image/winery3/'.$request->id.'.'.$extension3);
                    $img        = Image::make($o_n_path);
                    $f_n_path   = public_path('image/winery3/w_'.$request->id.'.'.$extension3);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    
                    
                    Storage::move($path,'winery3/'.$request->id.'.'.$extension3);
                    $o_n_path   = public_path('image/winery3/'.$request->id.'.'.$extension3);
                    $img        = Image::make($o_n_path);
                    $f_n_path   = public_path('image/winery3/w_'.$request->id.'.'.$extension3);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }            
            $this->validate($request, [
                'typename' => 'required',
                'des'      => 'required',
                'sort'     => 'required|min:0',
                'status'   => 'required|between:0,1',
            ]);

            $Winery = Winery::find($request->id);
            $Winery->name         = $request->typename;
            $Winery->status       = $request->status;
            $Winery->sort         = $request->sort;
            $Winery->description  = $request->des;

            if ($request->hasFile('import_file')) {
                $Winery->pic_name     = "w_$request->id.$extension";
            }

            if ($request->hasFile('import_file2')) {
                $Winery->pic_name2    = "w_$request->id.$extension2";
            }
            if ($request->hasFile('import_file3')) {
                $Winery->pic_name3    = "w_$request->id.$extension3";
            }            

            if( $Winery->save() ){
                echo json_encode('success');
            }else{
                 echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function winery_manager_del($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            
            $Winery_manager = Winery::find($request->id);
 
            if( $Winery_manager->delete() ){
                echo json_encode('success');
            }else{
                echo json_encode('err');
            }

        }else{
            echo json_encode('err');
        }
    }
    /*---------------------------------------------------------------------------------
     | 酒品上架
     ---------------------------------------------------------------------------------*/
    public function wine_manager(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $wine = Wine::orderBy('created_at')->get();

            return view('edit.wine_manager',['wine_manager'=>$wine,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function wine_manager_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            $wine_type   = Type_manager::orderBy('id')->get();
            $grape_type  = Variety::orderBy('sort')->get();
            $origin_type = Origin::orderBy('sort')->get();
            $winery_type = Winery::orderBy('sort')->get();
            $taste_type = Taste::get();
            
            return view('edit.wine_manager_new',['can'=>$can,
                                                 'wine_type'=>$wine_type,
                                                 'grape_type'=>$grape_type,
                                                 'origin_type'=>$origin_type,
                                                 'winery_type'=>$winery_type,
                                                 'taste_type'=>$taste_type
                                                ]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function wine_manager_new_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            //驗證表單確實填寫
            $this->validate($request, [
                'typename'    =>'required',
                'wine_type'   =>'required',
                'grape_type'  =>'required',
                'ori_type'    =>'required',
                'winery_type' =>'required',
                'taste_type'  =>'required',
                'detail'      =>'required',
                'import_file' =>'required|image',
                'sortdes'     =>'required',
                'des'         =>'required',
                'status'      =>'required|between:0,1',
            ]);

            $Wine = new Wine;
            $Wine->name         = $request->typename;
            $Wine->type         = $request->wine_type;
            $Wine->variety      = $request->grape_type;
            $Wine->origin       = $request->ori_type;
            $Wine->taste        = $request->taste_type;
            $Wine->winery       = $request->winery_type;
            $Wine->sortdes      = $request->sortdes;
            $Wine->des          = $request->des;
            $Wine->detail       = $request->detail;
            $Wine->pic          = '';
            $Wine->status       = $request->status;
            $Wine->sort         = $request->sort;

            if( $Wine->save() ){

                if ($request->hasFile('import_file')) {
        
                $extension  = $request->import_file->extension();
                $path       = $request->import_file->storeAs('image', "wine.$extension");
                $path2      = $request->import_file->storeAs('image', "wine2.$extension");
                $path3      = $request->import_file->storeAs('image', "wine3.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/wine/small/".$Wine->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'wine/small/'.$Wine->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/small/'.$Wine->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(98, 260);
                    $f_n_path   = public_path('image/wine/small/w_'.$Wine->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'wine/small/'.$Wine->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/small/'.$Wine->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(98, 260);
                    $f_n_path   = public_path('image/wine/small/w_'.$Wine->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }

                //mid
                $directoryPath = public_path("image/wine/mid/".$Wine->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path2,'wine/mid/'.$Wine->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/mid/'.$Wine->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(180, 430);
                    $f_n_path   = public_path('image/wine/mid/w_'.$Wine->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path2,'wine/mid/'.$Wine->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/mid/'.$Wine->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(180, 430);
                    $f_n_path   = public_path('image/wine/mid/w_'.$Wine->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }

                //large                                
                $directoryPath = public_path("image/wine/large/".$Wine->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path3,'wine/large/'.$Wine->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/large/'.$Wine->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(210, 510);
                    $f_n_path   = public_path('image/wine/large/w_'.$Wine->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path3,'wine/large/'.$Wine->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/large/'.$Wine->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(210, 510);
                    $f_n_path   = public_path('image/wine/large/w_'.$Wine->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }

                }
             
                
                $Wine_addpic = Wine::find($Wine->id);
                $Wine_addpic->pic    = "w_$Wine->id.$extension";

                if( $Wine_addpic->save() ){
                    echo json_encode('success');
                }else{
                    echo json_encode('err');  
                }

            }else{
                echo json_encode('err');
            }            



        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }

    public function wine_manager_edit( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            $wine_type   = Type_manager::orderBy('id')->get();
            $grape_type  = Variety::orderBy('sort')->get();
            $origin_type = Origin::orderBy('sort')->get();
            $winery_type = Winery::orderBy('sort')->get();
            $taste_type  = Taste::get();
            
            $wine = Wine::where('id',$request->id)->get();
            return view('edit.wine_manager_edit',['wine_manager'=>$wine,
                                                  'can'=>$can,
                                                  'wine_type'=>$wine_type,
                                                  'grape_type'=>$grape_type,
                                                  'origin_type'=>$origin_type,
                                                  'winery_type'=>$winery_type,
                                                  'taste_type'=>$taste_type    
                                                 ]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function wine_manager_edit_do( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file')) {


                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file' =>'image'
                ]);
                
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "wine.$extension");
                $path2     = $request->import_file->storeAs('image', "wine2.$extension");
                $path3     = $request->import_file->storeAs('image', "wine3.$extension");
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */                                                       
                $directoryPath = public_path("image/wine/small/".$request->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'wine/small/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/small/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(98, 260);
                    $f_n_path   = public_path('image/wine/small/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'wine/small/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/small/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(98, 260);
                    $f_n_path   = public_path('image/wine/small/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }

                //mid
                $directoryPath = public_path("image/wine/mid/".$request->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path2,'wine/mid/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/mid/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(180, 430);
                    $f_n_path   = public_path('image/wine/mid/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path2,'wine/mid/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/mid/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(180, 430);
                    $f_n_path   = public_path('image/wine/mid/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }

                //large                                
                $directoryPath = public_path("image/wine/large/".$request->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path3,'wine/large/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/large/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(210, 510);
                    $f_n_path   = public_path('image/wine/large/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path3,'wine/large/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/wine/large/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(210, 510);
                    $f_n_path   = public_path('image/wine/large/w_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }

            $this->validate($request, [
                'typename'    =>'required',
                'wine_type'   =>'required',
                'grape_type'  =>'required',
                'ori_type'    =>'required',
                'winery_type' =>'required',
                'taste_type'  =>'required',
                'detail'      =>'required',
                'sortdes'     =>'required',
                'des'         =>'required',
                'status'      =>'required|between:0,1',
            ]);

            $Wine = Wine::find($request->id);
            $Wine->name         = $request->typename;
            $Wine->type         = $request->wine_type;
            $Wine->variety      = $request->grape_type;
            $Wine->origin       = $request->ori_type;
            $Wine->taste        = $request->taste_type;
            $Wine->winery       = $request->winery_type;
            $Wine->sortdes      = $request->sortdes;
            $Wine->des          = $request->des;
            $Wine->detail       = $request->detail;
            $Wine->status       = $request->status;
            $Wine->sort         = $request->sort;            

            if ($request->hasFile('import_file')) {
                $Wine->pic    = "w_$request->id.$extension";
            }
            if( $Wine->save() ){
                echo json_encode('success');
            }else{
                 echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function wine_manager_del($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            
            $Wine_manager = Wine::find($request->id);
 
            if( $Wine_manager->delete() ){
                echo json_encode('success');
            }else{
                echo json_encode('err');
            }

        }else{
            echo json_encode('err');
        }
    } 
    /*-----------------------------------------------------------------------
    | 最新消息區塊
    ---------------------------------------------------------------------------*/
    public function news_manager(){

        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $news = News::orderBy('created_at')->get();

            return view('edit.news_manager',['news_manager'=>$news,'can'=>$can]);

        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }   
    public function news_manager_new(){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            return view('edit.news_manager_new',['can'=>$can]);
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }        
    public function news_manager_new_do($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            

            // 驗證全部都有填寫
            $this->validate($request, [
                'typename' => 'required',
                'actime'   => 'required',
                'address'  => 'required',
                'des'      => 'required',
                'status'   => 'required|between:0,1',
                'import_file' => 'required|image',
                'import_file2' => 'required|image',
            ]);

                     
            $News = new News;
            $News->name         = $request->typename;
            $News->actime       = $request->actime;
            $News->address      = $request->address;
            $News->des          = $request->des;
            if($request->exists('stalls')){
                $News->stalls   = $request->stalls;
            }
            $News->status       = $request->status;      
            $News->banner       = '';//這時候還不知道先留空
            $News->pic          = '';//這時候還不知道先留空

            if( $News->save() ){

                if ($request->hasFile('import_file')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file'  =>'image'
                ]);
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "newsbanner.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/news/".$News->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'news/banner/'.$News->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/banner/'.$News->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(1170, 500);
                    $f_n_path   = public_path('image/news/banner/b_'.$News->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'news/banner/'.$News->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/banner/'.$News->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(1170,500);
                    $f_n_path   = public_path('image/news/banner/b_'.$News->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
                }

                if ($request->hasFile('import_file2')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file2'  =>'image'
                ]);
                
                $extension = $request->import_file2->extension();
                $path      = $request->import_file2->storeAs('image', "newspic.$extension");
                
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */
                $directoryPath = public_path("image/news/pic/".$News->id.'.'.$extension);
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'news/pic/'.$News->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/pic/'.$News->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 255);
                    $f_n_path   = public_path('image/news/pic/n_'.$News->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'news/pic/'.$News->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/pic/'.$News->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 255);
                    $f_n_path   = public_path('image/news/pic/n_'.$News->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
                }                
                
                $News_addpic = News::find($News->id);
                $News_addpic->banner    = "b_$News->id.$extension";
                $News_addpic->pic       = "n_$News->id.$extension";                
                
                if( $News_addpic->save() ){
                    echo json_encode('success');
                }else{
                    echo json_encode('err');  
                }

            }else{
                echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }    
    }
    public function news_manager_edit( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            $news = News::where('id',$request->id)->get();
           

            $ct = date("Y-m-d\TH:i:s", strtotime($news[0]->actime));
           //echo date_format($news[0]->actime, 'Y-m-d H:i:s');

            return view('edit.news_manager_edit',['news_manager'=>$news,'can'=>$can,'ct'=>$ct ]);

        }else{

        }
    }
    public function news_manager_edit_do( $request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(2);
        $can   = $this->chk_can();

        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){

            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file')) {

                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file' =>'image'
                ]);
                
                
                $extension = $request->import_file->extension();
                $path      = $request->import_file->storeAs('image', "newsbanner.$extension");
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */                                                       
                $directoryPath = public_path("image/news/banner/$request->id.$extension");
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'news/banner/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/banner/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(1170, 500);
                    $f_n_path   = public_path('image/news/banner/b_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'news/banner/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/banner/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(1170, 500);
                    $f_n_path   = public_path('image/news/banner/b_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }

            // 判斷圖片是否有接收到
            if ($request->hasFile('import_file2')) {

                
                // 如果有接收到檔案,驗證他是圖片
                $this->validate($request, [
                   'import_file2' =>'image'
                ]);
                
                
                $extension2 = $request->import_file2->extension();
                $path      = $request->import_file2->storeAs('image', "newspic.$extension");
                /* 判斷要上傳的圖檔是否存在:
                       
                    存在   -> 刪除後上傳
                    不存在 -> 直接上傳
                 
                */                                                       
                $directoryPath = public_path("image/news/pic/$request->id.$extension");
                
                if(File::exists($directoryPath)){

                    File::delete($directoryPath);
                    Storage::move($path,'news/pic/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/pic/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 255);
                    $f_n_path   = public_path('image/news/pic/n_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);

                }else{
                    Storage::move($path,'news/pic/'.$request->id.'.'.$extension);
                    $o_n_path   = public_path('image/news/pic/'.$request->id.'.'.$extension);
                    $img        = Image::make($o_n_path)->resize(300, 255);
                    $f_n_path   = public_path('image/newspic/n_'.$request->id.'.'.$extension);
                    $img->save($f_n_path);
                    File::delete($o_n_path);
                }
                
            }            
            
            $this->validate($request, [
                'typename' => 'required',
                'actime'   => 'required',
                'address'  => 'required',
                'des'      => 'required',
                'status'   => 'required|between:0,1',
            ]);

            $News = News::find($request->id);
            $News->name         = $request->typename;
            $News->actime       = $request->actime; 
            $News->address      = $request->address;
            $News->des          = $request->des;
            if($request->exists('stalls')){
                $News->stalls   = $request->stalls;
            }
            $News->status       = $request->status;      

            if ($request->hasFile('import_file')) {
                $News->banner     = "b_$request->id.$extension";
            }

            if ($request->hasFile('import_file2')) {
                $News->pic    = "n_$request->id.$extension2";
            }
            if( $News->save() ){
                echo json_encode('success');
            }else{
                 echo json_encode('err');
            }
            
        }else{
            echo '你沒有該頁面權限,請洽管理人員';
        }
    }
    public function news_manager_del($request){
        $this->user = Auth::user();
        $mrole = $this->chk_power(4);
        $can   = $this->chk_can();
        // 如果$mrole == 1,表示有對應權限時才導向該頁面
        if( $mrole == 1){
            
            
            $News_manager = News::find($request->id);
 
            if( $News_manager->delete() ){
                echo json_encode('success');
            }else{
                echo json_encode('err');
            }

        }else{
            echo json_encode('err');
        }
    }                             
    public function index()
    {
        //
    }

    
}
