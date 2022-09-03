<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // dropa a tabela inteira
        // Schema::dropIfExists('store');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // cria a tabela novamente com todos os campos
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('branch', 100);
            $table->text('description')->nullable();
            $table->integer('cpf');
            $table->integer('number');
            $table->timestamps();
        });
    }
};
