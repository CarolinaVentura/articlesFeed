<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo'); 
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('data');
            $table->string('descricao');

            $table->foreign('autor_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->integer('autor_id')->unsigned(); 

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade'); 
            $table->integer('categoria_id')->unsigned(); 



        
            $table->timestamps();
            $table->softDeletes(); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
