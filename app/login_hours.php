<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login_hours extends Model
{
  public function users()
  {
    return $this->belongsTo('App\User');
  }
}
