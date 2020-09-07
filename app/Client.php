<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable = [
        'company_name',
        'contract_value',
        'website',
        'contact_person',
        'contact_no',
        'state',
        'city',
        'gender'
       ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
