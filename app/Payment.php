<?php

namespace App;

use App\BaseModel;

class Payment extends BaseModel
{
	

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
