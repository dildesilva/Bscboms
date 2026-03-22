<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;

    protected $table = 'boats';

   protected $fillable = [
    // ── Boat Information
    'boatName',
    'boatId',
    'registrationNumber',
    'hullId',
    'year',
    'length',
    'maxCrew',
    'boattype',
    'enginemodel',
    'engineType',
    'enginePower',


];

    // Optional: Custom timestamps if you need them (defaults to created_at & updated_at)
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function user()
    {
        return $this->belongsTo(User::class, 'boatId', 'email');
    }

}
