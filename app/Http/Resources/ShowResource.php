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
        'title' => $this->title,
        'genre'=>$this->genre,
        'synopsis'=>$this->synopsis,
        'user_rating'=>$this->user_rating,
        'network'=>$this->network,
        'creator'=>$this->creator,
        'seasons'=>$this->seasons,
        'src'=>$this->src


        
        ];
    }
}
