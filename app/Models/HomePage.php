<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    public function tableName() { return "App\Models\HomePage"; }

    protected $fillable = [
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
