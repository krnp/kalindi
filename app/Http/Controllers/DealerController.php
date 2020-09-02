<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class DealerController extends Controller
{
   public function index(){

   	  $result = Dealer::paginate(5);

   	  return view('dealer.dealer_index',['result' => $result]);
   }

   public function addNewDealer(){

   	   return view('dealer.dealer');

   }

   public function saveDealerData(Request $req){

			$Dealer	=	new Dealer;
			$Dealer->pan  			=       $req->pan;
			$Dealer->aadhar 			=       $req->aadhar;
			$Dealer->name  			=       $req->name;
			$Dealer->email 			=       $req->email;
			$Dealer->phone 			=       $req->phone;
			$Dealer->fax			=       $req->fax;
			$Dealer->info 			=       $req->info;
			$Dealer->seleted_area   =    implode(',',$req->seleted_area); 
	        if (Input::hasFile('profile_pic')) 
    	    {
    		   $file = Input::file('profile_pic');
    		   $file->move(public_path().'/images/', $file->getClientOriginalName());
               $Dealer->profile_pic = $file->getClientOriginalName();
    	    }
    	    
			$Dealer->save();
	       return redirect('/dealer/add')->with('status', 'New Dealer Record saved Successfully');
;

   }

    public function getEdit($id){

     $result = Dealer::find($id);
     return view('dealer.dealer_edit', ['result' => $result]);

   }


   public function postEdit(Request $req, $id)
    {
    	
    	 $Dealer	= Dealer::find($id);
		 $Dealer->pan  			=       $req->pan;
			$Dealer->aadhar 			=       $req->aadhar;
			$Dealer->name  			=       $req->name;
			$Dealer->email 			=       $req->email;
			$Dealer->phone 			=       $req->phone;
			$Dealer->fax			=       $req->fax;
			$Dealer->info 			=       $req->info;
			$Dealer->seleted_area   =       implode(',',$req->seleted_area);
			 if (Input::hasFile('profile_pic')) 
    	    {
    		   $file = Input::file('profile_pic');
    		   $file->move(public_path().'/images/', $file->getClientOriginalName());
               $Dealer->profile_pic = $file->getClientOriginalName();
    	    }

			$Dealer->save();
		    return redirect('/dealer/edit/'.$id)->with('status', ' Record updated Successfully');
    }

    public function deletePost(Request $request){
    	
    	 $Dealer = Dealer::find($request->id)->delete();
         return response()->json(array('msg'=>$Dealer,'status'=>'success' ));
    }
}
