<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
	public function getAreas()
	{
		return $this->hasOne('App\Country','id','country_id');
	}
}
