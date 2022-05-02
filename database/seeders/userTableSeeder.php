<?php


namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
     {
     DB::table('users')->insert([
     'name' => 'pratik',
     'email' => 'pratikgurung46@gmail.com',
     'password' => Hash::make('gurung123')
     ]);
     DB::table('users')->insert([
     'name' => 'ijmert',
     'email' => 'ijmertulens46@gmail.com',
     'password' => Hash::make('ulens123')
     ]);
     DB::table('users')->insert([
     'name' => 'robbe',
     'email' => 'probbeverhoeven46@gmail.com',
     'password' => Hash::make('verhoeven123')
     ]);
     }
    }