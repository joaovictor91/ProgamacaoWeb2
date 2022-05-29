<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_produtos', function (Blueprint $table) { ///copiar está área caso tenha que alterar a migração
            $table->id();
            $table->unsignedBigInteger("produto_id");
            $table->foreign("produto_id")
            ->references("id")->on("produtos");
            $table->unsignedBigInteger("compra_id");
            $table->foreign("compra_id")
            ->references("id")->on("compras");
            $table->integer("quantidade");
            $table->decimal("preco");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra_produtos');
    }
}
