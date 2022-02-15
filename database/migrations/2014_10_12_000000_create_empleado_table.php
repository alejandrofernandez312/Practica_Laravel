<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id('empleado_id');
            $table->string('nombre', 60);
            $table->string('password');
            $table->string('dni', 15)->unique();
            $table->string('email')->unique();
            $table->string('telefono', 12);
            $table->string('direccion', 60);
            $table->date('f_alta');
            $table->char('tipo', 1);
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
        Schema::dropIfExists('empleado');
    }
}
