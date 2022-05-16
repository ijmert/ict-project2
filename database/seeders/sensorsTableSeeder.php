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
     'topic' => 'sensor in',
     'type' => 'sensor',
     'unit' => 'celcius, C',
     'min' => '5',
     'max' => '20',
     'users_id' =>'1',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'sensor in',
     'type' => 'thermometer',
     'unit' => 'km',
     'min' => '15',
     'max' => '320',
     'users_id' =>'1',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'maarten',
     'type' => 'digitaal',
     'unit' => 'graden',
     'min' => '0',
     'max' => '10',
     'users_id' =>'3',
     ]);
          DB::table('sensors')->insert([
     'topic' => 'sensor in',
     'type' => 'circle chart',
     'unit' => 'graden',
     'min' => '7',
     'max' => '30',
     'users_id' =>'2',
     ]);
               DB::table('sensors')->insert([
     'topic' => 'maarten',
     'type' => 'chart',
     'unit' => 'bpm',
     'min' => '100',
     'max' => '200',
     'users_id' =>'1',
     ]);
                    DB::table('sensors')->insert([
     'topic' => 'sensor2',
     'type' => 'chart',
     'unit' => 'graden',
     'min' => '0',
     'max' => '10',
     'users_id' =>'3',
     ]);
        //
    }
}
