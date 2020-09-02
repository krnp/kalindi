<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FieldExecutive;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Area;
use \DB;
class FieldExecutiveController extends Controller
{
   
    
	public function index(){
	
		$result = FieldExecutive::get();
		$countries = DB::table("countries")->select("name","id")->get();
		
		return view('fieldexcutive.fieldexcutive_index',['result' => $result,'country'=>$countries]);
	}

	public function addNewExecutive(){
		$countries = DB::table("countries")->select("name","id")->get();
		$areas = Area::get();
		return view('fieldexcutive.fieldexcutive',['country'=>$countries, 'areas'=>$areas]);
	}

	public function saveExecutiveData(Request $req){
		//dd($req);
		$fe	=	new FieldExecutive;
		$fe->pan  			=       $req->pan;
		$fe->aadhar 		=       $req->aadhar;
		$fe->name  			=       $req->name;
		$fe->email 			=       $req->email;
		$fe->phone 			=       $req->phone;
		/*$fe->country_id 		=       $req->country;
		$fe->state_id 		    =       $req->state;
		$fe->city 		        =       $req->city;
		$fe->pincode 		    =       $req->pincode;*/
		$fe->address        	=       $req->address;
		$fe->assign_area       =   implode(',',$req->assign_area);
		
		if (Input::hasFile('profile_pic')) 
		{
		   $file = Input::file('profile_pic');
		   $file->move(public_path().'/images/', $file->getClientOriginalName());
		   $fe->profile_pic = $file->getClientOriginalName();
		}
		
		$fe->save();
		return redirect('/fieldexcutive')->with('status', 'New Record saved Successfully');
	}

	public function getEdit($id){
	
		$result = FieldExecutive::find($id);
		$countries = DB::table("countries")->select("name","id")->get();
		$areas = Area::get();
		return view('fieldexcutive.fieldexcutive_edit', ['result' => $result, 'country'=>$countries, 'areas'=>$areas]);
	
	}


	public function postEdit(Request $req, $id)
	{
	
		$field	= FieldExecutive::find($id);
		$field->pan  			=       $req->pan;
		$field->aadhar 			=       $req->aadhar;
		$field->name  			=       $req->name;
		$field->email 			=       $req->email;
		$field->phone 			=       $req->phone;
		/*$field->country_id 		=       $req->country;
		$field->state_id 		    =       $req->state;
		$field->city 		        =       $req->city;
		$field->pincode 		    =       $req->pincode;*/
		$field->address        	=       $req->address;
		$field->assign_area       =   implode(',',$req->assign_area);
		
		if (Input::hasFile('profile_pic')) 
		{
		   $file = Input::file('profile_pic');
		   $file->move(public_path().'/images/', $file->getClientOriginalName());
		   $field->profile_pic = $file->getClientOriginalName();
		}
		
		$field->save();
		return redirect('/fieldexcutive/edit/'.$id)->with('status', ' Record updated Successfully');;
	}

    public function deletePost(Request $request){
    	
    	 $sur = FieldExecutive::find($request->id)->delete();
         return response()->json(array('msg'=>$sur,'status'=>'success' ));
    }
}
