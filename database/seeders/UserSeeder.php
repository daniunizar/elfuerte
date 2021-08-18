<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name='user01';
        $user->email='user01@user01.com';
        $user->password=password_hash('user01user01', PASSWORD_DEFAULT);
        //$user->password='user01user01';
        $user->save();
    }
}
