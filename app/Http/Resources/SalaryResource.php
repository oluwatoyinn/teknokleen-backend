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
            'name'=>$this->name,
            'level'=>$this->level,
            'salary'=>$this->salary,
            'bankName'=>$this->bank_name,
            'accountNumber'=>$this->account_no,
            'holderName'=>$this->holderName,
            'taxReduction'=>$this->taxReduction,
            ];
    }
}
