<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViewModel extends Model
{
    use SoftDeletes;


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function deduction()
    {
        return $this->belongsTo('App\Deduction');
    }
}
