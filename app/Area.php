<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function getCountry()
	{
		return $this->hasOne('App\Country','id','country_id')->where('status',1);
	}
	
	public function getState()
	{
		return $this->hasOne('App\State','id','state_id')->where('status',1);
	}
	
	public function getCity()
	{
		return $this->hasOne('App\City','id','city')->where('status',1);
	}
}
