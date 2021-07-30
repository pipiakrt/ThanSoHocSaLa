<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'author',
        'type',
        'description',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'date',
    ];

    public function filterOrder(EloquentBuilder $query, $value)
    {
        $query->orderBy('id', $value);
        return $query;
    }

    public function filterStatus(EloquentBuilder $query, $value)
    {
        if ($value) {
            $query->where('status', $value);
            return $query;
        }
    }

    public function filterType(EloquentBuilder $query, $value)
    {
        if ($value) {
            $query->where('type', $value);
            return $query;
        }
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        $query->where('name', 'like', '%' . $value . '%');
        return $query;
    }
}
