<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function createComment($data)
    {
        $comment = Comment::create($data);
        return $comment;
    }
}
