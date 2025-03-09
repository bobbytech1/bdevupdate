<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all posts and users
        $posts = Post::all();
        $users = User::all();

        // Create 50 dummy comments
        for ($i = 0; $i < 50; $i++) {
            Comment::create([
                'post_id' => $posts->random()->id,
                'user_id' => $users->random()->id,
                'content' => 'This is a dummy comment ' . ($i + 1) . '.',
            ]);
        }
    }
}
