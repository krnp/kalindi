<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function loansReferences(){
		return $this->hasOne('App\LoansReference', 'loan_id', 'id');
	}

    public function loanscoBorrowers(){
		return $this->hasOne('App\LoansCoBorrower', 'loan_id', 'id');
	}

    public function loansGuarantors(){
		return $this->hasOne('App\LoansGuarantor', 'loan_id', 'id');
	}
	
	public function loanDealers(){
		return $this->hasOne('App\Dealer','id','loan_ag_dealer');
	}
	public function LoanDetail(){
		return $this->hasOne('App\LoanDetail','loan_id','id');
	}

    public function loanProduct(){
		return $this->hasOne('App\Product','id','loan_ag_product');
	}

    public function totalEmis(){
		return $this->hasMany('App\Emi','loan_id','id');
	}

    public function locanSurveyor(){
		return $this->hasOne('App\Surveyor','id','surveyor_id');
	}

    public function loanFieldExecutive(){
		return $this->hasOne('App\FieldExecutive','id','fieldexcutive_id');
	}
}
