<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UserSeeder::class,
            CursoSeeder::class,
            InscripcionSeeder::class
        ]);
    }
}
//ejecutamos primero roles pq si no luego al añadir a un usuario los roles peta, al igual que el seeder de la inscripcion esta el ultimo
//pues hay curso_id y user_id antes que se han tenido que crear
//al igual que cursoseeder que es de un usuario admin
