<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id'
    ];

    public function postable(){
        return $this->morphTo();
    }

        // public function topic(){
        //     return $this->getHasOne(Topic::class, 'idPost');
        // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }



}
