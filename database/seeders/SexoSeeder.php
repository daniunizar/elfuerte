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
        $sexo->concepto='mujer';
        $sexo->orden=1;
        $sexo->save();

        $sexo = new Sexo();
        $sexo->concepto='hombre';
        $sexo->orden=2;
        $sexo->save();
    }
}
