<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::all();
        $user = User::first(); // Ensure you have a user in the database.

        foreach ($posts as $post) {
            Comment::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'content' => "This is a comment on the post titled '{$post->title}'. Great post!",
            ]);
        }
    }
}
