<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\OrderDetail as Model;
use Illuminate\Support\Arr;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->_id,
            'user_id' => $this->user_id,
            'payment' => $this->payment,
            'code' => $this->code,
            'total_money' => $this->total_money,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'user' => new Account($this->User),
            'products' => OrderDetail::collection(Model::where('order_id', $this->_id)->paginateFilter($request))
        ];
    }
}
