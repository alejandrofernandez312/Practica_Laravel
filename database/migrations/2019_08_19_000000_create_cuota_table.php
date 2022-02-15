<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuota', function (Blueprint $table) {
            $table->id('cuota_id');
            $table->string('concepto', 60);
            $table->date('f_emision');
            $table->double('importe', 6.2);
            $table->char('pagada', 1);
            $table->date('f_pago')->nullable();
            $table->string('notas');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('cliente_id')->on('cliente');
            $table->rememberToken();
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
        Schema::dropIfExists('cuota');
    }
}
