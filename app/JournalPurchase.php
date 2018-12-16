<?php

namespace App;

use App\BaseModel;

class JournalPurchase extends BaseModel
{
	


    public function deduction()
    {
        return $this->belongsTo('App\Deduction');
    }
}
