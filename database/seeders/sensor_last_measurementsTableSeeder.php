<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\DB;

class sensor_last_measurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '20',
     'topic' => 'sensor in',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '5',
     'topic' => 'sensor out',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '10',
     'topic' => 'maarten',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '4',
     'topic' => 'maarten3',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '0',
     'topic' => 'co3',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '5',
     'topic' => 'co2',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
    }
}
