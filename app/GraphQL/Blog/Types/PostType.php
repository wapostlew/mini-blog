<?php

namespace App\GraphQL\Blog\Types;

use App\Models\Blog\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Post',
        'description' => 'Blog article',
        'model' => Post::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Article ID',
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Title',
            ],
            'status' => [
                'type' => Type::string(),
                'description' => 'Status',
            ],
            'content' => [
                'type' => Type::string(),
                'description' => 'Content',
            ],
            'image' => [
                'type' => Type::string(),
                'description' => 'Image',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'Created at',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Updated at',
            ],
        ];
    }
}
