<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Edad;

class EdadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edad = new Edad();
        $edad->concepto='menor';
        $edad->orden=1;
        $edad->save();
        $edad = new Edad();
        $edad->concepto='jóven';
        $edad->orden=2;
        $edad->save();
        $edad = new Edad();
        $edad->concepto='adulto';
        $edad->orden=3;
        $edad->save();
        $edad = new Edad();
        $edad->concepto='mayor';
        $edad->orden=4;
        $edad->save();
    }
}
