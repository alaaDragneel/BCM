<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  /**
  * The attributes that are mass assignable.
  *
  *
  *
  *
  *
  *
  * @var array
  */
  protected $fillable = [

    'firstName', 'lastName', 'email', 'phoneNo', 'password', 'image', 'job', 'description', 'address', 'companyStartFrom', 'userType',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function TeamWorks()
  {
    return $this->hasMany('App\TeamWork');
  }
}
