<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

        'id' => $this->id,
        'title' => $this->genre,
        'genre'=>$this->synopsis,
        'synopsis'=>$this->user_rating,
        'user_rating'=>$this->network,
        'network'=>$this->creator,
        'creator'=>$this->seasons,
        'seasons'=>$this->src


        
        ];
    }
}
