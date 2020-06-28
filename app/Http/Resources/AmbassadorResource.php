<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AmbassadorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
        'id'=>$this->id,
        'name'=>$this->name,
        'address'=>$this->address,
        'email'=>$this->email,
        'gender'=>$this->gender,
        'phoneNumber'=>$this->phone_number,
        'location'=>$this->location
        ];
    }
}
