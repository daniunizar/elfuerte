<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Procedencia;
class ProcedenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procedencia = new Procedencia();
        $procedencia->concepto='Francia';
        $procedencia->internacional='1';
        $procedencia->save();

        $procedencia = new Procedencia();
        $procedencia->concepto='Alemania';
        $procedencia->internacional='1';
        $procedencia->save();

        $procedencia = new Procedencia();
        $procedencia->concepto='Italia';
        $procedencia->internacional='1';
        $procedencia->save();

        $procedencia = new Procedencia();
        $procedencia->concepto='Reino Unido';
        $procedencia->internacional='1';
        $procedencia->save();

        $procedencia = new Procedencia();
        $procedencia->concepto='Zaragoza';
        $procedencia->internacional='0';
        $procedencia->save();

        $procedencia = new Procedencia();
        $procedencia->concepto='Huesca';
        $procedencia->internacional='0';
        $procedencia->save();

        $procedencia = new Procedencia();
        $procedencia->concepto='Teruel';
        $procedencia->internacional='0';
        $procedencia->save();
    }
}
