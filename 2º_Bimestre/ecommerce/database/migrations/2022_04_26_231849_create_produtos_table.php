<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nome");
            $table->string("descricao");
            $table->unsignedBigInteger("categoria_id");
            $table->foreign("categoria_id")
            ->references("id")->on("categorias");
            $table->unsignedBigInteger("forncedor_id");
            $table->foreign("forncedor_id")
            ->references("id")->on("forncedors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
