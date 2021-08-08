<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanSo extends Model
{
    use HasFactory, Filterable;

    protected $table = 'contents';
    protected $primary = 'id';

    protected $fillable = [
        'image',
        'page_code',
        'page_content',
        'page_description',
        'page_key',
        'page_name',
        'type',
    ];

    public function filterType(EloquentBuilder $query, $value)
    {
        if ($value) {
            $query->where('page_key', $value);
            return $query;
        }
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        $query->where('page_description', 'like', '%' . $value . '%');
        return $query;
    }
}
