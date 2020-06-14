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
            'professionalName' => 'Dra. Joana D.',
            'professionalPhone'=> '13988251183',
            'professionalService' => 'Pediatra',
        ]);

        DB::table('professionals')->insert([
            'id'=> 2,
            'professionalName' => 'Dr. Jekyll',
            'professionalPhone'=> '13988251183',
            'professionalService' => 'Clinico',
        ]);

        DB::table('professionals')->insert([
            'id'=> 3,
            'professionalName' => 'Mr. Hyde',
            'professionalPhone'=> '13988251183',
            'professionalService' => 'Ortopedista',
        ]);

        DB::table('professionals')->insert([
            'id'=> 4,
            'professionalName' => 'Dr. Love',
            'professionalPhone'=> '13988251183',
            'professionalService' => 'Cardiologista',
        ]);

    }
}
