<?php

use Illuminate\Database\Seeder;

class PossibleSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('possible_schedules')->insert([
            'id'=> 1,
            'time' => '7:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 2,
            'time' => '8:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 3,
            'time' => '9:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 4,
            'time' => '10:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 5,
            'time' => '11:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 6,
            'time' => '13:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 7,
            'time' => '14:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 8,
            'time' => '15:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 9,
            'time' => '16:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 10,
            'time' => '17:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 11,
            'time' => '18:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 12,
            'time' => '19:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 13,
            'time' => '20:00'
        ]);

        DB::table('possible_schedules')->insert([
            'id'=> 14,
            'time' => '21:00'
        ]);
    }
}
