<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{
    public function getCountry()
	{
		return $this->hasOne('App\Country','id','country_id');
	}
	 public function getState()
	{
		return $this->hasOne('App\State','id','state_id');
	}
	 public function getCity()
	{
		return $this->hasOne('App\City','id','city');
	}
}
