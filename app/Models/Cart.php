<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Filterable;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function Product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
