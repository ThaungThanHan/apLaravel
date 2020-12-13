<?php

namespace Database\Seeders;


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
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
    {                               // Query Builder
        DB::table('users') -> insert([          // seeder taku chinn si pl htae tl..seeder ko amyr g takar htel htae chin yin
            'name' => Str::random(10),          // Loop pat mha ya mal. for($i=0;$i<10;$i++){}
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
