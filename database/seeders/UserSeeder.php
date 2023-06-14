<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $admin = User::create([
            'name' => 'admin',
            'email'=> 'admin@gmail.com',
            'nohp'=> '1',
            'password'=> bcrypt('admin123')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Hiskia Parhusip',
            'email'=> 'hiskiaparhusip@gmail.com',
            'nohp'=> '627890782107',
            'password'=> bcrypt('hiskia123')
        ],
        [
            'name' => 'Julianti Sitorus',
            'email' => 'juliantisitorus071@gmail.com',
            'nohp'=> '6283130196042',
            'password'=> bcrypt('julianti117')

        ],
        [
            'name' => 'Dafne Simanjuntak',
            'email' => 'Dafnesimanjuntak@gmail.com',
            'nohp'=> '6283130706248',
            'password'=> bcrypt('dafne123')

        ],
    );

        $user->assignRole('customer');
    }
}
