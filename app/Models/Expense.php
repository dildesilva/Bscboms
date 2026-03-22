<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    // Specify the table name (if it's different from the default)
    protected $table = 'expenses'; // Optional, Laravel will use 'expenses' by default

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'date_time',
        'description',
        'quantity',
        'unit',
        'amount','tripID'
    ];
    

    // Define any relationships, if applicable
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
    public function tripcreatemodel()
    {
        return $this->belongsTo(Tripcreatemodel::class, 'tripID', 'id');
    }

}
