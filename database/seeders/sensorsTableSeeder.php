<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors')->insert([
     'topic' => 'living/temperatuur',
     'type' => 'digital',
     'unit' => '°C',
     'min' => '0',
     'max' => '40',
     'users_id' =>'1',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'klaslokaal1/co2',
     'type' => 'circle chart',
     'unit' => 'ppm',
     'min' => '200',
     'max' => '4000',
     'users_id' =>'1',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'living/luchtvochtigheid',
     'type' => 'chart',
     'unit' => '%',
     'min' => '0',
     'max' => '100',
     'users_id' =>'3',
     ]);
          DB::table('sensors')->insert([
     'topic' => 'buiten/ozon',
     'type' => 'circle chart',
     'unit' => 'ppm',
     'min' => '0',
     'max' => '0.2',
     'users_id' =>'2',
     ]);
               DB::table('sensors')->insert([
     'topic' => 'living/co2',
     'type' => 'circle chart',
     'unit' => 'ppm',
     'min' => '0',
     'max' => '3500',
     'users_id' =>'1',
     ]);
                    DB::table('sensors')->insert([
     'topic' => 'buiten/luchtvochtigheid',
     'type' => 'chart',
     'unit' => '%',
     'min' => '0',
     'max' => '100',
     'users_id' =>'3',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'garage/temperatuur',
     'type' => 'thermometer',
     'unit' => '°C',
     'min' => '-15',
     'max' => '40',
     'users_id' =>'3',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'buiten/fijnstof',
     'type' => 'gauge',
     'unit' => 'µg/m3',
     'min' => '0',
     'max' => '100',
     'users_id' =>'2',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'slaapkamer/temperatuur',
     'type' => 'thermometer',
     'unit' => '°C',
     'min' => '0',
     'max' => '45',
     'users_id' =>'2',
     ]);
    }
}
