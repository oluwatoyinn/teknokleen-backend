<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResource extends JsonResource
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
            'name'=>$this->Name,
            'salary'=>$this->contract_value,
            'bankName'=>$this->bank_name,
            'accountNumber'=>$this->account_no,
            'holderName'=>$this->holderName,
            'taxReduction'=>$this->taxReduction,
            ];
    }
}
