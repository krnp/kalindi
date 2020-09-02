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
use DateTime;
use File;
//use App\Helpers\Common;



class LoanApplication extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(Request $request){
               $where ='';
        if($request->all()){
            
            if($request->loan_ag_caseno){
                $where .= "where loan_ag_caseno ='".$request->loan_ag_caseno."'";
            }

            if($request->invoice_value){
            $where .= "where invoice_value $request->invoice_value_operate $request->invoice_value";
            }

            if($request->down_payment){
            $where .= "where down_payment .$request->down_payment_operate $request->down_payment";
            }
            if($request->loan_ac_no){
            $where .= "where loan_ac_no .$request->loan_ac_no_operate $request->loan_ac_no";
            }
            if($request->loan_amount){
            $where .= "where loan_amount .$request->loan_amount_operate $request->loan_amount";
            }
            if($request->loan_interest){
            $where .= "where loan_interest .$request->loan_interest_operate $request->loan_interest";
            }


            if($request->loan_for_month){
            $where .= "where loan_for_month .$request->loan_for_month_operate $request->loan_for_month";

            }
            if($request->loan_ag_date){
            $where .= "where loan_ag_date .$request->loan_ag_date_operate strtotime($request->loan_ag_date)";

            }

            $sqlQuery = "SELECT loans.*, loan_details.lone_borrower_name as borrower, dealers.name as dealer FROM loans "
                          . "LEFT JOIN loan_details on loans.id = loan_details.loan_id "
                          . "LEFT JOIN dealers on loans.loan_ag_dealer = dealers.id "
                          . "LEFT JOIN loans_co_borrowers on loans.id = loans_co_borrowers.loan_id "
                          . $where;
            
            
                    $result = DB::select(DB::raw($sqlQuery));


             
        }else{
        
                $result = DB::table('loans')
                    ->leftJoin('loan_details', 'loans.id', '=', 'loan_details.loan_id')
                    ->leftJoin('dealers', 'loans.loan_ag_dealer', '=', 'dealers.id')
                    ->leftJoin('loans_co_borrowers', 'loans.id', '=', 'loans_co_borrowers.loan_id')
                    ->select('loans.*', 'dealers.name as dealer', 'loan_details.lone_borrower_name as borrower')
                    ->get();
        }
        
        
		
//		echo '<pre>';
//                print_r($result);exit;
		$products = Product::get();  
                	
		return view('loan_agreement',['result' => $result, 'products' => $products]);
	}
	
//	public function index(Request $request){
//		$result = DB::table('loans')
//                    ->leftJoin('loan_details', 'loans.id', '=', 'loan_details.loan_id')
//                    ->leftJoin('dealers', 'loans.loan_ag_dealer', '=', 'dealers.id')
//                    ->leftJoin('loans_co_borrowers', 'loans.id', '=', 'loans_co_borrowers.loan_id')
//                    ->select('loans.*', 'dealers.name as dealer', 'loan_details.lone_borrower_name as borrower')
//                    ->get();
//          //echo '<pre>';
//          //print_r($result);exit;
//		$products = Product::get();
//		return view('loan_agreement',['result' => $result, 'products' => $products]);
//	}

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
					$LoansCoBorrower->co_borrower_identity = $row->co_borrower_identity;
					$LoansCoBorrower->co_borrower_identity_file = $row->co_borrower_identity_file;
					$LoansCoBorrower->co_borrower_bankdetail = $row->co_borrower_bankdetail;
					$LoansCoBorrower->co_borrower_bankdetail_file = $row->co_borrower_bankdetail_file;
					$LoansCoBorrower->co_borrower_incomedetail = $row->co_borrower_incomedetail;
					$LoansCoBorrower->co_borrower_incomedetail_file = $row->co_borrower_incomedetail_file;
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

     $result = Loan::with('LoanDetail','loanDealers','loansGuarantors','loanscoBorrowers','loansReferences','loanProduct')->find($id);
     
     
   // echo '<pre>';
    //print_r($result->loansGuarantors);exit;
	 $products = Product::all();
	 $dealers = Dealer::all();
     return view('loan_app_edit', ['result' => $result, 'products' => $products, 'dealers' => $dealers]);

   }

	public function getView($id){

  $result = Loan::with('LoanDetail','loanDealers','loansGuarantors','loanscoBorrowers','loansReferences','loanProduct')->find($id);
     
          return view('loan_app_view', ['result' => $result]);

   }
   
   
   /*
    * @function: postEdit()
    * @description:
    * @created by: Ahsan Ahamad 
    * @updated by:
    * @created at: 03-08-2019
    * @updated at:
    */
   
   public function createLoan(Request $req)
    {   if($_POST){
    /****** START  code FOR UPDATE loan */  
        //echo '<pre>';
       // print_r($req->file());exit;
        
            $lone['loan_ag_caseno'] = $_POST['lone']['loan_ag_caseno'];
            $lone['loan_ag_product'] = $_POST['lone']['loan_ag_product'];
            $lone['loan_ag_dealer'] = $_POST['lone']['loan_ag_dealer'];
            $lone['loan_ag_date'] = $_POST['lone']['loan_ag_date'];
            $lone['invoice_value'] = $_POST['lone']['invoice_value'];
            $lone['down_payment'] = $_POST['lone']['down_payment'];
            $lone['loan_ac_no'] = $_POST['lone']['loan_ac_no'];
            $lone['loan_amount'] = $_POST['lone']['loan_amount'];
            $lone['loan_for_month'] = $_POST['lone']['loan_for_month'];
            $lone['loan_interest'] = $_POST['lone']['loan_interest'];
         
            $loneID = DB::table('loans')->insertGetId($lone);
      

    /****** END  code FOR UPDATE loan */   
    /****** START  code FOR UPDATE  */  
            
       $lone_details['loan_id'] =  $loneID;
       $lone_details['lone_borrower_name'] = $_POST['lone_details']['borrower_name'];
       $lone_details['lone_borrower_age'] = $_POST['lone_details']['borrower_age'];
       $lone_details['lone_borrower_care_of'] = $_POST['lone_details']['borrower_care_of'];
       $lone_details['lone_borrower_care_of_name'] = $_POST['lone_details']['borrower_care_of_name'];
       $lone_details['lone_borrower_present_addr'] = $_POST['lone_details']['borrower_present_addr'];
       $lone_details['lone_borrower_present_addr_ladmark'] = $_POST['lone_details']['borrower_present_addr_ladmark'];
       $lone_details['lone_borrower_parmanent_addr'] = $_POST['lone_details']['borrower_parmanent_addr'];
       $lone_details['lone_borrower_present_addr_type'] = $_POST['lone_details']['borrower_present_addr_type'];
       $lone_details['lone_borrower_occupation'] = $_POST['lone_details']['borrower_occupation'];
       $lone_details['lone_borrower_designation'] = $_POST['lone_details']['borrower_designation'];
       $lone_details['lone_borrower_office_addr'] = $_POST['lone_details']['borrower_office_addr'];
       $lone_details['lone_borrower_phone_office'] = $_POST['lone_details']['borrower_phone_office'];
       $lone_details['lone_borrower_phone_residence'] = $_POST['lone_details']['borrower_phone_residence'];
       $lone_details['lone_borrower_phone_mobile'] = $_POST['lone_details']['borrower_phone_mobile'];
       $lone_details['lone_borrower_job_type'] = $_POST['lone_details']['borrower_job_type'];
       $lone_details['lone_borrower_occupation'] = $_POST['lone_details']['borrower_occupation_transfer'];
       $lone_details['lone_borrower_family_income'] = $_POST['lone_details']['borrower_family_income'];
       $lone_details['lone_borrower_identity'] = $_POST['lone_details']['borrower_identity'];
     //  = $_POST['lone_details']['borrower_identity_file'];
       
        $image = $req->file('lone_details.borrower_identity_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $lone_details['lone_borrower_name']);
        $lone_details['lone_borrower_identity_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/images/loan_details/identity');
        $image->move($destinationPath, $lone_details['lone_borrower_identity_file']);
        }
       $lone_details['lone_borrower_bankdetail'] = $_POST['lone_details']['borrower_bankdetail'];
     //  $lone_details['lone_borrower_bankdetail_file'] = $_POST['lone_details']['borrower_bankdetail_file'];
       
       $image = $req->file('lone_details.borrower_bankdetail_file');
       if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $lone_details['lone_borrower_name']);
        $lone_details['lone_borrower_bankdetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loan_details/bankdetail');
        $image->move($destinationPath, $lone_details['lone_borrower_bankdetail_file']);
       }
        
       $lone_details['lone_borrower_incomedetail'] = $_POST['lone_details']['borrower_incomedetail'];
     //  $lone_details['lone_borrower_incomedetail_file'] = $_POST['lone_details']['borrower_incomedetail_file'];
       $image = $req->file('lone_details.borrower_incomedetail_file');
       if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $lone_details['lone_borrower_name']);
        $lone_details['lone_borrower_incomedetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loan_details/incomedetail');
        $image->move($destinationPath, $lone_details['lone_borrower_incomedetail_file']);
       }
        
           $lonetestID = DB::table('loan_details')->insertGetId($lone_details);

      
    /****** END  code FOR UPDATE  */   
    /****** START  code FOR UPDATE loans_references */  
        $loans_references['loan_id'] =  $loneID;
        $loans_references['borrower_reference_1_name'] = $_POST['loans_references']['reference_name'];
        $loans_references['borrower_reference_1_relation'] = $_POST['loans_references']['reference_relation'];
        $loans_references['borrower_reference_1_addr'] = $_POST['loans_references']['reference_addr'];
        $loans_references['borrower_reference_1_phone_office'] = $_POST['loans_references']['reference_phone_office'];
        $loans_references['borrower_reference_1_phone_residence'] = $_POST['loans_references']['reference_phone_residence'];
        $loans_references['borrower_reference_1_phone_mobile'] = $_POST['loans_references']['reference_phone_mobile'];
        $loans_references['borrower_reference_2_name'] = $_POST['loans_references']['reference_2_name'];
        $loans_references['borrower_reference_2_relation'] = $_POST['loans_references']['reference_2_relation'];
        $loans_references['borrower_reference_2_addr'] = $_POST['loans_references']['reference_2_addr'];
        $loans_references['borrower_reference_2_phone_office'] = $_POST['loans_references']['reference_2_phone_office'];
        $loans_references['borrower_reference_2_phone_residence'] = $_POST['loans_references']['reference_2_phone_residence'];
        $loans_references['borrower_reference_2_phone_mobile'] = $_POST['loans_references']['reference_2_phone_mobile'];
       $loneInsertedID = DB::table('loans_references')->insertGetId($loans_references);
       
       
    /****** END  code FOR UPDATE  */   
    /****** START  code FOR UPDATE  */  
        $loans_co['loan_id'] =  $loneID;
               $loans_co['co_borrower_name'] = $_POST['loans_co']['co_borrower_name'];
               $loans_co['co_borrower_age'] = $_POST['loans_co']['co_borrower_age'];
               $loans_co['co_borrower_care_of'] = $_POST['loans_co']['co_borrower_care_of'];
               $loans_co['co_borrower_care_of_name'] = $_POST['loans_co']['co_borrower_care_of_name'];
               $loans_co['co_borrower_present_addr'] = $_POST['loans_co']['co_borrower_present_addr'];
               $loans_co['co_borrower_present_addr_ladmark'] = $_POST['loans_co']['co_borrower_present_addr_ladmark'];
               $loans_co['co_borrower_parmanent_addr'] = $_POST['loans_co']['co_borrower_parmanent_addr'];
               $loans_co['co_borrower_present_addr_type'] = $_POST['loans_co']['co_borrower_present_addr_type'];
               $loans_co['co_borrower_occupation'] = $_POST['loans_co']['co_borrower_occupation'];
               $loans_co['co_borrower_designation'] = $_POST['loans_co']['co_borrower_designation'];
               $loans_co['co_borrower_office_addr'] = $_POST['loans_co']['co_borrower_office_addr'];
               $loans_co['co_borrower_phone_office'] = $_POST['loans_co']['co_borrower_phone_office'];
               $loans_co['co_borrower_phone_residence'] = $_POST['loans_co']['co_borrower_phone_residence'];
               $loans_co['co_borrower_phone_mobile'] = $_POST['loans_co']['co_borrower_phone_mobile'];
               $loans_co['co_borrower_identity'] = $_POST['loans_co']['co_borrower_identity'];
               //$loans_co['co_borrower_identity_file'] = $_POST['loans_co']['co_borrower_identity_file'];
               
        $image = $req->file('loans_co.co_borrower_identity_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_co['co_borrower_name']);
        $loans_co['co_borrower_identity_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_co/identity');
        $image->move($destinationPath, $loans_co['co_borrower_identity_file']);
        }
               $loans_co['co_borrower_bankdetail'] = $_POST['loans_co']['co_borrower_bankdetail'];
              // $loans_co['co_borrower_bankdetail_file'] = $_POST['loans_co']['co_borrower_bankdetail_file'];
        $image = $req->file('loans_co.co_borrower_bankdetail_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_co['co_borrower_name']);
        $loans_co['co_borrower_bankdetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_co/bankdetail');
        $image->move($destinationPath, $loans_co['co_borrower_bankdetail_file']);
        }
               $loans_co['co_borrower_incomedetail'] = $_POST['loans_co']['co_borrower_incomedetail'];
               //$loans_co['co_borrower_incomedetail_file'] = $_POST['loans_co']['co_borrower_incomedetail_file'];
               
        $image = $req->file('loans_co.co_borrower_incomedetail_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_co['co_borrower_name']);
        $loans_co['co_borrower_incomedetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_co/incomedetail');
        $image->move($destinationPath, $loans_co['co_borrower_incomedetail_file']);
        
        }
       // echo '<pre>';
     //   print_r($loans_co);exit;
                $loneInsertedID = DB::table('loans_co_borrowers')->insertGetId($loans_co);
       
    /****** END  code FOR UPDATE  */   
    /****** START  code FOR UPDATE  */ 
       $loans_guarantor['loan_id'] =  $loneID;
       $loans_guarantor['guarantor_name'] = $_POST['loans_guarantor']['guarantor_name'];
       $loans_guarantor['guarantor_age'] = $_POST['loans_guarantor']['guarantor_age'];
       $loans_guarantor['guarantor_care_of'] = $_POST['loans_guarantor']['guarantor_care_of'];
       $loans_guarantor['guarantor_care_of_name'] = $_POST['loans_guarantor']['guarantor_care_of_name'];
       $loans_guarantor['guarantor_present_addr'] = $_POST['loans_guarantor']['guarantor_present_addr'];
       $loans_guarantor['guarantor_present_addr_landmark'] = $_POST['loans_guarantor']['guarantor_present_addr_ladmark'];
       $loans_guarantor['guarantor_parmanent_addr'] = $_POST['loans_guarantor']['guarantor_parmanent_addr'];
       $loans_guarantor['guarantor_present_addr_type'] = $_POST['loans_guarantor']['guarantor_present_addr_type'];
       $loans_guarantor['guarantor_occupation'] = $_POST['loans_guarantor']['guarantor_occupation'];
       $loans_guarantor['guarantor_designation'] = $_POST['loans_guarantor']['guarantor_designation'];
       $loans_guarantor['guarantor_office_addr'] = $_POST['loans_guarantor']['guarantor_office_addr'];
       $loans_guarantor['guarantor_phone_office'] = $_POST['loans_guarantor']['guarantor_phone_office'];
       $loans_guarantor['guarantor_phone_residence'] = $_POST['loans_guarantor']['guarantor_phone_residence'];
       $loans_guarantor['guarantor_phone_mobile'] = $_POST['loans_guarantor']['guarantor_phone_mobile'];
       $loans_guarantor['guarantor_job_type'] = $_POST['loans_guarantor']['guarantor_job_type'];
       $loans_guarantor['guarantor_occupation_transfer'] = $_POST['loans_guarantor']['guarantor_occupation_transfer'];
       $loans_guarantor['guarantor_family_income'] = $_POST['loans_guarantor']['guarantor_family_income'];
       if(!$loans_guarantor['guarantor_family_income']){
           $loans_guarantor['guarantor_family_income']='0.00';
       }
       $loans_guarantor['guarantor_identity'] = $_POST['loans_guarantor']['guarantor_identity'];
    //   $loans_guarantor['guarantor_identity_file'] = $_POST['loans_guarantor']['guarantor_identity_file'];
       $image = $req->file('loans_guarantor.guarantor_identity_file');
       if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_guarantor['guarantor_name']);
        $loans_guarantor['guarantor_identity_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_guarantor/identity');
        $image->move($destinationPath, $loans_guarantor['guarantor_identity_file']);
       }
        
       $loans_guarantor['guarantor_bankdetail'] = $_POST['loans_guarantor']['guarantor_bankdetail'];
     //  $loans_guarantor['guarantor_bankdetail_file'] = $_POST['loans_guarantor']['guarantor_bankdetail_file'];
        $image = $req->file('loans_guarantor.guarantor_bankdetail_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_guarantor['guarantor_name']);
        $loans_guarantor['guarantor_bankdetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_guarantor/bankdetail');
        $image->move($destinationPath, $loans_guarantor['guarantor_bankdetail_file']);
        }
       $loans_guarantor['guarantor_incomedetail'] = $_POST['loans_guarantor']['guarantor_incomedetail'];
        $image = $req->file('loans_guarantor.guarantor_incomedetail_file');
       if(isset($image)){
        $nameImg = str_replace(' ', '-', $loans_guarantor['guarantor_name']);
        $loans_guarantor['guarantor_incomedetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_guarantor/incomedetail');
        $image->move($destinationPath, $loans_guarantor['guarantor_incomedetail_file']);
       }
        $loneInsertedID = DB::table('loans_guarantors')->insertGetId($loans_guarantor);
    
                     return redirect('/loan-application')->with('status', 'New Record saved Successfully');


        } 
      
       
       
	 $products = Product::all();
	 $dealers = Dealer::all();
     return view('create_lone', ['products' => $products, 'dealers' => $dealers]);
    }
   
   
   
   /*
    * @function: postEdit()
    * @description:
    * @created by: Ahsan Ahamad 
    * @updated by:
    * @created at: 03-08-2019
    * @updated at:
    */
   
   public function postEdit(Request $req, $id)
    {
  
      if($_POST){
    /****** START  code FOR UPDATE loan */  
        
            $lone['loan_ag_caseno'] = $_POST['lone']['loan_ag_caseno'];
            $lone['loan_ag_product'] = $_POST['lone']['loan_ag_product'];
            $lone['loan_ag_dealer'] = $_POST['lone']['loan_ag_dealer'];
            $lone['loan_ag_date'] = $_POST['lone']['loan_ag_date'];
            $lone['invoice_value'] = $_POST['lone']['invoice_value'];
            $lone['down_payment'] = $_POST['lone']['down_payment'];
            $lone['loan_ac_no'] = $_POST['lone']['loan_ac_no'];
            $lone['loan_amount'] = $_POST['lone']['loan_amount'];
            $lone['loan_for_month'] = $_POST['lone']['loan_for_month'];
            $lone['loan_interest'] = $_POST['lone']['loan_interest'];
         
            $loneInsertedID = DB::table('loans')->where('id',$_POST['lone']['id'])->update($lone);
      

    /****** END  code FOR UPDATE loan */   
    /****** START  code FOR UPDATE  */  
       $lone_details['loan_id'] =  $loneInsertedID;
       $lone_details['lone_borrower_name'] = $_POST['lone_details']['borrower_name'];
       $lone_details['lone_borrower_age'] = $_POST['lone_details']['borrower_age'];
       $lone_details['lone_borrower_care_of'] = $_POST['lone_details']['borrower_care_of'];
       $lone_details['lone_borrower_care_of_name'] = $_POST['lone_details']['borrower_care_of_name'];
       $lone_details['lone_borrower_present_addr'] = $_POST['lone_details']['borrower_present_addr'];
       $lone_details['lone_borrower_present_addr_ladmark'] = $_POST['lone_details']['borrower_present_addr_ladmark'];
       $lone_details['lone_borrower_parmanent_addr'] = $_POST['lone_details']['borrower_parmanent_addr'];
       $lone_details['lone_borrower_present_addr_type'] = $_POST['lone_details']['borrower_present_addr_type'];
       $lone_details['lone_borrower_occupation'] = $_POST['lone_details']['borrower_occupation'];
       $lone_details['lone_borrower_designation'] = $_POST['lone_details']['borrower_designation'];
       $lone_details['lone_borrower_office_addr'] = $_POST['lone_details']['borrower_office_addr'];
       $lone_details['lone_borrower_phone_office'] = $_POST['lone_details']['borrower_phone_office'];
       $lone_details['lone_borrower_phone_residence'] = $_POST['lone_details']['borrower_phone_residence'];
       $lone_details['lone_borrower_phone_mobile'] = $_POST['lone_details']['borrower_phone_mobile'];
       $lone_details['lone_borrower_job_type'] = $_POST['lone_details']['borrower_job_type'];
       $lone_details['lone_borrower_occupation'] = $_POST['lone_details']['borrower_occupation_transfer'];
       $lone_details['lone_borrower_family_income'] = $_POST['lone_details']['borrower_family_income'];
       $lone_details['lone_borrower_identity'] = $_POST['lone_details']['borrower_identity'];
     //  = $_POST['lone_details']['borrower_identity_file'];
       
        $image = $req->file('lone_details.borrower_identity_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $lone_details['lone_borrower_name']);
        $lone_details['lone_borrower_identity_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/images/loan_details/identity');
        $image->move($destinationPath, $lone_details['lone_borrower_identity_file']);
        }
       $lone_details['lone_borrower_bankdetail'] = $_POST['lone_details']['borrower_bankdetail'];
     //  $lone_details['lone_borrower_bankdetail_file'] = $_POST['lone_details']['borrower_bankdetail_file'];
       
       $image = $req->file('lone_details.borrower_bankdetail_file');
       if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $lone_details['lone_borrower_name']);
        $lone_details['lone_borrower_bankdetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loan_details/bankdetail');
        $image->move($destinationPath, $lone_details['lone_borrower_bankdetail_file']);
       }
        
       $lone_details['lone_borrower_incomedetail'] = $_POST['lone_details']['borrower_incomedetail'];
     //  $lone_details['lone_borrower_incomedetail_file'] = $_POST['lone_details']['borrower_incomedetail_file'];
       $image = $req->file('lone_details.borrower_incomedetail_file');
       if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $lone_details['lone_borrower_name']);
        $lone_details['lone_borrower_incomedetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loan_details/incomedetail');
        $image->move($destinationPath, $lone_details['lone_borrower_incomedetail_file']);
       }
        
                   $loneInsertedID = DB::table('loan_details')->where('id',$_POST['lone_details']['id'])->update($lone_details);

      
    /****** END  code FOR UPDATE  */   
    /****** START  code FOR UPDATE loans_references */  
        $loans_references['loan_id'] =  $loneInsertedID;
        $loans_references['borrower_reference_1_name'] = $_POST['loans_references']['reference_name'];
        $loans_references['borrower_reference_1_relation'] = $_POST['loans_references']['reference_relation'];
        $loans_references['borrower_reference_1_addr'] = $_POST['loans_references']['reference_addr'];
        $loans_references['borrower_reference_1_phone_office'] = $_POST['loans_references']['reference_phone_office'];
        $loans_references['borrower_reference_1_phone_residence'] = $_POST['loans_references']['reference_phone_residence'];
        $loans_references['borrower_reference_1_phone_mobile'] = $_POST['loans_references']['reference_phone_mobile'];
        $loans_references['borrower_reference_2_name'] = $_POST['loans_references']['reference_2_name'];
        $loans_references['borrower_reference_2_relation'] = $_POST['loans_references']['reference_2_relation'];
        $loans_references['borrower_reference_2_addr'] = $_POST['loans_references']['reference_2_addr'];
        $loans_references['borrower_reference_2_phone_office'] = $_POST['loans_references']['reference_2_phone_office'];
        $loans_references['borrower_reference_2_phone_residence'] = $_POST['loans_references']['reference_2_phone_residence'];
        $loans_references['borrower_reference_2_phone_mobile'] = $_POST['loans_references']['reference_2_phone_mobile'];
       $loneInsertedID = DB::table('loans_references')->where('id',$_POST['loans_references']['id'])->update($loans_references);
       
       
    /****** END  code FOR UPDATE  */   
    /****** START  code FOR UPDATE  */  
        $loans_co['loan_id'] =  $loneInsertedID;
               $loans_co['co_borrower_name'] = $_POST['loans_co']['co_borrower_name'];
               $loans_co['co_borrower_age'] = $_POST['loans_co']['co_borrower_age'];
               $loans_co['co_borrower_care_of'] = $_POST['loans_co']['co_borrower_care_of'];
               $loans_co['co_borrower_care_of_name'] = $_POST['loans_co']['co_borrower_care_of_name'];
               $loans_co['co_borrower_present_addr'] = $_POST['loans_co']['co_borrower_present_addr'];
               $loans_co['co_borrower_present_addr_ladmark'] = $_POST['loans_co']['co_borrower_present_addr_ladmark'];
               $loans_co['co_borrower_parmanent_addr'] = $_POST['loans_co']['co_borrower_parmanent_addr'];
               $loans_co['co_borrower_present_addr_type'] = $_POST['loans_co']['co_borrower_present_addr_type'];
               $loans_co['co_borrower_occupation'] = $_POST['loans_co']['co_borrower_occupation'];
               $loans_co['co_borrower_designation'] = $_POST['loans_co']['co_borrower_designation'];
               $loans_co['co_borrower_office_addr'] = $_POST['loans_co']['co_borrower_office_addr'];
               $loans_co['co_borrower_phone_office'] = $_POST['loans_co']['co_borrower_phone_office'];
               $loans_co['co_borrower_phone_residence'] = $_POST['loans_co']['co_borrower_phone_residence'];
               $loans_co['co_borrower_phone_mobile'] = $_POST['loans_co']['co_borrower_phone_mobile'];
               $loans_co['co_borrower_identity'] = $_POST['loans_co']['co_borrower_identity'];
               //$loans_co['co_borrower_identity_file'] = $_POST['loans_co']['co_borrower_identity_file'];
               
        $image = $req->file('loans_co.co_borrower_identity');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_co['co_borrower_name']);
        $loans_co['co_borrower_identity_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_co/identity');
        $image->move($destinationPath, $loans_co['co_borrower_identity_file']);
        }
               $loans_co['co_borrower_bankdetail'] = $_POST['loans_co']['co_borrower_bankdetail'];
              // $loans_co['co_borrower_bankdetail_file'] = $_POST['loans_co']['co_borrower_bankdetail_file'];
        $image = $req->file('loans_co.co_borrower_bankdetail_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_co['co_borrower_name']);
        $loans_co['co_borrower_bankdetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_co/bankdetail');
        $image->move($destinationPath, $loans_co['co_borrower_bankdetail_file']);
        }
               $loans_co['co_borrower_incomedetail'] = $_POST['loans_co']['co_borrower_incomedetail'];
               //$loans_co['co_borrower_incomedetail_file'] = $_POST['loans_co']['co_borrower_incomedetail_file'];
               
        $image = $req->file('loans_co.co_borrower_incomedetail');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_co['co_borrower_name']);
        $loans_co['co_borrower_incomedetail'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_co/incomedetail');
        $image->move($destinationPath, $loans_co['co_borrower_incomedetail']);
        
        }
                $loneInsertedID = DB::table('loans_co_borrowers')->where('id',$_POST['loans_co']['id'])->update($loans_co);
       
    /****** END  code FOR UPDATE  */   
                
                
    /****** START  code FOR UPDATE loans_references */  
        $loans_references['loan_id'] =  $loneInsertedID;
        $loans_references['borrower_reference_1_name'] = $_POST['loans_references']['reference_name'];
        $loans_references['borrower_reference_1_relation'] = $_POST['loans_references']['reference_relation'];
        $loans_references['borrower_reference_1_addr'] = $_POST['loans_references']['reference_addr'];
        $loans_references['borrower_reference_1_phone_office'] = $_POST['loans_references']['reference_phone_office'];
        $loans_references['borrower_reference_1_phone_residence'] = $_POST['loans_references']['reference_phone_residence'];
        $loans_references['borrower_reference_1_phone_mobile'] = $_POST['loans_references']['reference_phone_mobile'];
        $loans_references['borrower_reference_2_name'] = $_POST['loans_references']['reference_2_name'];
        $loans_references['borrower_reference_2_relation'] = $_POST['loans_references']['reference_2_relation'];
        $loans_references['borrower_reference_2_addr'] = $_POST['loans_references']['reference_2_addr'];
        $loans_references['borrower_reference_2_phone_office'] = $_POST['loans_references']['reference_2_phone_office'];
        $loans_references['borrower_reference_2_phone_residence'] = $_POST['loans_references']['reference_2_phone_residence'];
        $loans_references['borrower_reference_2_phone_mobile'] = $_POST['loans_references']['reference_2_phone_mobile'];
       $loneInsertedID = DB::table('loans_references')->where('id',$_POST['loans_references']['id'])->update($loans_references);
       
       
    /****** END  code FOR UPDATE  */   
    /****** START  code FOR UPDATE  */ 
       $loans_guarantor['loan_id'] =  $loneInsertedID;
       $loans_guarantor['guarantor_name'] = $_POST['loans_guarantor']['guarantor_name'];
       $loans_guarantor['guarantor_age'] = $_POST['loans_guarantor']['guarantor_age'];
       $loans_guarantor['guarantor_care_of'] = $_POST['loans_guarantor']['guarantor_care_of'];
       $loans_guarantor['guarantor_care_of_name'] = $_POST['loans_guarantor']['guarantor_care_of_name'];
       $loans_guarantor['guarantor_present_addr'] = $_POST['loans_guarantor']['guarantor_present_addr'];
       $loans_guarantor['guarantor_present_addr_landmark'] = $_POST['loans_guarantor']['guarantor_present_addr_ladmark'];
       $loans_guarantor['guarantor_parmanent_addr'] = $_POST['loans_guarantor']['guarantor_parmanent_addr'];
       $loans_guarantor['guarantor_present_addr_type'] = $_POST['loans_guarantor']['guarantor_present_addr_type'];
       $loans_guarantor['guarantor_occupation'] = $_POST['loans_guarantor']['guarantor_occupation'];
       $loans_guarantor['guarantor_designation'] = $_POST['loans_guarantor']['guarantor_designation'];
       $loans_guarantor['guarantor_office_addr'] = $_POST['loans_guarantor']['guarantor_office_addr'];
       $loans_guarantor['guarantor_phone_office'] = $_POST['loans_guarantor']['guarantor_phone_office'];
       $loans_guarantor['guarantor_phone_residence'] = $_POST['loans_guarantor']['guarantor_phone_residence'];
       $loans_guarantor['guarantor_phone_mobile'] = $_POST['loans_guarantor']['guarantor_phone_mobile'];
       $loans_guarantor['guarantor_job_type'] = $_POST['loans_guarantor']['guarantor_job_type'];
       $loans_guarantor['guarantor_occupation_transfer'] = $_POST['loans_guarantor']['guarantor_occupation_transfer'];
       $loans_guarantor['guarantor_family_income'] = $_POST['loans_guarantor']['guarantor_family_income'];
       if(!$loans_guarantor['guarantor_family_income']){
           $loans_guarantor['guarantor_family_income']='0.00';
       }
       $loans_guarantor['guarantor_identity'] = $_POST['loans_guarantor']['guarantor_identity'];
    //   $loans_guarantor['guarantor_identity_file'] = $_POST['loans_guarantor']['guarantor_identity_file'];
       $image = $req->file('loans_guarantor.guarantor_identity');
       if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_guarantor['guarantor_name']);
        $loans_guarantor['guarantor_identity_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_guarantor/identity');
        $image->move($destinationPath, $loans_guarantor['guarantor_identity_file']);
       }
        
       $loans_guarantor['guarantor_bankdetail'] = $_POST['loans_guarantor']['guarantor_bankdetail'];
     //  $loans_guarantor['guarantor_bankdetail_file'] = $_POST['loans_guarantor']['guarantor_bankdetail_file'];
        $image = $req->file('loans_guarantor.guarantor_bankdetail_file');
        if(isset($image)){
         
        $nameImg = str_replace(' ', '-', $loans_guarantor['guarantor_name']);
        $loans_guarantor['guarantor_bankdetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_guarantor/bankdetail');
        $image->move($destinationPath, $loans_guarantor['guarantor_bankdetail_file']);
        }
       $loans_guarantor['guarantor_incomedetail'] = $_POST['loans_guarantor']['guarantor_incomedetail'];
        $image = $req->file('loans_guarantor.guarantor_incomedetail_file');
       if(isset($image)){
        $nameImg = str_replace(' ', '-', $loans_guarantor['guarantor_name']);
        $loans_guarantor['guarantor_incomedetail_file'] = $nameImg.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/loans_guarantor/incomedetail');
        $image->move($destinationPath, $loans_guarantor['guarantor_incomedetail_file']);
       }
        $loneInsertedID = DB::table('loans_guarantors')->where('id',$_POST['loans_guarantor']['id'])->update($loans_guarantor);

        } 
                 return redirect('/loan-application');

    }

    public function deletePost($id){
    	 $loan = LoanAgreement::find($id)->delete();
         return redirect('/loan-application');
    }
    public function emisStatus($status= null, $id= null){
        $updateStatus['loan_status'] = $status;
        $loneInsertedID = DB::table('loans')->where('id',$id)->update($updateStatus);
        if($loneInsertedID){
            
        $result = DB::table('loans')->where('id',$id)->first();
        if($status == 1){
        $emis = DB::table('emis')->where('loan_id',$id)->get();
        if(count($emis) != $result->loan_for_month){
            if($emis){
                foreach($emis as $emi){
                    $amount = $result->loan_amount - $result->down_payment;
                    $months = $result->loan_for_month;
                    $rate = $result->loan_interest;
                    $rate = $rate/12;
                    $interestAmount = round((($amount * $rate * $months)/100),2); 
                    $emiamt = round(($amount + $interestAmount) / $result->loan_for_month,2);
                    $emi->loan_id = $loanid;
			$emi->title = $result->loan_ag_caseno.' ('.$result->loanProduct->name.') ';
			$emi->emi_amount = $emiamt;
			$emi->emi_date = strtotime($emiday." +".$i." month");
                        
                     $updateEmi = DB::table('email')->where('id',$emi->id)->update($updateStatus);
		
                }
            }else{}
                $amount = $result->loan_amount - $result->down_payment;
                $months = $result->loan_for_month;
                $rate = $result->loan_interest;
                $rate = $rate/12;
		$interestAmount = round((($amount * $rate * $months)/100),2); 
                $emiamt = round(($amount + $interestAmount) / $result->loan_for_month,2);
		
		for($i=0;$i<$result->loan_for_month;$i++){
			$emi = new Emi;
			$emi->loan_id = $loanid;
			$emi->title = $result->loan_ag_caseno.' ('.$result->loanProduct->name.') ';
			$emi->emi_amount = $emiamt;
			$emi->emi_date = strtotime($emiday." +".$i." month");
			$emi->save();
		}   
        }else{
            
        }
        }
                    
		
        }

         return redirect('/loan-application');
    }
}
