<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function tableName() { return "App\Models\User"; }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'address',
        'birthdate',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Cart() {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function Order() {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function TraCuu() {
        return $this->hasMany(TraCuu::class, 'user_id');
    }

    public function License() {
        return $this->hasOne(License::class);
    }
}
