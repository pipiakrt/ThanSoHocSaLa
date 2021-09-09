<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Permission extends JsonResource
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
            'phongban' => $this->phongban,
            'vitri' => $this->vitri,
            'email' => $this->email,
            "permissions" => $this->Permission,
            "attribute" => $this->Attribute,
        ];
    }
}
