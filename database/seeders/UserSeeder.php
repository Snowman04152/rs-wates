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
                'level' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'username' => 'yudi',
                'email' => 'yudi@example.com',
                'level' => '2',
                'password' => bcrypt('yudikatif'),
            ],
 
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
    
}
