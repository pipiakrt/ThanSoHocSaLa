<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanSo extends Model
{
    use HasFactory;

    protected $table = 'contents';
    protected $primary = 'id';
    public $timestamps = false;

    protected $fillable = [
        'image',
        'page_code',
        'page_content',
        'page_description',
        'page_key',
        'page_name',
        'type',
        'update_date',
    ];
}
