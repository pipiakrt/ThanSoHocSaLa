<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'slug' => $this->slug,
            'type' => $this->type,
            'avatar' => $this->avatar,
            'parent_id' => $this->parent_id,
        ];
    }
}
