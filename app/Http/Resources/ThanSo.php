<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThanSo extends JsonResource
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
            'code' => $this->page_code,
            'content' => $this->page_content,
            'title' => $this->page_description,
            'type' => $this->page_name,
            'updated_at' => $this->updated_at,
        ];
    }
}
