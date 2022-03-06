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
        return view("Exemplo");
    }

}
