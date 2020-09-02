<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\LoanAgreement;
use App\Product;
use App\Surveyor;
use App\State;
use App\FieldExecutive;
use App\Dealer;
use App\Loan;
use App\LoansReference;
use App\LoansCoBorrower;
use App\LoansGuarantor;
use Excel;
use Session;
use DB;

class LoanApplication extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	public function index(Request $request){
		$query = Loan::with(["LoansReferences", "LoansCoBorrowers", "LoansGuarantors", "loanDealers", "loanProduct"]);
		if($request->loan_ag_caseno){
			$query = $query->where('loan_ag_caseno', 'like', '%'.$request->loan_ag_caseno.'%');
		}
		if($request->invoice_value){
			$query = $query->where('invoice_value', $request->invoice_value_operate, $request->invoice_value);
		}
		if($request->down_payment){
			$query = $query->where('down_payment', $request->down_payment_operate, $request->down_payment);
		}
		if($request->loan_ac_no){
			$query = $query->where('loan_ac_no', $request->loan_ac_no_operate, $request->loan_ac_no);
		}
		if($request->loan_amount){
			$query = $query->where('loan_amount', $request->loan_amount_operate, $request->loan_amount);
		}
		if($request->loan_interest){
			$query = $query->where('loan_interest', $request->loan_interest_operate, $request->loan_interest);
		}
		if($request->loan_for_month){
			$query = $query->where('loan_for_month', $request->loan_for_month_operate, $request->loan_for_month);
		}
		if($request->loan_ag_date){
			$query = $query->where('loan_ag_date', $request->loan_ag_date_operate, strtotime($request->loan_ag_date));
		}
		
		
		//--- Reference Condition -------//
		if($request->reference_name || $request->reference_name || $request->reference_name || $request->reference_name){
			$LoansReference = LoansReference::select('loan_id')->where(function ($Reference) use ($request) {
									$Reference->where(function ($Ref) use ($request) {
											if($request->reference_name){
												$Ref = $Ref->where('borrower_reference_1_name', 'like', '%'.$request->reference_name.'%');
											}
											if($request->reference_relation){
												$Ref = $Ref->where('borrower_reference_1_relation', 'like', '%'.$request->reference_relation.'%');
											}
											if($request->reference_addr){
												$Ref = $Ref->where('borrower_reference_1_addr', 'like', '%'.$request->reference_addr.'%');
											}
											if($request->reference_phone){
												$Ref = $Ref->where(function ($Re) use ($request) {
															$Re = $Re->where('borrower_reference_1_phone_office', 'like', '%'.$request->reference_phone.'%');
															$Re = $Re->orWhere('borrower_reference_1_phone_residence', 'like', '%'.$request->reference_phone.'%');
															$Re = $Re->orWhere('borrower_reference_1_phone_mobile', 'like', '%'.$request->reference_phone.'%');
														});
											}
										})->orWhere(function ($Ref) use ($request) {
											if($request->reference_name){
												$Ref = $Ref->where('borrower_reference_2_name', 'like', '%'.$request->reference_name.'%');
											}
											if($request->reference_relation){
												$Ref = $Ref->where('borrower_reference_2_relation', 'like', '%'.$request->reference_relation.'%');
											}
											if($request->reference_addr){
												$Ref = $Ref->where('borrower_reference_2_addr', 'like', '%'.$request->reference_addr.'%');
											}
											if($request->reference_phone){
												$Ref = $Ref->where(function ($Re) use ($request) {
															$Re = $Re->where('borrower_reference_2_phone_office', 'like', '%'.$request->reference_phone.'%');
															$Re = $Re->orWhere('borrower_reference_2_phone_residence', 'like', '%'.$request->reference_phone.'%');
															$Re = $Re->orWhere('borrower_reference_2_phone_mobile', 'like', '%'.$request->reference_phone.'%');
														});
											}
										});
								});
								
			
			$LoansReferences = $LoansReference->get();
			//dd($LoansReferences);
			//dd($LoansReference->toSql(), $LoansReference->getBindings());
			if($LoansReferences){
				$refs = array();
				foreach($LoansReferences as $val){
					$refs[] = $val->loan_id;
				}
				if(count($refs)>0)
					$query = $query->whereIn('id', $refs);
			}
		}
		//--- Co-Borrower Condition -------//
		if($request->co_borrower_pan || $request->co_borrower_aadhar || $request->co_borrower_name || $request->co_borrower_age || $request->co_borrower_care_of_name || $request->co_borrower_present_addr || $request->co_borrower_present_addr_landmark || $request->co_borrower_parmanent_addr || $request->co_borrower_present_addr_type || $request->co_borrower_telephone || $request->co_borrower_occupation){
			$LoansCoBorrower = LoansCoBorrower::select('loan_id');
			if($request->co_borrower_pan){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_pan', 'like', '%'.$request->co_borrower_pan.'%');
			}
			if($request->co_borrower_aadhar){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_aadhar', 'like', '%'.$request->co_borrower_aadhar.'%');
			}
			if($request->co_borrower_name){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_name', 'like', '%'.$request->co_borrower_name.'%');
			}
			if($request->co_borrower_age){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_age', $request->co_borrower_age_operate, $request->co_borrower_age);
			}
			if($request->co_borrower_care_of_name){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_care_of_name', 'like', '%'.$request->co_borrower_care_of_name.'%');
			}
			if($request->co_borrower_present_addr){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_present_addr', 'like', '%'.$request->co_borrower_present_addr.'%');
			}
			if($request->co_borrower_present_addr_landmark){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_present_addr_landmark', 'like', '%'.$request->co_borrower_present_addr_landmark.'%');
			}
			if($request->co_borrower_parmanent_addr){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_parmanent_addr', 'like', '%'.$request->co_borrower_parmanent_addr.'%');
			}
			if($request->co_borrower_present_addr_type){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_present_addr_type', 'like', '%'.$request->co_borrower_present_addr_type.'%');
			}
			if($request->co_borrower_telephone){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_telephone', 'like', '%'.$request->co_borrower_telephone.'%');
			}
			if($request->co_borrower_occupation){
				$LoansCoBorrower = $LoansCoBorrower->where('co_borrower_occupation', 'like', '%'.$request->co_borrower_occupation.'%');
			}
			$LoansCoBorrowers = $LoansCoBorrower->get();
			//dd($LoansCoBorrowers);
			//dd($LoansCoBorrowers->toSql(), $LoansCoBorrowers->getBindings());
			if($LoansCoBorrowers){
				$refs = array();
				foreach($LoansCoBorrowers as $val){
					$refs[] = $val->loan_id;
				}
				if(count($refs)>0)
					$query = $query->whereIn('id', $refs);
			}
		}
		//--- Guarantor Condition -------//
		if($request->guarantor_pan || $request->guarantor_aadhar || $request->guarantor_name || $request->guarantor_age || $request->guarantor_care_of_name || $request->guarantor_present_addr || $request->guarantor_present_addr_landmark || $request->guarantor_parmanent_addr || $request->guarantor_present_addr_type || $request->guarantor_telephone || $request->guarantor_occupation || $request->guarantor_family_income){
			$LoansGuarantor = LoansGuarantor::select('loan_id');
			if($request->guarantor_pan){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_pan', 'like', '%'.$request->guarantor_pan.'%');
			}
			if($request->guarantor_aadhar){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_aadhar', 'like', '%'.$request->guarantor_aadhar.'%');
			}
			if($request->guarantor_name){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_name', 'like', '%'.$request->guarantor_name.'%');
			}
			if($request->guarantor_age){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_age', $request->guarantor_age_operate, $request->guarantor_age);
			}
			if($request->guarantor_care_of_name){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_care_of_name', 'like', '%'.$request->guarantor_care_of_name.'%');
			}
			if($request->guarantor_present_addr){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_present_addr', 'like', '%'.$request->guarantor_present_addr.'%');
			}
			if($request->guarantor_present_addr_landmark){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_present_addr_landmark', 'like', '%'.$request->guarantor_present_addr_landmark.'%');
			}
			if($request->guarantor_parmanent_addr){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_parmanent_addr', 'like', '%'.$request->guarantor_parmanent_addr.'%');
			}
			if($request->guarantor_present_addr_type){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_present_addr_type', 'like', '%'.$request->guarantor_present_addr_type.'%');
			}
			if($request->guarantor_telephone){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_telephone', 'like', '%'.$request->guarantor_telephone.'%');
			}
			if($request->guarantor_occupation){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_occupation', 'like', '%'.$request->guarantor_occupation.'%');
			}
			if($request->guarantor_family_income){
				$LoansGuarantor = $LoansGuarantor->where('guarantor_family_income', $request->guarantor_family_income_operate, $request->guarantor_family_income);
			}
			$LoansGuarantors = $LoansGuarantor->get();
			//dd($LoansGuarantors);
			//dd($LoansGuarantors->toSql(), $LoansGuarantors->getBindings());
			if($LoansGuarantors){
				$refs = array();
				foreach($LoansGuarantors as $val){
					$refs[] = $val->loan_id;
				}
				if(count($refs)>0)
					$query = $query->whereIn('id', $refs);
			}
		}
		//--- Product Condition -------//
		if($request->loan_ag_product){
			$query = $query->where('loan_ag_product', '=', $request->loan_ag_product);
		}
		//--- Dealer Condition -------//
		if($request->dealer_pan || $request->dealer_aadhar || $request->dealer_name || $request->dealer_email || $request->dealer_telephone || $request->dealer_fax){
			$Dealer = Dealer::select('id');
			if($request->dealer_pan){
				$Dealer = $Dealer->where('pan', 'like', '%'.$request->dealer_pan.'%');
			}
			if($request->dealer_aadhar){
				$Dealer = $Dealer->where('aadhar', 'like', '%'.$request->dealer_aadhar.'%');
			}
			if($request->dealer_name){
				$Dealer = $Dealer->where('name', 'like', '%'.$request->dealer_name.'%');
			}
			if($request->dealer_email){
				$Dealer = $Dealer->where('email', 'like', '%'.$request->dealer_email.'%');
			}
			if($request->dealer_telephone){
				$Dealer = $Dealer->where('telephone', 'like', '%'.$request->dealer_telephone.'%');
			}
			if($request->dealer_fax){
				$Dealer = $Dealer->where('fax', 'like', '%'.$request->dealer_fax.'%');
			}
			$Dealers = $Dealer->get();
			//dd($Dealers);
			//dd($Dealers->toSql(), $Dealers->getBindings());
			if($Dealers){
				$refs = array();
				foreach($Dealers as $val){
					$refs[] = $val->id;
				}
				if(count($refs)>0)
					$query = $query->whereIn('loan_ag_dealer', $refs);
			}
		}
		//--- Surveyor Condition -------//
		if($request->surveyor_pan || $request->surveyor_aadhar || $request->surveyor_name || $request->surveyor_email || $request->surveyor_telephone || $request->surveyor_fax){
			$Surveyor = Surveyor::select('id');
			if($request->surveyor_pan){
				$Surveyor = $Surveyor->where('pan', 'like', '%'.$request->surveyor_pan.'%');
			}
			if($request->surveyor_aadhar){
				$Surveyor = $Surveyor->where('aadhar', 'like', '%'.$request->surveyor_aadhar.'%');
			}
			if($request->surveyor_name){
				$Surveyor = $Surveyor->where('name', 'like', '%'.$request->surveyor_name.'%');
			}
			if($request->surveyor_email){
				$Surveyor = $Surveyor->where('email', 'like', '%'.$request->surveyor_email.'%');
			}
			if($request->surveyor_telephone){
				$Surveyor = $Surveyor->where('telephone', 'like', '%'.$request->surveyor_telephone.'%');
			}
			if($request->surveyor_addr){
				$Surveyor = $Surveyor->where('address', 'like', '%'.$request->surveyor_addr.'%');
			}
			$Surveyors = $Surveyor->get();
			//dd($Surveyors);
			//dd($Surveyors->toSql(), $Surveyors->getBindings());
			if($Surveyors){
				$refs = array();
				foreach($Surveyors as $val){
					$refs[] = $val->id;
				}
				if(count($refs)>0)
					$query = $query->whereIn('surveyor_id', $refs);
			}
		}
		//--- Field Excutive Condition -------//
		if($request->field_excutive_pan || $request->field_excutive_aadhar || $request->field_excutive_name || $request->field_excutive_email || $request->field_excutive_telephone || $request->field_excutive_fax){
			$FieldExecutive = FieldExecutive::select('id');
			if($request->field_excutive_pan){
				$FieldExecutive = $FieldExecutive->where('pan', 'like', '%'.$request->field_excutive_pan.'%');
			}
			if($request->field_excutive_aadhar){
				$FieldExecutive = $FieldExecutive->where('aadhar', 'like', '%'.$request->field_excutive_aadhar.'%');
			}
			if($request->field_excutive_name){
				$FieldExecutive = $FieldExecutive->where('name', 'like', '%'.$request->field_excutive_name.'%');
			}
			if($request->field_excutive_email){
				$FieldExecutive = $FieldExecutive->where('email', 'like', '%'.$request->field_excutive_email.'%');
			}
			if($request->field_excutive_telephone){
				$FieldExecutive = $FieldExecutive->where('telephone', 'like', '%'.$request->field_excutive_telephone.'%');
			}
			if($request->field_excutive_addr){
				$FieldExecutive = $FieldExecutive->where('address', 'like', '%'.$request->field_excutive_addr.'%');
			}
			$FieldExecutives = $FieldExecutive->get();
			//dd($FieldExecutives);
			//dd($FieldExecutives->toSql(), $FieldExecutives->getBindings());
			if($FieldExecutives){
				$refs = array();
				foreach($FieldExecutives as $val){
					$refs[] = $val->id;
				}
				if(count($refs)>0)
					$query = $query->whereIn('fieldexcutive_id', $refs);
			}
		}
		
		//dd($query);
		//dd($query->toSql(), $query->getBindings());
		$result = $query->paginate(50);
		
		$products = Product::get();
		
		return view('loan_agreement',['result' => $result, 'products' => $products]);
	}

   public function getAddNew(){
		$products = Product::all();
		$dealers = Dealer::all();
		return view('loan_upload', ['products' => $products, 'dealers' => $dealers]);
   }

   public function saveLoanData(Request $request){
   		$path = $request->file('loan_file');
		$rows = \Excel::load($path->getPathName())->get();
		foreach($rows as $key=>$row){
			//echo '<pre>';print_r($row);die;
			//------------ ADDING NEW LOAN ACCOUNT -------------------//
			if(!empty(json_decode(json_encode($row->loan_ag_date))->date)){
				$date = strtotime(json_decode(json_encode($row->loan_ag_date))->date);
			}else{
				$date = strtotime($row->loan_ag_date);
			}
			$loans = new Loan;
			$loans->loan_ag_caseno = $row->loan_ag_caseno;
			$loans->loan_ag_product = $row->loan_ag_product;
			$loans->loan_ag_dealer = $row->loan_ag_dealer;
			$loans->loan_ag_date = strtotime($row->loan_ag_date);
			$loans->invoice_value = $row->invoice_value;
			$loans->down_payment = $row->down_payment;
			$loans->loan_ac_no = $row->loan_ac_no;
			$loans->loan_amount = $row->loan_amount;
			$loans->loan_for_month = $row->loan_for_month;
			$loans->loan_interest = $row->loan_interest;
			$loans->borrower_pan = $row->borrower_pan;
			$loans->borrower_aadhar = $row->borrower_aadhar;
			$loans->borrower_photo = $row->borrower_photo;
			$loans->borrower_name = $row->borrower_name;
			$loans->borrower_age = $row->borrower_age;
			$loans->borrower_care_of = $row->borrower_care_of;
			$loans->borrower_care_of_name = $row->borrower_care_of_name;
			$loans->borrower_present_addr = $row->borrower_present_addr;
			$loans->borrower_present_addr_landmark = $row->borrower_present_addr_landmark;
			$loans->borrower_parmanent_addr = $row->borrower_parmanent_addr;
			$loans->borrower_present_addr_type = $row->borrower_present_addr_type;
			$loans->borrower_occupation = $row->borrower_occupation;
			$loans->borrower_designation = $row->borrower_designation;
			$loans->borrower_office_addr = $row->borrower_office_addr;
			$loans->borrower_phone_office = $row->borrower_phone_office;
			$loans->borrower_phone_residence = $row->borrower_phone_residence;
			$loans->borrower_phone_mobile = $row->borrower_phone_mobile;
			$loans->borrower_job_type = $row->borrower_job_type;
			$loans->borrower_occupation_transfer = $row->borrower_occupation_transfer;
			$loans->borrower_family_income = $row->borrower_family_income;
			$loans->borrower_identity = $row->borrower_identity;
			$loans->borrower_identity_file = $row->borrower_identity_file;
			$loans->borrower_bankdetail = $row->borrower_bankdetail;
			$loans->borrower_bankdetail_file = $row->borrower_bankdetail_file;
			$loans->borrower_incomedetail = $row->borrower_incomedetail;
			$loans->borrower_incomedetail_fileborrower_incomedetail_file;
			if($loans->save()){
				//------------ ADDING NEW LOAN REFERENCES -------------------//
				$LoansReference = new LoansReference;
				$LoansReference->loan_id = $loans->id;
				$LoansReference->borrower_reference_1_name = $row->borrower_reference_1_name;
				$LoansReference->borrower_reference_1_relation = $row->borrower_reference_1_relation;
				$LoansReference->borrower_reference_1_addr = $row->borrower_reference_1_addr;
				$LoansReference->borrower_reference_1_phone_office = $row->borrower_reference_1_phone_office;
				$LoansReference->borrower_reference_1_phone_residence = $row->borrower_reference_1_phone_residence;
				$LoansReference->borrower_reference_1_phone_mobile = $row->borrower_reference_1_phone_mobile;
				$LoansReference->borrower_reference_2_name = $row->borrower_reference_2_name;
				$LoansReference->borrower_reference_2_relation = $row->borrower_reference_2_relation;
				$LoansReference->borrower_reference_2_addr = $row->borrower_reference_2_addr;
				$LoansReference->borrower_reference_2_phone_office = $row->borrower_reference_2_phone_office;
				$LoansReference->borrower_reference_2_phone_residence = $row->borrower_reference_2_phone_residence;
				$LoansReference->borrower_reference_2_phone_mobile = $row->borrower_reference_2_phone_mobile;
				$LoansReference->save();
				
				//------------ ADDING NEW LOAN CO-BORROWER -------------------//
				if(!empty(trim($row->co_borrower_name))){
					$LoansCoBorrower = new LoansCoBorrower;
					$LoansCoBorrower->loan_id = $loans->id;
					$LoansCoBorrower->co_borrower_pan = $row->co_borrower_pan;
					$LoansCoBorrower->co_borrower_aadhar = $row->co_borrower_aadhar;
					$LoansCoBorrower->co_borrower_name = $row->co_borrower_name;
					$LoansCoBorrower->co_borrower_age = $row->co_borrower_age;
					$LoansCoBorrower->co_borrower_care_of = $row->co_borrower_care_of;
					$LoansCoBorrower->co_borrower_care_of_name = $row->co_borrower_care_of_name;
					$LoansCoBorrower->co_borrower_present_addr = $row->co_borrower_present_addr;
					$LoansCoBorrower->co_borrower_present_addr_landmark = $row->co_borrower_present_addr_landmark;
					$LoansCoBorrower->co_borrower_parmanent_addr = $row->co_borrower_parmanent_addr;
					$LoansCoBorrower->co_borrower_present_addr_type = $row->co_borrower_present_addr_type;
					$LoansCoBorrower->co_borrower_occupation = $row->co_borrower_occupation;
					$LoansCoBorrower->co_borrower_designation = $row->co_borrower_designation;
					$LoansCoBorrower->co_borrower_office_addr = $row->co_borrower_office_addr;
					$LoansCoBorrower->co_borrower_phone_office = $row->co_borrower_phone_office;
					$LoansCoBorrower->co_borrower_phone_residence = $row->co_borrower_phone_residence;
					$LoansCoBorrower->co_borrower_phone_mobile = $row->co_borrower_phone_mobile;
					$LoansCoBorrower->save();
				}
				//------------ ADDING NEW LOAN GUARANTOR -------------------//
				if(!empty(trim($row->guarantor_name))){
					$LoansGuarantor = new LoansGuarantor;
					$LoansGuarantor->loan_id = $loans->id;
					$LoansGuarantor->guarantor_pan = $row->guarantor_pan;
					$LoansGuarantor->guarantor_aadhar = $row->guarantor_aadhar;
					$LoansGuarantor->guarantor_name = $row->guarantor_name;
					$LoansGuarantor->guarantor_age = $row->guarantor_age;
					$LoansGuarantor->guarantor_care_of = $row->guarantor_care_of;
					$LoansGuarantor->guarantor_care_of_name = $row->guarantor_care_of_name;
					$LoansGuarantor->guarantor_present_addr = $row->guarantor_present_addr;
					$LoansGuarantor->guarantor_present_addr_landmark = $row->guarantor_present_addr_landmark;
					$LoansGuarantor->guarantor_parmanent_addr = $row->guarantor_parmanent_addr;
					$LoansGuarantor->guarantor_present_addr_type = $row->guarantor_present_addr_type;
					$LoansGuarantor->guarantor_occupation = $row->guarantor_occupation;
					$LoansGuarantor->guarantor_designation = $row->guarantor_designation;
					$LoansGuarantor->guarantor_office_addr = $row->guarantor_office_addr;
					$LoansGuarantor->guarantor_phone_office = $row->guarantor_phone_office;
					$LoansGuarantor->guarantor_phone_residence = $row->guarantor_phone_residence;
					$LoansGuarantor->guarantor_phone_mobile = $row->guarantor_phone_mobile;
					$LoansGuarantor->guarantor_job_type = $row->guarantor_job_type;
					$LoansGuarantor->guarantor_occupation_transfer = $row->guarantor_occupation_transfer;
					$LoansGuarantor->guarantor_family_income = $row->guarantor_family_income;
					$LoansGuarantor->guarantor_identity = $row->guarantor_identity;
					$LoansGuarantor->guarantor_identity_file = $row->guarantor_identity_file;
					$LoansGuarantor->guarantor_bankdetail = $row->guarantor_bankdetail;
					$LoansGuarantor->guarantor_bankdetail_file = $row->guarantor_bankdetail_file;
					$LoansGuarantor->guarantor_incomedetail = $row->guarantor_incomedetail;
					$LoansGuarantor->guarantor_incomedetail_file = $row->guarantor_incomedetail_file;
					$LoansGuarantor->save();
				}
			}

		}
		/*if($req->hasFile('third_app_salary_certificate')) {
			$path = $req->third_app_salary_certificate->getClientOriginalName();
			$name = time() . '-' . $path;
			$save->third_app_salary_certificate = $req->file('third_app_salary_certificate')->storeAs('public/Loanagreement', $name);
		}*/
	
		 return redirect('/loan-application');

   }

   public function getEdit($id){

     $result = LoanAgreement::find($id);
	 $products = Product::all();
	 $dealers = Dealer::all();
     return view('loan_app_edit', ['result' => $result, 'products' => $products, 'dealers' => $dealers]);

   }

	public function getView($id){

	 $result = Loan::with(["LoansReferences", "LoansCoBorrowers", "LoansGuarantors", "loanDealers", "loanProduct", "locanSurveyor", "loanFieldExecutive"])->where('id',$id)->first();
     return view('loan_app_view', ['result' => $result]);

   }
   
   public function postEdit(Request $req, $id)
    {
    	
    	    $save	= LoanAgreement::find($id);
			$save->loan_ag_pannum =   $req->loan_ag_pannum;
			$save->loan_ag_aadhar  =  $req->loan_ag_aadhar;
			$save->loan_ag_name =   $req->loan_ag_name;
			$save->loan_ag_address  =  $req->loan_ag_address;
			$save->loan_ag_caseno  =  $req->loan_ag_caseno;
			$save->loan_ag_product  =  $req->loan_ag_product;
			$save->loan_ag_dealer  =  $req->loan_ag_dealer;
			$save->loan_ag_date  =  strtotime($req->loan_ag_date);
			$save->loan_app_name  =  $req->loan_app_name;
			$save->loan_app_product  =  $req->loan_app_product;
			$save->loan_app_invoice  =  $req->loan_app_invoice;
			$save->loan_app_down_payment  =  $req->loan_app_down_payment;
			$save->loan_app_loan_account  =  $req->loan_app_loan_account;
			$save->loan_app_loan_amount  =  $req->loan_app_loan_amount;
			$save->loan_app_month  =  $req->loan_app_month;
			$save->loan_app_interest  =  $req->loan_app_interest; 
			$save->loan_app_loandate =  strtotime($req->loan_app_loandate); 
			$save->loan_app_formonth  =  $req->loan_app_formonth;
			$save->first_loanapp_name  =  $req->first_loanapp_name;
			$save->first_loanapp_age  =  $req->first_loanapp_age;
			$save->first_loanapp_parent  =  $req->first_loanapp_parent;
			$save->first_loanapp_presesnt_res =  $req->first_loanapp_presesnt_res;
			$save->first_loanapp_landmark  =  $req->first_loanapp_landmark;
			$save->first_loanapp_per_homeaddr =  $req->first_loanapp_per_homeaddr;
			$save->first_loanapp_homeaddr_type  =  $req->first_loanapp_per_homeaddr_type; 
			$save->first_loanapp_occupation  =  $req->first_loanapp_occupation;
			$save->first_loanapp_designation  =  $req->first_loanapp_designation;
			$save->first_loanapp_nameoffice_addr  =  $req->first_loanapp_nameoffice_addr;
			$save->first_loanapp_office  =  $req->first_loanapp_office;
			$save->first_loanapp_residence  =  $req->first_loanapp_residence;
			$save->first_loanapp_mobile  =  $req->first_loanapp_mobile;
			$save->first_loanapp_postpermant  =  $req->first_loanapp_postpermant;
			$save->first_loanapp_your_occupation  =  $req->first_loanapp_your_occupation;
			$save->first_loanapp_gross_income  =  $req->first_loanapp_gross_income;
			$save->first_loanapp_votercard  =  $req->first_loanapp_votercard;
			$save->first_loanapp_salarycerticate  =  $req->first_loanapp_salarycerticate;
			$save->first_loanapp_refname  =  $req->first_loanapp_refname;
			$save->first_loanapp_relation  =  $req->first_loanapp_relation;
			$save->first_loanapp_addr  =  $req->first_loanapp_addr;
			$save->first_loanapp_tel  =  $req->first_loanapp_tel;
			$save->first_loanapp_ref2name  =  $req->first_loanapp_ref2name;
			$save->first_loanapp_relation2  =  $req->first_loanapp_relation2;
			$save->first_loanapp_address2  =  $req->first_loanapp_address2;
			$save->first_loanapp_tel2  =  $req->first_loanapp_tel2;
			$save->second_app_coborrower_name  =  $req->second_app_coborrower_name;
			$save->second_app_age  =  $req->second_app_age;
			$save->second_app_applicant_relation  =  $req->second_app_applicant_relation;
			$save->second_app_parent  =  $req->second_app_parent;
			$save->second_app_presentresi  =  $req->second_app_presentresi;
			$save->second_app_landmark  =  $req->second_app_landmark;
			$save->second_app_landmark  =  $req->second_app_landmark;
			$save->second_app_peraddr_type  =  $req->second_app_peraddr_type;
			$save->second_app_peraddr  =  $req->second_app_peraddr;
			$save->second_app_occupation  =  $req->second_app_occupation;
			$save->second_app_designation  =  $req->second_app_designation;
			$save->third_app_coborr_name  =  $req->third_app_coborr_name;
			$save->third_app_age  =  $req->third_app_age;
			$save->third_app_applicantrel  =  $req->third_app_applicantrel;
			$save->third_app_parent  =  $req->third_app_parent;
			$save->third_app_present_resid  =  $req->third_app_present_resid;
			$save->third_app_landmark  =  $req->third_app_landmark;
			$save->third_app_perhomeaddr  =  $req->third_app_perhomeaddr;
			$save->third_app_home_type  =  $req->third_app_home_type;
			$save->third_app_occupation  =  $req->third_app_occupation;
			$save->third_app_designation  =  $req->third_app_designation;
			$save->third_app_nameoffice_addr =  $req->third_app_nameoffice_addr;
			$save->third_app_office  =  $req->third_app_office;
			$save->third_app_residence  =  $req->third_app_residence;
			$save->third_app_mobile  =  $req->third_app_mobile;
			$save->third_app_postpermannt  =  $req->third_app_postpermannt;
			$save->third_app_your_occupation  =  $req->third_app_your_occupation;
			$save->third_app_gross_income  =  $req->third_app_gross_income;
			
			$save->finalag_agrment_made  =  $req->finalag_agrment_made;
			$save->finalag_date  =  strtotime($req->finalag_date);
			$save->finalag_kalindifirst  =  $req->finalag_kalindifirst;
			$save->finalag_borrowname  =  $req->finalag_borrowname;
			$save->finalag_gauranter  =  $req->finalag_gauranter;
			$save->finalag_loanpurchaseof  =  $req->finalag_loanpurchaseof;
			$save->pronote_rs  =  $req->pronote_rs;
			$save->pronote_date =  strtotime($req->pronote_date); 
			$save->pronote_ondemand  =  $req->pronote_ondemand;
			$save->pronote_parent  =  $req->pronote_parent;
			$save->pronote_rsidentof  =  $req->pronote_rsidentof;
			$save->pronote_coborrower  =  $req->pronote_coborrower;
			$save->pronote_co_parent  =  $req->pronote_co_parent;
			$save->pronote_co_residentof  =  $req->pronote_co_residentof;
			$save->pronote_co_guarantor  =  $req->pronote_co_guarantor;
			$save->pronote_co_guarantor_parent  =  $req->pronote_co_guarantor_parent;
			$save->pronote_co_guarantor_resident  =  $req->pronote_co_guarantor_resident;
			$save->pronote_someofrupee  =  $req->pronote_someofrupee;
			$save->pronote_interest  =  $req->pronote_interest;
			$save->pronote_date2  =  strtotime($req->pronote_date2);
			$save->pronote_place  =  $req->pronote_place;

			if($req->hasFile('first_loanapp_bankdetail')) {
	     		$path = $req->first_loanapp_bankdetail->getClientOriginalName();
	     		$name = time() . '-' . $path;
	     		$save->first_loanapp_bankdetail = $req->file('first_loanapp_bankdetail')->storeAs('public/Loanagreement', $name);
	     	}
	     	if($req->hasFile('first_loanapp_votercard')) {
	     		$path = $req->first_loanapp_votercard->getClientOriginalName();
	     		$name = time() . '-' . $path;
	     		$save->first_loanapp_votercard = $req->file('first_loanapp_votercard')->storeAs('public/Loanagreement', $name);
	     	}
	     	if($req->hasFile('first_loanapp_salarycerticate')) {
	     		$path = $req->first_loanapp_salarycerticate->getClientOriginalName();
	     		$name = time() . '-' . $path;
	     		$save->first_loanapp_salarycerticate = $req->file('first_loanapp_salarycerticate')->storeAs('public/Loanagreement', $name);
	     	}


	     	if($req->hasFile('third_app_votercard')) {
	     		$path = $req->third_app_votercard->getClientOriginalName();
	     		$name = time() . '-' . $path;
	     		$save->third_app_votercard = $req->file('third_app_votercard')->storeAs('public/Loanagreement', $name);
	     	}
	     	if($req->hasFile('third_app_bankdetail')) {
	     		$path = $req->third_app_bankdetail->getClientOriginalName();
	     		$name = time() . '-' . $path;
	     		$save->third_app_bankdetail = $req->file('third_app_bankdetail')->storeAs('public/Loanagreement', $name);
	     	}
	     	if($req->hasFile('third_app_salary_certificate')) {
	     		$path = $req->third_app_salary_certificate->getClientOriginalName();
	     		$name = time() . '-' . $path;
	     		$save->third_app_salary_certificate = $req->file('third_app_salary_certificate')->storeAs('public/Loanagreement', $name);
	     	}
			$save->save();
		    return redirect('/loan-application');
    }

    public function deletePost($id){
    	 $loan = LoanAgreement::find($id)->delete();
         return redirect('/loan-application');
    }
}
