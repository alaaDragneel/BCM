<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValuePorposition extends Model
{
  protected $fillable = [
    'id', 'vp_title', 'vp_desc', 'BMC_id',
  ];

  protected $table = 'value_porposition';

  public function BMC()
  {
    return $this->belongsTo('App\BMC');
  }
}
