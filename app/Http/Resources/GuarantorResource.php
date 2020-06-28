<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuarantorResource extends JsonResource
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
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'gender'=>$this->gender,
            'passport'=>$this->passport,
            'age'=>$this->age,
            'phoneNumber'=>$this->phone_number,
            'occupation'=>$this->occupation,
            'officeAdress'=>$this->office_address,
            'homeAdress'=>$this->home_address,
            'ambassador_id'=>$this->ambassador_id,
        ];
    }
}
