<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sexo;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sexo = new Sexo();
        $sexo->concepto='hombre';
        $sexo->save();

        $sexo = new Sexo();
        $sexo->concepto='mujer';
        $sexo->save();
    }
}
