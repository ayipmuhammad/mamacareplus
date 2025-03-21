<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nama = Auth::user()->name;
        $email = Auth::user()->email;
        return view('mainpage',compact(['nama','email']));
    }
    public function profil()
    {
        return view('profil');
    }
    
    public function jadwal_im()
    {
        return view('jadwal_im');
    }
}
