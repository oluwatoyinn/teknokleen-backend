<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'firstName'=>$this->first_name,
            'middleName'=>$this->middle_name,
            'lastName'=>$this->last_name,
            'email'=>$this->email,
            'gender'=>$this->gender,
            'DOB'=>$this->birth_date,       
            'phoneNumber'=>$this->phone_number,
            'employedDate'=>$this->employed_date,
            ];

    }
}
