<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BMC extends Model
{
  protected $fillable = [
    'id', 'name', 'description', 'KP', 'KA', 'VP', 'CR', 'CS', 'KR', 'Ch', 'CST', 'RS', 'user_id',
  ];
  protected $table = 'bmcs';
}
