<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Promotion extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'number' => $this->number,
            'code' => $this->code,
            'start' => $this->start,
            'end' => $this->end,
        ];
    }
}
