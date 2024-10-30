<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Post
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',

    ];
    public function post(){
        return $this->morphOne(Post::class, 'postable');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }


}
