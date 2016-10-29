<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamWork extends Model
{
     protected $table = 'teamworks';
     protected $fillable = [
        'name', 'email', 'phoneNo', 'password', 'image', 'job',
    ];


     public function user()
     {
          return $this->belongsTo('App\User');
     }
}
