<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catchfish extends Model
{

    protected $fillable=[
        'date',
        'tripId',
        'fish',
        'quantity',
        'weight'
    ];
    public function tripcreatemodel()
    {
        return $this->belongsTo(Tripcreatemodel::class, 'tripId', 'id');
    }
}
