<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Filterable;

    public function tableName() { return "App\Models\User"; }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_admin',
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

    public function Attribute() {
        return $this->hasOne(UserAttribute::class);
    }

    public function License() {
        return $this->hasOne(License::class);
    }

    public function Permission() {
        return $this->hasMany(Permission::class);
    }

    public function filterType(EloquentBuilder $query, $value)
    {
        if ($value) {
            $query->where('is_admin', $value);
            return $query;
        }
    }
}
