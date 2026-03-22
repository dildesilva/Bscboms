<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripMemberDetiles extends Model
{
    protected $fillable = [
        'userEmailId',
        'name',
        'nic',
        'employer_number',
        'dob',
        'country',
        'rank',
        'gender',
        'phone_number',
    ];
       public function Addmembertrip()
    {
        return $this->hasMany(Addmembertrip::class, 'memberEmail', 'userEmailId');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'userEmailId', 'email');
}

}
