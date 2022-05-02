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
     'min' => '5°',
     'max' => '20°',
     'user_id' =>'1',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'sensor in',
     'type' => 'sensor',
     'unit' => 'celcius, C',
     'min' => '-15°',
     'max' => '32°',
     'user_id' =>'2',
     ]);
     DB::table('sensors')->insert([
     'topic' => 'sensor in',
     'type' => 'sensor',
     'unit' => 'celcius, C',
     'min' => '0°',
     'max' => '10°',
     'user_id' =>'3',
     ]);
        //
    }
}
