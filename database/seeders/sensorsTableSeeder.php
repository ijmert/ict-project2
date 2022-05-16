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
     'topic' => 'sensor2',
     'type' => 'chart',
     'unit' => 'bpm',
     'min' => '100',
     'max' => '300',
     'users_id' =>'1',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'corona',
     'type' => 'chart',
     'unit' => 'graden',
     'min' => '0',
     'max' => '12',
     'users_id' =>'1',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'maarten',
     'type' => 'chart',
     'unit' => 'km',
     'min' => '10',
     'max' => '100',
     'users_id' =>'2',
     ]);
          DB::table('sensors')->insert([
     'topic' => 'co3',
     'type' => 'circle chart',
     'unit' => 'graden',
     'min' => '0',
     'max' => '37',
     'users_id' =>'2',
     ]);
               DB::table('sensors')->insert([
     'topic' => 'co2',
     'type' => 'digital',
     'unit' => '°',
     'min' => '-20',
     'max' => '12',
     'users_id' =>'1',
     ]);
                    DB::table('sensors')->insert([
     'topic' => 'opapa',
     'type' => 'digital',
     'unit' => 'graden',
     'min' => '0',
     'max' => '30',
     'users_id' =>'2',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'sensor out',
     'type' => 'thermometer',
     'unit' => 'graden',
     'min' => '0',
     'max' => '10',
     'users_id' =>'2',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'iets',
     'type' => 'thermometer',
     'unit' => 'km',
     'min' => '0',
     'max' => '15',
     'users_id' =>'2',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'maarten3',
     'type' => 'circle chart',
     'unit' => 'graden',
     'min' => '0',
     'max' => '30',
     'users_id' =>'2',
     ]);
    }
}
