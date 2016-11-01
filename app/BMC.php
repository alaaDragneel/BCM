<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BMC extends Model
{
  protected $fillable = [
    'id', 'name', 'description', 'user_id',
  ];
  protected $table = 'bmcs';

  public function Users()
  {
    return $this->belongsTo('App\User');
  }

  public function keyActivities()
  {
    return $this->hasMany('App\KeyActivity', 'bmcs', 'key_activity');
  }

}
