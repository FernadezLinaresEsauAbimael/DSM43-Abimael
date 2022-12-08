<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use App\Models\User; 
use Illuminate\Support\Facades\Hash; 


class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        //Login
        $useradmin=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'fullacces' => 'yes',
            //'codigo' => 'adm1',
        ]);

        $user1=User::create([
            'name' => 'usuario abimael',
            'email' => 'abimael@gmail.com',
            'password' => Hash::make('abimael'),
            'fullaces' => 'no',
            //'codigo' => 'cereal1'
        ]); 
    }
}
