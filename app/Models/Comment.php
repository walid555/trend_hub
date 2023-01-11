<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Comment extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = [
        'title',
        'post_id',
        'parent_id',
        'user_id',
    ];

    function post()
    {
        return $this->belongsTo(Post::class , 'post_id');
    }

    function parent()
    {
        return $this->belongsTo(Comment::class , 'parent_id');
    }

    function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    function replies()
    {
        return $this->hasMany(Comment::class , 'parent_id');
    }
}
