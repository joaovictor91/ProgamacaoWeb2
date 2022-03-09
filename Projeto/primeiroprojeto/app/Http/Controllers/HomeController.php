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

    public function exercicio2()
    {
        return view("Exercicio2");
    }

    public function resultado2(Request $request){
        $valor_quilo = $request['valor_quilo'];
        $quantidade_quilos = $request['quantidade_quilos'];
        $resultado = $valor_quilo * $quantidade_quilos;
        return "O valor final a ser pago $resultado";

    }

    public function exercicio3()
    {
        return view("Exercicio3");
    }

    public function resultado3(Request $request){
        $n = $_POST['n'];
        $resultado=$n;
        if($resultado < 10)
            return "O valor que foi informado é menor que 10";
        else if ($resultado > 10)
            return "O valor que foi informado é maior que 10!";

        else if ($resultado == 10)
            return "O valor que foi informado é igual a dez!";
    }

    public function exercicio4()
    {
        return view("Exercicio4");
    }

    public function resultado4(Request $request){
        $n = $_POST['n'];
        $resultado=$n;
        if($resultado < 0)
            return "O valor informado é NEGATIVO!!";
        else if ($resultado > 0)
            return "O valor informado é POSITIVO!!";

        else if ($resultado == 0)
            return "O valor que foi informado é ZERO!!";
    }

    public function exercicio5()
    {
        return view("Exercicio5");
    }

    public function resultado5(Request $request){
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        $nota4 = $_POST['nota4'];
        $resultado=($nota1+$nota2+$nota3+$nota4)/4;
        if($resultado > 7)
            return "O Aluno foi <b style='color:green;'>APROVADO!!</b>";
        else if ($resultado < 7)
            return "O Aluno foi <b style='color:red;'>REPROVADO!!</b>";
    }

}
