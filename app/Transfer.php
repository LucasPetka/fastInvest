<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'transfers';

    
    function from_user() {
        return $this->belongsTo('App\User', 'from', 'account_number');
    }

    function to_user() {
        return $this->belongsTo('App\User', 'to', 'account_number');
    }
}
