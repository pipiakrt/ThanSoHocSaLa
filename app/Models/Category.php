<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Filterable;

    public function tableName() { return "App\Models\Category"; }

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];
}
