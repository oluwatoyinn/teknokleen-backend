<?php

namespace App;

use App\Loan;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    public function loan(){
        return $this->belongsTo(Loan::class);
    }
}
