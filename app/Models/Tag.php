<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Jenssegers\Mongodb\Eloquent\Model as MongoDB;
use Illuminate\Database\Eloquent\Model as MySQL;

class Tag extends MySQL
{
    use HasFactory;

    public function tableName() { return "App\Models\Tag"; }

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
