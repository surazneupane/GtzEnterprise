<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','mname','lname','username', 'email', 'password','mobileNumber'
    ];

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

    public function roles()
    {

        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role)
    {
      if ($this->roles()->where('roletype', $role)->first()) {
        return true;
      }
      return false;
    }

    public function products()
    {

        return $this->hasMany('App\Product','user_id');
    }


    public function images()
    {

    return $this->morphMany('App\Image','imageable');
    }

    //mutator
public function setFnameAttribute($value)
{
$this->attributes['fname']=ucfirst($value);

}

public function setLnameAttribute($value)
{

    $this->attributes['lname']=ucfirst($value);
}
public function setPasswordAttribute($value)
{
$this->attributes['password']=Hash::make($value);

}




}
