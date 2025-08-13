<?php

namespace App\GraphQL\Blog\Queries;

use App\Models\Blog\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'post',
        'description' => 'Detail blog article',
    ];

    public function type(): Type
    {
        return GraphQL::type('Post');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Article ID',
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Post::findOrFail($args['id']);
    }
}
