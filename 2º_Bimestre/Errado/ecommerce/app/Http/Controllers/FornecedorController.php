<?php

namespace App\Http\Controllers;

use App\Models\Forncedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $fornecedors = Forncedor::all();
        return view('fornecedor.index',
                compact('fornecedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        return view("fornecedor.create",
            compact("produtos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $fornecedor = new Forncedor();
            $dados = $request->only($fornecedor->getFillable());
            Forncedor::create($dados);
            return redirect()->action(
                [FornecedorController::class, 'index'])
                    ->with("resposta", "Registro inserido");
        } catch (\Exception $e){
            return redirect()->action(
                [FornecedorController::class, 'index'])
                ->with("resposta", "Erro ao inserir!");
        }
        /*try{
            $fornecedor = new Forncedor();
            $dados = $request->only($fornecedor->getFillable());
            Forncedor::create($dados);
            return redirect()
                ->action([FornecedorController::class,
                        'index']);
        } catch (\Exception $e){
            echo "Erro ao inserir!";
        }*/
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
        $produtos = Produto::all();
        $fornecedor = Forncedor::findOrFail($id);
        return view("fornecedor.edit",
            compact("produtos","fornecedor"));
        /*$fornecedor = Forncedor::findOrFail($id);
        return view ("fornecedor.edit",
                        compact("fornecedor"));*/
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
        try{
            $fornecedor = new Forncedor();
            $dados = $request->only($fornecedor->getFillable());
            Forncedor::whereId($id)->update($dados);
            return redirect()->action([FornecedorController::class, "index"])
                ->with("resposta", "Registro alterado");
        } catch (\Exception $e){
            return redirect()->action([FornecedorController::class, "index"])
                ->with("resposta", "Erro ao alterar");
        }
        /*try{
            $fornecedor = new Forncedor();
            $dados = $request->only($fornecedor->getFillable());
            Forncedor::whereId($id)->update($dados);
            return redirect()
                ->action([FornecedorController::class,
                    'index']);
        } catch(\Exception $e){
            echo "Erro ao alterar: ".$e->getMessage();
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Forncedor::destroy($id);
            return redirect()->action([FornecedorController::class, "index"])
                ->with("resposta", "Registro excluído");
        } catch (\Exception $e) {
            return redirect()->action([FornecedorController::class, "index"])
                ->with("resposta", "Não foi possível excluir");
        }
        /*try{
            Forncedor::destroy($id);
            return redirect()
                ->action([FornecedorController::class,
                    'index']);
        } catch (\Exception $e){
            echo "Erro ao excluir!"+$e->getMessage();
        }*/
    }
}
