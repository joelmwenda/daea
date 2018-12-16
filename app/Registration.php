<?php

namespace App;

use App\BaseModel;

class Registration extends BaseModel
{

	

    public function deduction()
    {
        return $this->belongsTo('App\Deduction');
    }
}
