<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea', function (Blueprint $table) {
            $table->id('tarea_id');
            $table->string('nombre', 60);
            $table->string('telefono', 12);
            $table->string('descripcion');
            $table->string('email');
            $table->string('direccion');
            $table->char('estado', 1); // C -> CANCELADA; F -> FINALIZADA; P-> PENDIENTE;
            $table->date('f_crea');
            $table->date('f_rea');
            $table->string('anot_anteriores', 60);
            $table->string('anot_posteriores', 60);
            $table->string('fichero', 30)->nullable();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('cliente_id')->on('cliente');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('empleado_id')->on('empleado');
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
        Schema::dropIfExists('tarea');
    }
}
