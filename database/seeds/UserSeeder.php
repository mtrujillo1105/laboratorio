<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Martín Trujillo Bustamante',
            'email' => 'martin.trujillo@uni.pe',
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');
        
        User::create([
            'name' => 'Edward Figueroa Maldonado',
            'email' => 'edward.figueroa@uni.pe',
            'password' => bcrypt('12345678')
        ])->assignRole('Cotizador');
        
        User::create([
            'name' => 'Roberto Meiggs Sotelo',
            'email' => 'rmeiggs.s@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Asistente');        
        
    }
}
