<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyActivity extends Model
{
  protected $fillable = [
    'id', 'ka_title', 'ka_memper', 'ka_job', 'ka_desc', 'BMC_id','user_id',
  ];
  protected $table = 'key_activity';

  public function BMC()
  {
    return $this->belongsTo('App\BMC');
  }
}
