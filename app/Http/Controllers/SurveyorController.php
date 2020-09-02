<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surveyor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Area;
use \DB;
class SurveyorController extends Controller
{
    
   public function index(){

   	  $result = Surveyor::with("getCountry")->with("getState")->with("getCity")->get();
	    $countries = DB::table("countries")->select("name","id")->get();
	    return view('surveyor.surveyor_index',['result' => $result,'country'=>$countries]);
   }

	public function addNewDealer(){
		$countries = DB::table("countries")->select("name","id")->get();
		$areas = Area::get();
		return view('surveyor.surveyor',['country'=>$countries, 'areas'=>$areas]);
	}

   public function saveDealerData(Request $req){

			$sur	=	new Surveyor;
			$sur->pan  			=       $req->pan;
			$sur->aadhar 			=       $req->aadhar;
			$sur->name  			=       $req->name;
			$sur->email 			=       $req->email;
			$sur->phone 			=       $req->phone;
			$sur->country_id 	=       $req->country;
			$sur->state_id 		=       $req->state;
			$sur->city 		    =       $req->city;
			$sur->pincode 	  =       $req->pincode;
			$sur->address   	=       $req->address;
			$sur->assign_area =      implode(',',$req->assign_area);


			if (Input::hasFile('profile_pic')) 
    	    {
    		   $file = Input::file('profile_pic');
    		   $file->move(public_path().'/images/', $file->getClientOriginalName());
            $sur->profile_pic = $file->getClientOriginalName();
    	    }
    	   
			 $sur->save();
	     return redirect('/surveyor/add')->with('status', 'New Record saved Successfully');

   }

    public function getEdit($id){

     $result = Surveyor::find($id);
     $countries = DB::table("countries")->select("name","id")->get();
	 $areas = Area::get();
     return view('surveyor.surveyor_edit', ['result' => $result, 'country'=>$countries, 'areas'=>$areas]);

   }


   public function postEdit(Request $req, $id)
    {
    	
    	$sur	= Surveyor::find($id);
		$sur->pan  			=       $req->pan;
			$sur->aadhar 			=       $req->aadhar;
			$sur->name  			=       $req->name;
			$sur->email 			=       $req->email;
			$sur->phone 			=       $req->phone;
			$sur->country_id 	=       $req->country;
			$sur->state_id 		=       $req->state;
			$sur->city 		    =       $req->city;
			$sur->pincode 		=       $req->pincode;
			$sur->address     =       $req->address;
			$sur->assign_area =     implode(',',$req->assign_area);
			
	   if (Input::hasFile('profile_pic')){
        $file = Input::file('profile_pic');
        $file->move(public_path().'/images/', $file->getClientOriginalName());
        $sur->profile_pic = $file->getClientOriginalName();
	    }
    	 
			$sur->save();
		    return redirect('/surveyor/edit/'.$id)->with('status', ' Record updated Successfully');;
    }

    public function deletePost(Request $request){
    	
    	 $sur = Surveyor::find($request->id)->delete();
       return response()->json(array('msg'=>$sur,'status'=>'success' ));
         
    }
}
