<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entrance_logs extends Model
{
  public function Users()
  {
    return $this->belongsTo('App\User');
  }
}
