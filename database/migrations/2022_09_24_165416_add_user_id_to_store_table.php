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
        Schema::table('store', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            //constrained fala pro laravel que uma chave estrangeira será criada para esse usuário e atrela a chave à ele
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //onDelete('cascade') fala pro laravel que se o usuário for deletado, a chave estrangeira também será
        });
    }
};
