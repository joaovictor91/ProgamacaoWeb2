<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('welcome', compact('produtos'));
    }


    public function detalhe($id)
    {
        $produto = Produto::findOrFail($id);
        return view("produto", compact('produto'));
    }
}
