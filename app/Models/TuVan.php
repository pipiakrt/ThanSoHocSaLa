<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuVan extends Model
{
    use HasFactory;

    public function tableName() { return "App\Models\TuVan"; }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthdate',
    ];
}
