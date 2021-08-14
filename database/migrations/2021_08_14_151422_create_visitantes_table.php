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
                    ->onDelete('set null');
            $table->foreign('edad_id')->references('id')
            ->on('edads')->onDelete('set null');
            $table->foreign('procedencia_id')->references('id')
            ->on('procedencias')->onDelete('set null');
            $table->foreign('lote_id')->references('id')
            ->on('lotes')->onDelete('cascade');
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
