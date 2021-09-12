<?php

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_checkouts', function (Blueprint $table) {
            $table->id();
            $table->float('valor_gasto');
            $table->integer('tipo_pagamento');
            $table->integer('status');
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::table('clients_checkouts', function (Blueprint $table) {
            $table->foreignIdFor(Empresa::class);
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->foreignIdFor(User::class)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_checkouts');
    }
}
