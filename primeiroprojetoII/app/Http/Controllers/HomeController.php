<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view("welcome");
    }

    public function exemplo()
    {
        return view("exemplo");
    }


    public function home()
    {
        return view("home");
    }

    public function login()
    {
        return view("login");
    }

    public function cadastro()
    {
        return view("cadastro");
    }


}
