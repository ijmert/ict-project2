<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\seeder;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
 
        $this->call([
            userTableSeeder::class,
            sensor_last_measurementsTableSeeder::class,
            sensorsTableSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
