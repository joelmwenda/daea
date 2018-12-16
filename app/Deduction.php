<?php

namespace App;

use App\BaseModel;

class Deduction extends BaseModel
{


    public function registration()
    {
    	return $this->hasMany('App\Registration');
    }

    public function occassion_registration()
    {
    	return $this->hasMany('App\OccassionRegistration');
    }

    public function journal_purchase()
    {
    	return $this->hasMany('App\JournalPurchase');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pre_save()
    {
    	if($this->user->balance < $this->deduction_amount){
    		session(['toast_error' => 1, 'toast_message' => 'You have insufficient funds in your account to complete this transaction.']);
    		return false;
    	}
    	return $this->save();
    }

}
