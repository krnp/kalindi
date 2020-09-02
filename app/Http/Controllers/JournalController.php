<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Journal;
use \DB;

class JournalController extends Controller
{
    public function index()
    {
    	$result=Journal::all();
    	return view('journal.journal_view',compact('result'));
    }
    public function addNewJournal()
    {
    	return view('journal.journal_add');
    }
    public function saveJournal(Request $req){
	
		$journal	=	new Journal;
		$journal->v_no=       $req->v_no;
		$journal->acc_code =       $req->acc_code;
		$journal->cd_flag =  $req->cd_flag;
		$journal->amount =  $req->amount;
		$journal->case_no =$req->case_no;
		$journal->narr =  $req->narr;
		$journal->principle =$req->principle;
		$journal->interest =  $req->interest;
		$journal->folio_no =$req->folio_no;
		$journal->date =  $req->date;
		
		$journal->save();
		return redirect('/journal')->with('status', 'New Record saved Successfully');
	
	}
	public function getEdit($id)
	{
		$result =Journal::find($id);
		return view('journal.journal_edit', ['result' => $result]);
	}
	public function postEdit(Request $req, $id)
	{
	
		$journal	= Journal::find($id);
     	$journal->v_no=       $req->v_no;
		$journal->acc_code =       $req->acc_code;
		$journal->cd_flag =  $req->cd_flag;
		$journal->amount =  $req->amount;
		$journal->case_no =$req->case_no;
		$journal->narr =  $req->narr;
		$journal->principle =$req->principle;
		$journal->interest =  $req->interest;
		$journal->folio_no =$req->folio_no;
		$journal->date =  $req->date;
		$journal->save();
		return redirect('/journal/edit/'.$id)->with('status', ' Record updated Successfully');;
	}
     public function deletePost(Request $request){
    	
    	 $sur = Journal::find($request->id)->delete();
         return response()->json(array('msg'=>$sur,'status'=>'success' ));
    }

}
