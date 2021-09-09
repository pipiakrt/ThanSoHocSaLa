<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Traits\Filterable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Filterable;

    public function tableName() { return "App\Models\Admin"; }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_admin',
        'name',
        'phongban',
        'vitri',
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

    public function Permission() {
        return $this->hasMany(Permission::class);
    }

    public function filterOrder(EloquentBuilder $query, $value)
    {
        $query->orderBy('id', $value);
        return $query;
    }

    public function filterPhongban(EloquentBuilder $query, $value)
    {
        return $query->where('phongban', $value);
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        return $query->where('phongban', 'like', '%' . $value . '%')->orWhere('vitri', 'like', '%' . $value . '%')->orWhere('name', 'like', '%' . $value . '%')->orWhere('phone', 'like', '%' . $value . '%')->orWhere('email', 'like', '%' . $value . '%');
    }
}
