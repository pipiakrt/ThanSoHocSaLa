<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Menu extends JsonResource
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
            'image' => $this->image,
            'link' => $this->link,
            'type' => $this->type,
            'attributes' => $this->attributes,
        ];
    }
}
