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

    public function resultado(Request $request){
        $valor = $request['valor'];
        return "O valor informado é $valor";
    }

    public function exercicio1()
    {
        return view("Exercicio1");
    }

    public function resultado1(Request $request){
        $valor_produto = $request['valor_produto'];
        $valor_pago = $request['valor_pago'];
        $resultado = $valor_pago - $valor_produto;
        if($resultado > 0)
           return "O valor do troco é $resultado";
        else if ($resultado == 0)
            return  "Não há troco!";
        else
            return   "O valor pago é insuficiente!";

    }

}
