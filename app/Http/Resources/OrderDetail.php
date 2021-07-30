<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetail extends JsonResource
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
            'category_id' => $this->category_id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'number' => $this->number,
            'name' => $this->name,
            'slug' => $this->slug,
            'avatar' => $this->avatar,
            'price' => $this->price,
            'total_money' => $this->total_money,
        ];
    }
}
