<?php

namespace App\Models;
;use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Topic extends Post
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
        'category_id'

    ];

    public function post(){
        return $this->morphOne(Post::class, 'postable');
    }

    // public function post(){

    //     return $this->belongsTo(Post::class);
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'topic_tags');
    }

    // public function comment(): HasMany
    // {
    //     return $this->belongsToMany(Comment::class);
    // }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
