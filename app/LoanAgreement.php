<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanAgreement extends Model
{
    public function loanDealers(){
		return $this->hasOne('App\Dealer','id','loan_ag_dealer');
	}

    public function loanProduct(){
		return $this->hasOne('App\Product','id','loan_ag_product');
	}

    public function totalEmis(){
		return $this->hasMany('App\Emi','loan_id','id');
	}
}
