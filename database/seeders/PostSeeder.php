<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Category;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $user = User::first(); // Ensure you have a user in the database.

        foreach ($categories as $category) {
            Post::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => "Sample Post in {$category->name}",
                'content' => "This is a sample post for the {$category->name} category. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                'slug' => Str::slug("Sample Post in {$category->name}"),
                'is_published' => true,
                'featured_image' => null,
                'excerpt' => "A brief summary of the {$category->name} post.",
                'views_count' => rand(10, 500),
                'seo_meta' => json_encode(['title' => "{$category->name} Post", 'description' => "SEO description for {$category->name}"]),
                'published_at' => now(),
            ]);
        }
    }
}
