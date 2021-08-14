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
        $edad->save();
        $edad = new Edad();
        $edad->concepto='jóven';
        $edad->save();
        $edad = new Edad();
        $edad->concepto='adulto';
        $edad->save();
        $edad = new Edad();
        $edad->concepto='mayor';
        $edad->save();
    }
}
