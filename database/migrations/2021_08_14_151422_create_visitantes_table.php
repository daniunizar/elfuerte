<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->unsignedBigInteger('edad_id')->nullable();
            $table->unsignedBigInteger('procedencia_id')->nullable();
            $table->unsignedBigInteger('lote_id');
            $table->foreign('sexo_id')
                    ->references('id')->on('sexos')
                    ->onDelete('set null')
                    ->onUpdate('cascade');//Si actualizo un rango de edad todos los registros de Visitante con ese rango de edad se actualizarán también
            $table->foreign('edad_id')
                    ->references('id')->on('edads')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
            $table->foreign('procedencia_id')
                    ->references('id')->on('procedencias')
                    ->onDelete('set null') //Si borro un sexo o un rango de edad, los campos de los registros con ese sexo o rango de edad valdrán null
                    ->onUpdate('cascade');
            $table->foreign('lote_id')
                    ->references('id')->on('lotes')
                    ->onDelete('cascade') //al borrar un lote, se eliminarán los registros de visitantes de ese lote
                    ->onUpdate('cascade');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitantes');
    }
}
