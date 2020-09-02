<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account_heads extends Model
{
    protected $table = 'account_heads';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_code', 'account_name', 'account_type', 'type_name', 'suppler_code', 'suppler_name', 'credit_days', 'opening_bal', 'balance_type', 'balance_date', 'area', 'address1', 'address2', 'city', 'pincode', 'phone1', 'phone2', 'phone3', 'phone4',
    ];
}
