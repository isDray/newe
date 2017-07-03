<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = Auth::user();

        if ($user->isRole('admin')) {
            $which_role = '1';
        }else if($user->isRole('advanced')){
            $which_role = '2';
        }else{
            $which_role = '3';
        }

        $can = DB::table('features_role')
               ->where('role_id',$which_role)
               ->get();
        
        
        return view('home',['user' => $user,'can'=>$can]);
    }
}
