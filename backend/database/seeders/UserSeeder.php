<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => ['en' => 'John Doe', 'ar' => 'جون دو'],
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'phone' => '01099990323',
                'phone_verified_at' => now()
            ],
            [
                'id' => 2,
                'name' => ['en' => 'Jane Smith', 'ar' => 'جين سميث'],
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'phone' => '01099990323',
                'phone_verified_at' => now()
            ],
            [
                'id' => 3,
                'name' => ['en' => 'Ahmed Ali', 'ar' => 'أحمد علي'],
                'email' => 'ahmed@example.com',
                'password' => Hash::make('password123'),
                'phone' => '01099990323',
                'phone_verified_at' => now()
            ],
            [
                'id' => 4,
                'name' => ['en' => 'Sara Lee', 'ar' => 'سارة لي'],
                'email' => 'sara@example.com',
                'password' => Hash::make('password123'),
                'phone' => '01099990323',
                'phone_verified_at' => now()
            ],
            [
                'id' => 5,
                'name' => ['en' => 'Michael Brown', 'ar' => 'مايكل براون'],
                'email' => 'michael@example.com',
                'password' => Hash::make('password123'),
                'phone' => '01099990323',
                'phone_verified_at' => now()
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }


    }
}
