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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'code' => $this->code,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'price' => $this->price,
            'status' => $this->status,
            'bat_dau' => $this->bat_dau,
            'ket_thuc' => $this->ket_thuc,
            'licenses' => $this->User->License->number,
            'user' => new Account($this->User),
        ];
    }
}
