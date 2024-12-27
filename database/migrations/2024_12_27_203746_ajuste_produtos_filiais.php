<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //criando a table filiais
        Schema::create('filiais', function (Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        //criando a table produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco_venda',8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //foreign keys
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');

        });

        Schema::table('produtos', function (Blueprint $table){
            $table->dropColumn('preco_venda');
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //adicionar colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table){
            $table->float('preco_venda', 8, 2);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        // revertendo a criação da table produto filiais
        Schema::dropIfExists('produto_filiais');

        //excluindo filiais
        Schema::dropIfExists('filiais');
    }
};
