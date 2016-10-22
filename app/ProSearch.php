<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProSearch extends Model
{
	protected $connection = 'mysqlP';

	protected $table = 'users';
}
