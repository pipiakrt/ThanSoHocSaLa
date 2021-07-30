<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Report extends JsonResource
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
            'phone' => $this->phone,
            'email' => $this->email,
            'content' => $this->content,
            'created_at' => $this->created_at,
        ];;
    }
}
