<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',

    ];

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class, 'topic_tag');
    }

    use HasFactory;
}
