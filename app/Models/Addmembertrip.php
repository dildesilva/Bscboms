<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addmembertrip extends Model
{
    protected $fillable = [
        'memberEmail',
        'tripID'


    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'memberEmail', 'email');
    }
    public function tripmemberdetiles()
    {

        return $this->belongsTo(TripMemberDetiles::class, 'memberEmail', 'userEmailId');
    }

     public function tripcreatemodel()
    {
        // return $this->hasMany(Expense::class, 'tripID', 'id');
        return $this->belongsTo(Tripcreatemodel::class, 'tripID', 'id');
    }
}
