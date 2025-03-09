<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::all();

        // Create 20 dummy posts
        for ($i = 0; $i < 20; $i++) {
            Post::create([
                'title' => 'Dummy Post ' . ($i + 1),
                'content' => 'This is the content of dummy post ' . ($i + 1) . '.',
                'author_id' => $users->random()->id,
            ]);
        }
    }
}