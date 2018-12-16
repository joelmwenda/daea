<?php

namespace App;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Automatically creates hash for the user password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function get_boolean($value)
    {
        if($this->$value) return 'True';
        return 'False';
    }

    public function getBalanceAttribute()
    {
        $p = \App\Payment::selectRaw("sum(payment_amount) as amount")->where('user_id', $this->id)->first()->amount;
        $d = \App\Deduction::selectRaw("sum(deduction_amount) as amount")->where('user_id', $this->id)->first()->amount;
        return ($p-$d);
    }

    public function getIsMemberAttribute()
    {
        $p = \App\RegistrationView::where('end_date', '>', date('Y-m-d'))->where('user_id', $this->id)->first();
        if($p) return true;
        return false;
    }

    public function has_registered($occasion_id)
    {
        $p = OccasionRegistrationView::where(['occasion_id' => $occasion_id, 'user_id' => $this->id])->first();
        if($p) return true;
        return false;
    }

    public function has_journal($journal_id)
    {
        $p = JournalPurchaseView::where(['journal_id' => $journal_id, 'user_id' => $this->id])->first();
        if($p) return true;
        return false;
    }
}
