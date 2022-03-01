<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //LLenado de datos Automatico
        $user= User::create([
                    'name' => 'danny',
                    'email' => 'danny_2003@ovi.com',
                    'password' => bcrypt('12345678')
                ]);
                
        $user->AssignRole('Admin');

        User::factory(99)->create();
    }
}
