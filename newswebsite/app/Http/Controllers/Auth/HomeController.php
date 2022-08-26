<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return view('home');
    }



    // public function allUsers()
    // {
    //     dd('Access All Users');
    // }



    public function admin()
    {
        dd('Access Admin ');
    }



    public function author()
    {
        dd('Access only Author');
    }
}
