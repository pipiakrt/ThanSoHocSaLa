<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Order extends Model
{
    use Filterable;

    public function tableName() { return "App\Models\Order"; }

    protected $fillable = [
        'user_id',
        'product_id',
        'code',
        'avatar',
        'name',
        'phone',
        'email',
        'price',
        'status',
        'note',
        'address',
        'bat_dau',
        'ket_thuc',
        'licenses',
        'payment',
        'product_name',
        'lendon_id',
        'xacnhan_id',
        'kichhoat_id',
        'province_id',
        'district_id',
        'ward_id',
    ];

    public function Product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function User() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function filterOrder(EloquentBuilder $query, $value)
    {
        $query->orderBy('id', $value);
        return $query;
    }

    public function filterPayment(EloquentBuilder $query, $value)
    {
        return $query->where('payment', $value);
    }

    public function filterProvince(EloquentBuilder $query, $value)
    {
        return $query->where('province_id', $value);
    }

    public function filterDistrict(EloquentBuilder $query, $value)
    {
        return $query->where('district_id', $value);
    }

    public function filterWard(EloquentBuilder $query, $value)
    {
        return $query->where('ward_id', $value);
    }

    public function filterStatus(EloquentBuilder $query, $value)
    {
        $query->where('status', $value);
        return $query;
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        return $query->where('code', 'like', '%' . $value . '%')->orWhere('name', 'like', '%' . $value . '%')->orWhere('phone', 'like', '%' . $value . '%')->orWhere('email', 'like', '%' . $value . '%');
    }
}
