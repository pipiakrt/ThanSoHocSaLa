<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checking extends Model
{
    use HasFactory;

    public function tableName() { return "App\Models\Checking"; }

    protected $fillable = [
        'user_id',
        'ip',
        'url',
        'screen',
        'browser',
        'device',
    ];

    public function User() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
