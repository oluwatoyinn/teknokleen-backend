<?php

namespace App;

use App\Salary;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    public function salary(){
        return $this->belongsTo(Salary::class);
    }
}
