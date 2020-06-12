<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=> 1,
            'name' => 'Lucas Vieira',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('controles843'),
            'phone' => '(42) 9999695053'
        ]);
    }
}
