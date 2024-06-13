<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'test',
                'email' => 'test@example.com',
                'number' => '08217712717348',
                'level' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'username' => 'yudi',
                'email' => 'yudi@example.com',
                'number' => '08217712717398',
                'level' => '2',
                'password' => bcrypt('yudikatif'),
            ], [
                'username' => 'budi',
                'email' => 'budi@example.com',
                'number' => '08217712717333',
                'level' => '3',
                'password' => bcrypt('budikatif'),
            ], [
                'username' => 'rudi',
                'email' => 'rudi@example.com',
                'number' => '08217712717308',
                'level' => '4',
                'password' => bcrypt('rudikatif'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
    
}
