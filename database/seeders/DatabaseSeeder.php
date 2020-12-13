<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void;
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();        // random data nae 20 lines of data win twr mal. Thats Factory. Multi-insert.

        // $this->call([UserSeeder::class,              // single insert using query builders
        //             PostSeeder::class]);
    }
}
/// php artisan db:seed ( single or multiple ) will depend upon the codes in this database seeder