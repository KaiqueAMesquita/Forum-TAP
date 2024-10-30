<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'id',
        'tie',

    ];

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class, 'topic_tags');
    }

    use HasFactory;
}