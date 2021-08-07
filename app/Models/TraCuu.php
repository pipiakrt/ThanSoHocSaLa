<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraCuu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'type',
        'data',
        'birthdate',
        'name'
    ];

    protected $casts = [
        'data' => 'array',
        'type' => 'boolean',
    ];
}
