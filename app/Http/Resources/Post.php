<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
            'url' => $this->image,
            'description' => $this->description,
            'content' => $this->content,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'seo_keyword' => $this->seo_keyword,
        ];
    }
}
