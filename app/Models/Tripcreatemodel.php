<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tripcreatemodel extends Model
{
    protected $fillable = [
        'departureLocation',
        'departureTime',
        'boat',
        'status',
        'emergency',
        'plannedArrivalTime',
        'boaTemail'
    ];

    public function expense()
    {
        return $this->hasMany(Expense::class, 'tripID', 'id');
    }

    public function catchfish()
    {
        return $this->hasMany(Catchfish::class, 'tripId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'boaTemail', 'email');
    }

    public function addmembertrip()
    {
        return $this->hasMany(Addmembertrip::class, 'tripID', 'id');
    }

}
