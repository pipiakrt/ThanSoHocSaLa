<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Checking extends JsonResource
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
            'name' => $this->name,
            'content' => $this->content,
            'phone' => $this->phone,
            'number' => $this->number,
            'created_at' => $this->created_at,
        ];
    }
}
