<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanSo extends Model
{
    use HasFactory;

    protected $fillable = [
        'conso',
        'chisoduongdoi',
        'chisosumenh',
        'chisonhancach',
        'chisokhuyetthieu',
        'bieudonangluc',
        'chiso',
        'chiso',
    ];

    protected $casts = [
        'conso' => 'integer',
        'chisoduongdoi' => 'array',
    ];
}
