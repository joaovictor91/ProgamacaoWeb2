<?php

namespace App\Http\Controllers;

use App\Models\Forncedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FornecedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        Gate::authorize("acesso-administrador");
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
        Gate::authorize("acesso-administrador");
        return view('fornecedor.create');
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
            $fornecedor = new Forncedor();
            $dados = $request->only($fornecedor->getFillable());
            Forncedor::create($dados);
            return redirect()
                ->action([FornecedorController::class,
                        'index']);
        } catch (\Exception $e){
            echo "Erro ao inserir!";
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
        $fornecedor = Forncedor::findOrFail($id);
        return view ("fornecedor.edit",
                        compact("fornecedor"));
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
            $fornecedor = new Forncedor();
            $dados = $request->only($fornecedor->getFillable());
            Forncedor::whereId($id)->update($dados);
            return redirect()
                ->action([FornecedorController::class,
                    'index']);
        } catch(\Exception $e){
            echo "Erro ao alterar: ".$e->getMessage();
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
            Forncedor::destroy($id);
            return redirect()
                ->action([FornecedorController::class,
                    'index']);
        } catch (\Exception $e){
            echo "Erro ao excluir!"+$e->getMessage();
        }
    }
}
