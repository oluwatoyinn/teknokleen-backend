<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
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
            'salary'=>$this->salary,
            'amountBorowed'=>$this->amount_borowed,
            'quarantor'=>$this->quarantor,
            'paymentMethod'=>$this->payment_method,
            'deduction'=>$this->deduction,
            'amountPaid'=>$this->amount_paid,
            'loanBalance'=>$this->loan_balance
        ];
       
    }
}
