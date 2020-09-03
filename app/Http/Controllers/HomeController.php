<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('changeLanguage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function welcome()
    {   
        if (Auth::check()) {
            return view('home');
        }
        
        return view('welcome');
    }

    public function changeLanguage($language)
    {
        Session::put('website_language', $language);
       
        return back();
    }
}
