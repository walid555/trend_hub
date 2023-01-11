<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = [
        'title',
        'user_id',
    ];

    function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
