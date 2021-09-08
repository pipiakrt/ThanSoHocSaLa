<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as MySQL;

class Slider extends MySQL
{
    use HasFactory;

    public function tableName() { return "App\Models\Slider"; }

    protected $fillable = [
        'path',
        'link',
    ];

    public $timestamps = false;
}
