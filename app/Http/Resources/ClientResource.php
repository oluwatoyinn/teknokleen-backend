<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'companyName'=>$this->company_name,
            'address'=>$this->address,
            'state'=>$this->state,
            'city'=>$this->city,
            'website'=>$this->website,
            'email'=>$this->email,
            'contactPerson'=>$this->contact_person,
            'contactNo'=>$this->contact_no,
            'contractValue'=>$this->contract_value,
            ];
    }
}
