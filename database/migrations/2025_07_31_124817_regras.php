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
        Schema::create('regras', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        // Esta outra tabela é para consolidar este relacionamento de muitos pra muitos
        Schema::create('regra_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');

            $table->unsignedBigInteger('id_regra');
            $table->foreign('id_regra')->references('id')->on('regras');

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
        Schema::dropIfExists('regras');
        Schema::dropIfExists('regra_user');
    }
};
