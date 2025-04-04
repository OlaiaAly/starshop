<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [

                'name'=> 'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'admin',
                'status'=>'active'

            ],
            [

                'name'=> 'Vendor',
                'username'=>'vendor',
                'email'=>'vendor@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'vendor',
                'status'=>'active'

            ],
            
            [

                'name'=> 'User',
                'username'=>'user',
                'email'=>'user@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'user',
                'status'=>'active'

            ],
            [

                'name'=> 'Promoter',
                'username'=>'promoter',
                'email'=>'promoter@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'user',
                'status'=>'active'

            ],
            [

                'name'=> 'Aly Olaia',
                'username'=>'admin@starshop.com',
                'email'=>'admin@starshop.com',
                'password'=> Hash::make('admin@starshop.com'),
                'role'=>'user',
                'status'=>'active'
            ],
             

        ]);


    }
}
