<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Area;
use \DB;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{

	public function index(){
	
		$result = Area::with("getCountry")->with("getState")->with("getCity")->get();
		$countries = DB::table("countries")->select("name","id")->get();
		
		return view('area.area_index',['result' => $result,'country'=>$countries]);
	}

	public function addNewArea(){
		$countries = DB::table("countries")->select("name","id")->where('status',1)->get();
		return view('area.area',['country'=>$countries]);
	}

	public function saveAreaData(Request $req){
	
		$area	=	new Area;
		$area->country_id =       $req->country;
		$area->state_id 	=       $req->state;
		$area->city 		  =       $req->city;
		$area->area		=       $req->area;
		$area->address2 	=       $req->area_addr2;
		$area->pincode   	=       $req->pincode;
		$area->save();
		return redirect('/area')->with('status', 'New Record saved Successfully');
	
	}

	public function getEdit($id){
		
		$result = Area::find($id);
		$countries = DB::table("countries")->select("name","id")->where('status',1)->get();
		return view('area.area_edit', ['result' => $result,'country'=>$countries]);
	
	}


	public function postEdit(Request $req, $id)
	{
	
		$area	= Area::find($id);
		$area->country_id  	=       $req->country;
		$area->state_id 	=       $req->state;
		$area->city 		=       $req->city;
		$area->area		=       $req->area;
		$area->address2 	=       $req->area_addr2;
		$area->pincode   	=       $req->pincode;
		$area->save();
		return redirect('/area/edit/'.$id)->with('status', ' Record updated Successfully');;
	}

    public function deletePost(Request $request){
   
    	 $area = Area::find($request->id)->delete();
         return response()->json(array('msg'=>$area,'status'=>'success' ));
    }

     public function getStateList(Request $request)
    {
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
					->where('status',1)
                    ->select("name","id")->get();
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
					->where('status',1)
                    ->select("name","id")->get();
                
        return response()->json($cities);
    }
}
