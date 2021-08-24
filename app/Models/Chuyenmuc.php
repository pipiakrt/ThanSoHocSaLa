<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Jenssegers\Mongodb\Eloquent\Model as MongoDB;
use Illuminate\Database\Eloquent\Model as MySQL;

class Chuyenmuc extends MySQL
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
