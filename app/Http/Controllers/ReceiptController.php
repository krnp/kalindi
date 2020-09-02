<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Receipt;
use \DB;
class ReceiptController extends Controller
{
    public function index()
    {
    	$result=Receipt::all();
    	return view('receipt.receipt_view',compact('result'));
    }
    public function addNewReceipt()
    {
    	return view('receipt.receipt_add');
    }
    public function saveReceipt(Request $req){
	
		$receipt	=	new Receipt;
		$receipt->v_type =       $req->v_type;
		$receipt->v_no=       $req->v_no;
		$receipt->acc_code =       $req->acc_code;
		$receipt->parti =       $req->parti;
		$receipt->cd_flag =  $req->cd_flag;
		$receipt->amount =  $req->amount;
		$receipt->date =  $req->date;
		$receipt->save();
		return redirect('/receipt')->with('status', 'New Record saved Successfully');
	
	}
	public function getEdit($id)
	{
		$result =Receipt::find($id);
		return view('receipt.receipt_edit', ['result' => $result]);
	}
	public function postEdit(Request $req, $id)
	{
	
		$receipt	= Receipt::find($id);
		$receipt->v_type =       $req->v_type;
		$receipt->v_no=       $req->v_no;
		$receipt->acc_code =       $req->acc_code;
		$receipt->parti =       $req->parti;
		$receipt->cd_flag =  $req->cd_flag;
		$receipt->amount =  $req->amount;
		$receipt->date =  $req->date;
		$receipt->save();
		return redirect('/receipt/edit/'.$id)->with('status', ' Record updated Successfully');;
	}
     public function deletePost(Request $request){
    	
    	 $sur = Receipt::find($request->id)->delete();
         return response()->json(array('msg'=>$sur,'status'=>'success' ));
    }

}
