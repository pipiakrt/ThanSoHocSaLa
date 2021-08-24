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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'author' => $this->author,
            'image' => $this->image,
            'type' => $this->type,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'content' => $this->content,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tags' => Tag::collection($this->Tags),
            'chuyenmuc' => ChuyenMuc::collection($this->ChuyenMuc),
        ];
    }
}
