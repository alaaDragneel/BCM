<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TeamWork extends Authenticatable
{
  protected $table = 'teamWorks';
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
    'name', 'email', 'phoneNo', 'password', 'image', 'job',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
