<?php

namespace App;

use App\profile;
use App\post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function isadmin(){

  return $this->role=='admin';
    }



    public function haspicture(){

if (preg_match('/profilepicture/',$this->profile->picture,$match))

{

return true;
}
else
{
return false;

}







    }
    public function getavatar(){

$hash= md5(strtolower(trim($this->attributes['email'])));


return "http://gravatar.com/avatar/$hash";
    }

    public function getpicture(){


    
        return $this->profile->picture;
    }

public function profile(){



    return $this->hasOne(profile :: class);
}




public function posts(){

    return $this->hasMany(User ::class);



}

}

