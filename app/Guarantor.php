<?php

namespace App;

use App\Ambassador;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    //
    protected $fillable = [
        'name',
        'age',
        'occupation',
        'office_address',
        'home_address',
        'phone_number',
        'passport',
        'ambassador_id',
        'gender'
       ];
    
    public function ambassador(){
        return $this->belongsTo(Ambassador::class);
    }

}
