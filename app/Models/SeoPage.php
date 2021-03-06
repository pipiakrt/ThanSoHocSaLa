<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    public function tableName() { return "App\Models\SeoPage"; }

    protected $fillable = [
        'url',
        'title',
        'keywords',
        'description',
        'schema',
    ];
}
