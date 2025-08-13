<?php

namespace Database\Seeders;

use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory()->count(20)->create();
    }
}
