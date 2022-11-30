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
   $actors = array();
    foreach ($this->actor as $actor) {
        array_push($actors, $actor->name);
    }

        return [

        'id' => $this->id,
        'title' => $this->title,
        'genre'=>$this->genre,
        'synopsis'=>$this->synopsis,
        'user_rating'=>$this->user_rating,
        'creator'=>$this->creator,
        'seasons'=>$this->seasons,
        'src'=>$this->src,
        'network_id'=>$this->network_id,
        'network_name'=>$this->network_name,
        'network_address'=>$this->network_address,
        'actors' => $actors


        
        ];
    }
}
