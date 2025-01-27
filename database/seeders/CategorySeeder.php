<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology', 'description' => 'Latest trends and insights in technology.'],
            ['name' => 'Health', 'description' => 'Tips and advice for a healthy lifestyle.'],
            ['name' => 'Business', 'description' => 'News and strategies for business growth.'],
            ['name' => 'Entertainment', 'description' => 'Movies, music, and celebrity gossip.'],
            ['name' => 'Education', 'description' => 'Resources and updates for learning and teaching.'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'slug' => Str::slug($category['name']), // Generate slug from the category name
            ]);
        }
    }
}
