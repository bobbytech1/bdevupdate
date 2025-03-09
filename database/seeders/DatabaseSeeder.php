<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Run the seeders
        $this->call([
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}