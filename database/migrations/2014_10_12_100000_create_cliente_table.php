<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('cliente_id');
            $table->string('nombre', 60);
            $table->string('cif', 15)->unique();
            $table->string('telefono', 12);
            $table->string('email')->unique();
            $table->string('cuenta_corriente', 30);
            $table->string('moneda', 10);
            $table->double('importe', 6.2);
            $table->unsignedSmallInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('paises');
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
        Schema::dropIfExists('cliente');
    }
}
