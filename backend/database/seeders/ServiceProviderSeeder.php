<?php

namespace Database\Seeders;

use App\Models\ServiceProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceProvider::create([
            'user_id'=>1,
            'has_assistant'=>'0',
            'years_of_experience'=>'3',
            'service_id'=>'1',
            'slug'=>'aabbccdd',
            'is_featured'=>1
        ]);
        ServiceProvider::create([
            'user_id'=>2,
            'has_assistant'=>'0',
            'years_of_experience'=>'3',
            'service_id'=>'3',
            'slug'=>'aabbcc',
            'is_featured'=>1

        ]);
        ServiceProvider::create([
            'user_id'=>3,
            'has_assistant'=>'1',
            'years_of_experience'=>'2',
            'service_id'=>'2',
            'slug'=>'aabb',
            'is_featured'=>1

        ]);
    }
}
