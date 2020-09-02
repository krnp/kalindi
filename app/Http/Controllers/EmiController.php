<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Product;
use App\Surveyor;
use App\State;
use App\FieldExecutive;
use App\Dealer;
use App\Emi;
use Session;
use Illuminate\Support\Facades\Storage;

class EmiController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getEmis(Request $request){
		$loanid = $request->id;
		$result = Loan::where('id',$loanid)->with(["loanProduct", "totalEmis"])->first();
		return view('emis',['result' => $result]);
	}
	
	public function payEmis(Request $request){
		$emiid = $request->id;
		$emiamount = $request->emiamount;
		$details = $request->mode;
		$mode = $request->mode;
		$paymenttdate = $request->paymenttdate;
		//dd(strtotime($paymenttdate));
		$emi = Emi::find($emiid);
		if($emiamount > 0){
			if($emiamount==$emi->emi_amount){
				$status = 2;
			}elseif($emiamount < $emi->emi_amount){
				$status = 1;
			}
			$emi->payment_amout = $emiamount;
			$emi->payment_date = strtotime($paymenttdate);
			$emi->mode = $mode;
			$emi->details = $details;
			$emi->status = $status;
			$emi->save();
			Session::flash('status', 'Emi ('.date("d F, Y",$emi->emi_date).') updated successfully!'); 
		}
		
		return redirect('loan-application/emis/'.$emi->loan_id);
	}
	
	public function postgenerateEmis(Request $request){
		$loanid = $request->id;
		$emiday = $request->emiday;
		
		$result = Loan::where('id',$loanid)->with(["loanProduct"])->first();
		$amount = $result->loan_amount - $result->down_payment;
		$interestAmount = $this->simpleInterest($amount, $result->loan_interest,  $result->loan_for_month);
		
		$emiamt = round(($amount + $interestAmount) / $result->loan_for_month,2);
		
		for($i=0;$i<$result->loan_for_month;$i++){
			$emi = new Emi;
			$emi->loan_id = $loanid;
			$emi->title = $result->loan_ag_caseno.' ('.$result->loanProduct->name.') ';
			$emi->emi_amount = $emiamt;
			$emi->emi_date = strtotime($emiday." +".$i." month");
			$emi->save();
		}
		return redirect('loan-application/emis/'.$loanid);
	}
   
	public function compoundInterest($amount, $rate, $months){
		$rate = $rate/12;
		$accumulated = round($amount * pow(1 + ($rate/100),$months), 2) - $amount; 
		return $accumulated;
	}
   
	public function simpleInterest($amount, $rate, $months){
		$rate = $rate/12;
		$accumulated = round((($amount * $rate * $months)/100),2); 
		return $accumulated;
	}
}
