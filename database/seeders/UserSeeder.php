<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            'name'=>'saito',
            'email'=>'a@a',
            'password'=>Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
    ]);
    DB::table('users')->insert([ 
            'name'=>'sato',
            'email'=>'b@b',
            'password'=>Hash::make('pass'),
            'authority'=>1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
    ]);
    }
}
