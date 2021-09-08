<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraCuu extends Model
{
    use HasFactory;

    public function tableName() { return "App\Models\TraCuu"; }

    protected $fillable = [
        'user_id',
        'email',
        'phone',
        'code',
        'type',
        'path',
        'data',
        'birthdate',
        'address',
        'name'
    ];

    protected $casts = [
        'data' => 'array',
        'type' => 'boolean',
    ];
}
