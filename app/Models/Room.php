<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path',
        'category',
        'features',
        'size',
        'max_guests',
        'rating',
        'theme',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
