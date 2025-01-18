<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Infrastructure',
                'description' => 'Roads, buildings, public facilities, etc.'
            ],
            [
                'name' => 'Environment',
                'description' => 'Pollution, waste management, green spaces'
            ],
            [
                'name' => 'Public Services',
                'description' => 'Government services, bureaucracy'
            ],
            [
                'name' => 'Social Issues',
                'description' => 'Community problems, social conflicts'
            ],
            [
                'name' => 'Education',
                'description' => 'School facilities, education quality'
            ],
            [
                'name' => 'Healthcare',
                'description' => 'Medical facilities, health services'
            ],
            [
                'name' => 'Security',
                'description' => 'Public safety, crime'
            ],
            [
                'name' => 'Transportation',
                'description' => 'Public transport, traffic'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
