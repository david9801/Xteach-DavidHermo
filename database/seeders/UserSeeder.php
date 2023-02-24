<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'name' => 'Maria Teresa Montenegro Orta',
                'email' => 'maria.teresa.montenegro.orta@not_mail.com',
                'password' => Hash::make('123456')
            ]
        );
        User::updateOrCreate(
            [
                'name' => 'Cesar Correa Solano',
                'email' => 'cesar.correa.solano@not_mail.com',
                'password' => Hash::make('123456')
            ]
        );
        User::updateOrCreate(
            [
                'name' => 'Luz Correa Ontiveros',
                'email' => 'luz.correa.ontiveros@not_mail.com',
                'password' => Hash::make('123456')
            ]
        );
        User::updateOrCreate(
            [
                'name' => 'Elvira Caballero Montemayor',
                'email' => 'elvira.caballero.montemayor@not_mail.com',
                'password' => Hash::make('123456')
            ]
        );
        User::updateOrCreate(
            [
                'name' => 'Luis Miguel Apodaca Rael',
                'email' => 'luis.miguel.apodaca.rael@not_mail.com',
                'password' => Hash::make('123456')
            ]
        );
        User::updateOrCreate(
            [
                'name' => 'Guadalupe Vela Fuentes',
                'email' => 'guadalupe.vela.fuentes@not_mail.com',
                'password' => Hash::make('123456')
            ]
        );
        User::updateOrCreate(
            [
                'name' => 'Gregorio Sisneros',
                'email' => 'gregorio.rios.sisneros@not_mail.com',
                'password' => Hash::make('123456')
            ]
        );

    }
}
