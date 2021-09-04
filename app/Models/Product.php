<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'price_origin',
        'price',
        'promotion',
        'options',
        'description',
        'content',
        'status',
        'number',
        'sort'
    ];

    protected $casts = [
        'status' => 'boolean',
        'options' => 'array',
        'promotion' => 'array',
    ];
}
