<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login_hours extends Model
{
  public function users()
  {
    return $this->belongsTo('App\User');
  }
  public function log()
  {
    return $this->belongsTo('App\entrance_logs');
  }
}
