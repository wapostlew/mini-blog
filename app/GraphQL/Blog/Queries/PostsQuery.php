<?php

namespace App\GraphQL\Blog\Queries;

use App\Models\Blog\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PostsQuery extends Query
{
    protected $attributes = [
        'name' => 'posts',
        'description' => 'Post list with filtering, sorting and paginated',
    ];

    public function type(): Type
    {
        return GraphQL::paginate('Post');
    }

    public function args(): array
    {
        return [
            'status' => [
                'type' => Type::string(),
                'description' => 'Filter by status',
            ],
            'search' => [
                'type' => Type::string(),
                'description' => 'Search by title',
            ],
            'sort_by' => [
                'type' => Type::string(),
                'description' => 'Sort by',
            ],
            'sort_order' => [
                'type' => Type::string(),
                'description' => 'Sort order: asc or desc',
            ],
            'limit' => [
                'type' => Type::int(),
                'description' => 'Qty per page',
                'defaultValue' => 10,
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $query = Post::query();

        if (!empty($args['status'])) {
            $query->where('status', $args['status']);
        }

        if (!empty($args['search'])) {
            $query->where('title', 'like', '%' . $args['search'] . '%');
        }

        $sortBy = $args['sort_by'] ?? 'created_at';
        $sortOrder = $args['sort_order'] ?? 'desc';

        $query->orderBy($sortBy, $sortOrder);

        return $query->paginate($args['limit']);
    }
}
