<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $statuses = ['draft', 'published', 'archived'];

        return [
            'title' => $this->faker->sentence(),
            'status' => $this->faker->randomElement($statuses),
            'content' => $this->faker->paragraphs(3, true),
            'image' => 'https://picsum.photos/seed/' . $this->faker->unique()->numberBetween(1, 1000) . '/600/400',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
