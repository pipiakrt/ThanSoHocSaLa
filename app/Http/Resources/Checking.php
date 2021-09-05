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
            'id' => $this->id,
            'ip' => $this->ip,
            'url' => $this->url,
            'device' => $this->device,
            'screen' => $this->screen,
            'browser' => $this->browser,
            'user' => $this->User,
            'created_at' => $this->created_at,
        ];
    }
}
