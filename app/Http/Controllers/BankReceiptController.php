<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\BankReceipt;
use \DB;

class BankReceiptController extends Controller
{
     public function index()
    {
    	$result=BankReceipt::all();
    	return view('bankreceipt.bank_receipt_view',compact('result'));
    }
    public function addNewJournal()
    {
    	return view('bankreceipt.bank_receipt_add');
    }
    public function saveJournal(Request $req){
	
		$bankreceipt	=	new BankReceipt;
	 	$bankreceipt->v_no=       $req->v_no;
     	$bankreceipt->acc_code= $req->acc_code;
		$bankreceipt->bank_code =       $req->bank_code;
		$bankreceipt->amount =  $req->amount;
		$bankreceipt->case_no =$req->case_no;
		$bankreceipt->narr =  $req->narr;
		$bankreceipt->principle =$req->principle;
		$bankreceipt->interest =  $req->interest;
		$bankreceipt->ch_no =$req->ch_no;
		$bankreceipt->ch_date =  $req->ch_date;
		$bankreceipt->save();
		return redirect('/bank_receipt')->with('status', 'New Record saved Successfully');
	
	}
	public function getEdit($id)
	{
		$result =BankReceipt::find($id);
		return view('bankreceipt.bank_receipt_edit',compact('result'));
	}
	public function postEdit(Request $req, $id)
	{
	
		$bankreceipt	= BankReceipt::find($id);
     	$bankreceipt->v_no=       $req->v_no;
     	$bankreceipt->acc_code= $req->acc_code;
		$bankreceipt->bank_code =       $req->bank_code;
		$bankreceipt->amount =  $req->amount;
		$bankreceipt->case_no =$req->case_no;
		$bankreceipt->narr =  $req->narr;
		$bankreceipt->principle =$req->principle;
		$bankreceipt->interest =  $req->interest;
		$bankreceipt->ch_no =$req->ch_no;
		$bankreceipt->ch_date =  $req->ch_date;
		$bankreceipt->save();
		return redirect('/bank_receipt/edit/'.$id)->with('status', ' Record updated Successfully');;
	}
     public function deletePost(Request $request){
    	
    	 $sur = BankReceipt::find($request->id)->delete();
         return response()->json(array('msg'=>$sur,'status'=>'success' ));
    }

}
