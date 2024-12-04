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
        'commentable_id',
        'commentable_type'
    ];
    public function post(){
        return $this->morphOne(Post::class, 'postable');
    }

    // public function topic(): BelongsTo
    // {
    //     return $this->belongsTo(Topic::class);
    // }

    public function commentable()
    {
        return $this->morphTo();
    }


    public function replies()
    {
        return $this->hasMany(Comment::class, 'commentable_id')->where('commentable_type', Comment::class);
    }


}
