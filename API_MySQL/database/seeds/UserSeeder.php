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
            'name' => 'Marcos Antonio',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('controles843'),
            'phone' => '(13) 988251183'
        ]);
    }
}
