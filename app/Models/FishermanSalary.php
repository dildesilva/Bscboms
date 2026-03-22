<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishermanSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'emp_no',
        'amount',
        'payment_date',
        'slip_code',
        'rank',
        'notes',
        'bonus',
        'month',
    ];

    public function fisherman()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public function tripMemberDetails()
    {
        return $this->belongsTo(TripMemberDetiles::class, 'user_email', 'userEmailId');
    }
}
