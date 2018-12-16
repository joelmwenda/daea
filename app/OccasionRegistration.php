<?php

namespace App;

use App\BaseModel;

class OccasionRegistration extends BaseModel
{


    public function deduction()
    {
        return $this->belongsTo('App\Deduction');
    }
}
