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
            'serviceName' => 'Manicure',
            'serviceDescription'=> 'Corta e pinta',
            'nameOfProfession' => 'Manicure',
        ]);

        DB::table('services')->insert([
            'id'=> 2,
            'serviceName' => 'Massoterapia',
            'serviceDescription'=> 'As melhores massagens da cidade!',
            'nameOfProfession' => 'Massoterapeuta',
        ]);

        DB::table('services')->insert([
            'id'=> 3,
            'serviceName' => 'Cabelo',
            'serviceDescription'=> 'Cortes, pinturas, hidratações e muito mais!',
            'nameOfProfession' => 'Cabeleireiro',
        ]);

        DB::table('services')->insert([
            'id'=> 4,
            'serviceName' => 'Limpeza de pele',
            'serviceDescription'=> '',
            'nameOfProfession' => 'Esteticista',
        ]);


    }
}
