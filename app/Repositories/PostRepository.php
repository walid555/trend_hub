<?php
namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function createPost($data)
    {
        $post = Post::create($data);
        return $post;
    }
}
