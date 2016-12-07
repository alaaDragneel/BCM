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

    'firstName', 'lastName', 'name', 'email', 'account_type', 'sns_account_id', 'phoneNo', 'password', 'image', 'back_image', 'job', 'description', 'address', 'companyStartFrom', 'userType', 'premium',
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

  public function Log()
  {
    return $this->hasMany('App\entrance_logs');
  }
  public function hour()
  {
    return $this->hasMany('App\login_hours');
  }
}
