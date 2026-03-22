<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'accountsType',
        'contactnumber',
        'accountDP',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function boat()
    {
        return $this->hasOne(Boat::class, 'boatId', 'email');

    }
    public function boatRecodeUpdate()
    {
        return $this->hasOne(Boat::class, 'boatId', 'email');

    }
    public function tripcreatemodels()
    {
        return $this->hasMany(Tripcreatemodel::class, 'boaTemail', 'email');
    }
    public function Addmembertrip()
    {
        return $this->hasMany(Addmembertrip::class, 'memberEmail', 'email');
    }
public function tripMemberDetails()
{
    return $this->hasOne(TripMemberDetiles::class, 'userEmailId', 'email');
}
public function tripMemberDetiles()
{
    return $this->hasOne(TripMemberDetiles::class, 'userEmailId', 'email');
}

}
