<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSegment extends Model
{
  protected $table = 'customer_segments';
  protected $fillable = [
  'gender', 'ageFrom', 'ageTo', 'country', 'governorate', 'city', 'BMC_id',
  ];
}
