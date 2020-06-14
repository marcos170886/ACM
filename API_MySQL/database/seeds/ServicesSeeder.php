<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'id'=> 1,
            'serviceName' => 'Pediatria',
            'serviceDescription'=> 'Tratamento de crianças',
            'nameOfProfession' => 'Pediatra',
        ]);

        DB::table('services')->insert([
            'id'=> 2,
            'serviceName' => 'Ortopedia',
            'serviceDescription'=> 'Tratamento do sistema locomotor',
            'nameOfProfession' => 'Ortopedista',
        ]);

        DB::table('services')->insert([
            'id'=> 3,
            'serviceName' => 'Clinico Geral',
            'serviceDescription'=> 'Tratamento de adultos',
            'nameOfProfession' => 'Clinico',
        ]);

        DB::table('services')->insert([
            'id'=> 4,
            'serviceName' => 'Cardiologia',
            'serviceDescription'=> 'Tratamento do coração',
            'nameOfProfession' => 'Cardiologista',
        ]);


    }
}
