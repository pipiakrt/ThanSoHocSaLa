<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuggestionProduct extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'url' => $this->avatar,
            'price' => $this->price,
            'video' => $this->video,
            'seo_title' => $this->seo_title,
            'number' => $this->number,
            'seo_description' => $this->seo_description,
            'seo_keyword' => $this->seo_keyword,
            'description' => $this->description,
            'images' => $this->images,
            'attributes' => $this->attributes,
            'content' => $this->content,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,
            'promotion_id' => $this->promotion_id,
            'promotion' => $this->Promotion ? $this->Promotion->title : '',
        ];
    }
}
