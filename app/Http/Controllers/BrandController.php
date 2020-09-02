<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
   
   public function index(){

   	  $result = Brand::paginate(5);

   	  return view('brands.brand_index',['result' => $result]);
   }

   public function addNewBrand(){

   	   return view('brands.brand');

   }

   public function saveBrandData(Request $req){

			$brand	=	new Brand;
			$brand->name  			=       $req->name;
			$brand->brand 			=       $req->brand;
			$brand->info 			=       $req->info;
	        if (Input::hasFile('image')) 
    	    {
    		   $file = Input::file('image');
    		   $file->move(public_path().'/images/', $file->getClientOriginalName());
               $brand->image = $file->getClientOriginalName();
    	    }
    	    
			$brand->save();
	       return redirect('/brand/add')->with('status', 'New Brand Record saved Successfully');
;

   }

    public function getEdit($id){

     $result = Brand::find($id);
         return view('brands.brand_edit', ['result' => $result]);

   }


   public function postEdit(Request $req, $id)
    {
    	
    	    $brand	= Brand::find($id);
			$brand->name  			=       $req->name;
			$brand->brand 			=       $req->brand;
			$brand->info 			=       $req->info;
			 if (Input::hasFile('image')) 
    	    {
    		   $file = Input::file('image');
    		   $file->move(public_path().'/images/', $file->getClientOriginalName());
               $brand->image = $file->getClientOriginalName();
    	    }

			$brand->save();
		    return redirect('/brand/edit/'.$id)->with('status', ' Record updated Successfully');
    }

    public function deletePost(Request $request){
    	
    	 $brand = Brand::find($request->id)->delete();
         return response()->json(array('msg'=>$brand,'status'=>'success' ));
    }
}
