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
        // Schema::dropIfExists('store');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::create('shop', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('shopName', 100);
        //     $table->string('branch', 100);
        //     $table->text('description')->nullable();
        //     $table->text('number');
        //     $table->text('cpf');
        //     $table->text('address');
        //     $table->number('income');
        //     $table->json('caractheristic');
        //     $table->timestamps();
        // });
    }
};
