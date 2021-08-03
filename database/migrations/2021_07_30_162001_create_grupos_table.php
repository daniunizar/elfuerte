<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->timestampTz('fecha_visita', 0);
            $table->integer('cantidadTotalVisitantes');
            $table->integer('Mujeres_Menores');
            $table->integer('Mujeres_Jovenes');
            $table->integer('Mujeres_Adultas');
            $table->integer('Mujeres_Mayores');
            $table->integer('Varones_Menores');
            $table->integer('Varones_Jovenes');
            $table->integer('Varones_Adultos');
            $table->integer('Varones_Mayores');
            $table->boolean('ProcedenciaInternacional');
            $table->string('LugarProcedencia');
            $table->timestampsTz(); //El Tz del final nos agrega la hora LOCAL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
