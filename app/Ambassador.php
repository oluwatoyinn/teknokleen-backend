<?php

namespace App;

use App\Guarantor;
use Illuminate\Database\Eloquent\Model;

class Ambassador extends Model
{
    //
    public function guarantor(){
        return $this->hasOne(Guarantor::class);
    }

    public function images(){
        return $this->hasMany(Guarantor::class);
    }
}
