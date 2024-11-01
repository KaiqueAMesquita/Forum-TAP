<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description'

    ];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
