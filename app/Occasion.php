<?php

namespace App;

use App\BaseModel;

class Occasion extends BaseModel
{

	public function occasion_registration()
    {
    	return $this->hasMany('App\OccasionRegistration');
    }

	public function occasion_registration_view()
    {
    	return $this->hasMany('App\OccasionRegistrationView');
    }
}
