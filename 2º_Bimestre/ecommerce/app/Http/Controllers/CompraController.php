<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\FuncCall;


class CompraController extends Controller
{

    private $carrinho;

    public function __construct()
    {
        $this->middleware('auth');

    }
    private function verificarCarrinho(){
        $this->carrinho = Compra::where([
            'user_id' => Auth::id(),
            'status' => 'aberto'
        ])->first();
    }
    public function compras()
    {
        $this->verificarCarrinho();
        if ($this->carrinho != null)
            $produtos = $this->carrinho->produtos;
        else
            $produtos = null;
        return view("compras", compact('produtos'));

    }

    public function home(){
        $produtos = Produto::orderBy("nome")->get();
        return view('welcome', compact('produtos'));
    }
    

    public function vercarrinho()
    {
        
         $this->existe_uma_venda_aberta();
         if ($this->compra != null)
             $produtos = $this->compra->produtos;
        else
             $produtos = null;
         return view("compras", compact('produtos'));
    

    }



/* Não precisei utilizar
    public function adicionar($id)
    {
        $this->verificarCarrinho();
        if ($this->carrinho == null){
            $this->carrinho = Compra::create([
                'user_id' => Auth::id(),
                'status' => 'aberto'
            ]);
        }
        $this->carrinho->produtos()->attach(
            Produto::findOrFail($id),
            ['quantidade' => 1, 'preco' => 0]

        );
        $produtos = $this->carrinho->produtos;
        return view('compras', compact('produtos'));
    }*/
/* Não precisei utilizar
    public function remover($id){
        $this->verificarCarrinho();
        $this->carrinho->produtos()->detach(
            Produto::findOrFail($id));
        $produtos = $this->carrinho->produtos;
        return view('compras', compact('produtos'));
    }
*/

    public function finalizar(){
        $this->verificarCarrinho();
        Compra::whereId($this->carrinho->id)
            ->update(['status' => 'fechada']);
        return redirect('/');
    }
    public function abrir_venda(){
        $this->compra = Compra::create([
            'user_id' => Auth::id(),
            'status' => 'aberta',
        ]);
        $this->compra->produtos()->attach($this->produto->id,[
            'quantidade' => 1,
            'preco' => $this->produto->preco
        ]);
    }

    

    public function existe_uma_venda_aberta(){
        $this->compra = Compra::with('produtos')
            ->where([
                'user_id' => Auth::id(),
                'status' => 'aberta',
            ])->first();
        return $this->compra != null;
    }

    public function existe_um_produto_na_venda(){
        return $this->compra->produtos->contains($this->produto);
    }
    public function incrementar_produto_venda(){
        $quantidade = ($this->compra->produtos
            ->find($this->produto->id)->pivot->quantidade)+1;
        $aux =($this->compra->produtos
            ->find($this->produto->id))->preco;

        $preco = ($this->compra->produtos
            ->find($this->produto->id)->pivot->preco)+$aux;

        $this->compra->produtos()
            ->updateExistingPivot($this->produto->id, ['quantidade' => $quantidade]);

        $this->compra->produtos()
            ->updateExistingPivot($this->produto->id, ['preco' => $preco]);

    }

    public function adicionar_no_carrinho($id){
        $this->produto = Produto::findOrFail($id);
        if ($this->existe_uma_venda_aberta() != null){
            if ($this->existe_um_produto_na_venda() != null){
                $this->incrementar_produto_venda();
            }else {
                $this->compra->produtos()->attach($this->produto->id, [
                    'quantidade' => 1,
                    'preco' => $this->produto->preco]);
            }
        }else {
            $this->abrir_venda();
        }
        $this->existe_uma_venda_aberta();
        $produtos = $this->compra->produtos;
        return view('compras', compact('produtos'));

    }

    public function remover_do_carrinho($id)
    {

        if($this->existe_uma_venda_aberta() != null){
            $this->produto = $this->compra->produtos->find($id);
            if ($this->produto->pivot->quantidade == 1){
                $this->compra->produtos()->detach($this->produto->id);
            }else
            {
                $quantidade = $this->produto->pivot->quantidade - 1;
                $this->compra->produtos()
                    ->updateExistingPivot($this->produto->id, ['quantidade' => $quantidade]);
                $aux =($this->compra->produtos
                    ->find($this->produto->id))->preco;

                $preco = ($this->compra->produtos
                    ->find($this->produto->id)->pivot->preco)-$aux;

                $this->compra->produtos()
                    ->updateExistingPivot($this->produto->id, ['preco' => $preco]);
            }
        }
        $this->existe_uma_venda_aberta();
        $produtos = $this->compra->produtos;
        return view('compras', compact('produtos'));
    }
}
