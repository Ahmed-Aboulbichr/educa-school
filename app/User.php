<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 
        'lastName',
        'email',
        'password',
        'address', 
        'cin', 
        'phone',
        'fix',
        'picture',
        'companyName', 
        'companyEmail', 
        'activities',
        'fbLinkPage',
        'igLinkPage',
        'website',
        'description',
        'comission',
        'transport_id',
        'livingCity_id',
    ];

    public function workCities(){
        return $this->belongsToMany(City::class);
    }

    public function livingCity(){
        return $this->belongsTo(City::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function transport(){
        return $this->belongsTo(Transport::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
