<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sexo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(SexoSeeder::class);
        $this->call(EdadSeeder::class);
        $this->call(ProcedenciaSeeder::class);
    }
}
