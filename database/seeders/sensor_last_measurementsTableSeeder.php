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
     'LastMeasurement' => '23',
     'topic' => 'living/temperatuur',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '10',
     'topic' => 'garage/temperatuur',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '19',
     'topic' => 'slaapkamer/temperatuur',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '50',
     'topic' => 'living/luchtvochtigheid',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '12',
     'topic' => 'buiten/fijnstof',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '60',
     'topic' => 'buiten/luchtvochtigheid',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '400',
     'topic' => 'klaslokaal1/co2',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '0.075',
     'topic' => 'buiten/ozon',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
     DB::table('sensor_last_measurements')->insert([
     'LastMeasurement' => '400',
     'topic' => 'living/co2',
     'created_at' => NULL,
     'updated_at' => NULL,
     ]);
    }
}
