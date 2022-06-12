<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoProduto extends BaseChart
{

    public ?array $middlewares = ['auth'];

    public ?string $name = 'grafico_produto';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $nomes = DB::table('compras')
            ->join('compra_produtos', 'compras.id', '=', 'compra_produtos.compra_id')
            ->join('produtos', 'compra_produtos.produto_id', '=', 'produtos.id')
            ->orderBy('produtos.nome')
            ->select('produtos.nome')
            ->get()
            ->pluck('nome')
            ->toJson();
        $quantidade = DB::table('compras')
            ->join('compra_produtos', 'compras.id', '=', 'compra_produtos.compra_id')
            ->join('produtos', 'compra_produtos.produto_id', '=', 'produtos.id')
            ->orderBy('produtos.nome')
            ->select('compra_produtos.quantidade')
            ->get()
            ->pluck('quantidade')
            ->toJson();
        return Chartisan::build()
            ->labels(json_decode($nomes))
            ->dataset('Produtos',json_decode($quantidade));
    }
}
