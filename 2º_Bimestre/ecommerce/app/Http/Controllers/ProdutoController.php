<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Forncedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize("acesso-administrador");
        $produtos = Produto::all();
        return view("produto.index",
            compact("produtos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize("acesso-administrador");
        $categorias = Categoria::all();
        $forncedors = Forncedor::all();
        return view("produto.create",
            compact("categorias", "forncedors"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {
        Gate::authorize("acesso-administrador");
        try{
            $produto = new Produto();
            $dados = $request->only($produto->getFillable());
            Produto::create($dados);
            return redirect()->action(
                [ProdutoController::class, 'index'])
                    ->with("resposta", "Registro inserido");
        } catch (\Exception $e){
            return redirect()->action(
                [ProdutoController::class, 'index'])
                ->with("resposta", "Erro ao inserir!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize("acesso-administrador");
        $categorias = Categoria::all();
        $forncedors = Forncedor::all();
        $produto = Produto::findOrFail($id);
        return view("produto.edit",
            compact("categorias", "forncedors" ,"produto"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize("acesso-administrador");
        try{
            $produto = new Produto();
            $dados = $request->only($produto->getFillable());
            Produto::whereId($id)->update($dados);
            return redirect()->action([ProdutoController::class, "index"])
                ->with("resposta", "Registro alterado");
        } catch (\Exception $e){
            return redirect()->action([ProdutoController::class, "index"])
                ->with("resposta", "Erro ao alterar");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize("acesso-administrador");
        try{
            Produto::destroy($id);
            return redirect()->action([ProdutoController::class, "index"])
                ->with("resposta", "Registro excluído");
        } catch (\Exception $e) {
            return redirect()->action([ProdutoController::class, "index"])
                ->with("resposta", "Não foi possível excluir");
        }
    }
}
