<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::updateOrCreate(
            [
                'name' => 'Design',
                'temas' => '8',
                'user_id' =>'1'
            ]
        );
        Curso::updateOrCreate(
            [
                'name' => 'Criminology',
                'temas' => '45',
                'user_id' =>'1'
            ]
        );
        Curso::updateOrCreate(
            [
                'name' => 'Computer Science',
                'temas' => '25',
                'user_id' =>'1'
            ]
        );
        Curso::updateOrCreate(
            [
                'name' => 'Creative Arts',
                'temas' => '27',
                'user_id' =>'1'
            ]
        );
        Curso::updateOrCreate(
            [
                'name' => 'Applied Science',
                'temas' => '17',
                'user_id' =>'1'
            ]
        );
    }
}
