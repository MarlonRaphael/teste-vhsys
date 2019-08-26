<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('apelido');
            $table->date('dt_nascimento');
            $table->decimal('altura', 8, 2);
            $table->decimal('peso', 8, 2);
            $table->enum('pe', ['destro', 'canhoto']);
            $table->string('posicao');
            $table->integer('camisa', false, true);
            $table->string('nacionalidade');
            $table->bigInteger('clube_id')->unsigned();
            $table->foreign('clube_id')
                ->references('id')
                ->on('clubes')
                ->onDelete('cascade');
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
        Schema::dropIfExists('jogadores');
    }
}
