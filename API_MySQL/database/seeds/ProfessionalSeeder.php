<?php

use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professionals')->insert([
            'id'=> 1,
            'professionalName' => 'Joaquim',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Cabeleireiro',
        ]);

        DB::table('professionals')->insert([
            'id'=> 2,
            'professionalName' => 'Luisa',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Cabeleireiro',
        ]);

        DB::table('professionals')->insert([
            'id'=> 3,
            'professionalName' => 'Jill',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Cabeleireiro',
        ]);

        DB::table('professionals')->insert([
            'id'=> 4,
            'professionalName' => 'Jeff',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Massoterapeuta',
        ]);

        DB::table('professionals')->insert([
            'id'=> 5,
            'professionalName' => 'Will',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Massoterapeuta',
        ]);

        DB::table('professionals')->insert([
            'id'=> 6,
            'professionalName' => 'Sonia',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Massoterapeuta',
        ]);

        DB::table('professionals')->insert([
            'id'=> 7,
            'professionalName' => 'Monicah',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Manicure',
        ]);

        DB::table('professionals')->insert([
            'id'=> 8,
            'professionalName' => 'Sander',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Manicure',
        ]);

        DB::table('professionals')->insert([
            'id'=> 9,
            'professionalName' => 'Bill',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Manicure',
        ]);

        DB::table('professionals')->insert([
            'id'=> 10,
            'professionalName' => 'Marcus',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Esteticista',
        ]);

        DB::table('professionals')->insert([
            'id'=> 11,
            'professionalName' => 'Ander',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Esteticista',
        ]);

        DB::table('professionals')->insert([
            'id'=> 12,
            'professionalName' => 'Manjerona',
            'professionalPhone'=> '42999493934',
            'professionalService' => 'Esteticista',
        ]);
    }
}
