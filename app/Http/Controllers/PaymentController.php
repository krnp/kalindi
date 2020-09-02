<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Payment;
use \DB;

class PaymentController extends Controller
{
     public function index()
    {
    	$result=Payment::all();
    	return view('payment.payment',compact('result'));
    }
    public function addNewPayment()
    {
    	return view('payment.payment_add');
    }
    public function savePayment(Request $req){
	
		$payment	=	new Payment;
		$payment->v_type =       $req->v_type;
		$payment->v_no=       $req->v_no;
		$payment->acc_code =       $req->acc_code;
		$payment->parti =       $req->parti;
		$payment->cd_flag =  $req->cd_flag;
		$payment->amount =  $req->amount;
		$payment->date=$req->date;
		$payment->save();
		return redirect('/payment')->with('status', 'New Record saved Successfully');
	
	}
	public function getEdit($id)
	{
		$result =Payment::find($id);
		return view('payment.payment_edit', ['result' => $result]);
	}
	public function postEdit(Request $req, $id)
	{
	
		$payment	= Payment::find($id);
		$payment->v_type =       $req->v_type;
		$payment->v_no=       $req->v_no;
		$payment->acc_code =       $req->acc_code;
		$payment->parti =       $req->parti;
		$payment->cd_flag =  $req->cd_flag;
		$payment->amount =  $req->amount;
		$payment->date=$req->date;
		$payment->save();
		return redirect('/payment/edit/'.$id)->with('status', ' Record updated Successfully');;
	}
     public function deletePost(Request $request){
    	
    	 $sur = Payment::find($request->id)->delete();
         return response()->json(array('msg'=>$sur,'status'=>'success' ));
    }

}
