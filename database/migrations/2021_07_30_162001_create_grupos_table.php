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
            $table->integer('cantidadTotalVisitantes');
            $table->integer('Mujeres_Menores');
            $table->integer('Mujeres_Jovenes');
            $table->integer('Mujeres_Adultas');
            $table->integer('Mujeres_Mayores');
            $table->integer('Hombres_Menores');
            $table->integer('Hombres_Jovenes');
            $table->integer('Hombres_Adultos');
            $table->integer('Hombres_Mayores');
            $table->boolean('ProcedenciaInternacional');
            $table->string('LugarProcedencia');
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
        Schema::dropIfExists('grupos');
    }
}
