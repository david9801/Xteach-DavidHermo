<?php

namespace Database\Seeders;

use App\Models\Inscripcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscripcion::updateOrCreate(
            [
                'curso_id' => '1',
                'user_id' => '2',
            ]
        );
        Inscripcion::updateOrCreate(
            [
                'curso_id' => '2',
                'user_id' => '2',
            ]
        );
        Inscripcion::updateOrCreate(
            [
                'curso_id' => '3',
                'user_id' => '2',
            ]
        );
        Inscripcion::updateOrCreate(
            [
                'curso_id' => '3',
                'user_id' => '4',
            ]
        );
        Inscripcion::updateOrCreate(
            [
                'curso_id' => '3',
                'user_id' => '5',
            ]
        );
    }
}
