<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    
   
   public function index(){

   	  $result = Product::paginate(5);

   	  return view('products.product_index',['result' => $result]);
   }

   public function addNewProduct(){

	$brands = Brand::where('status',1)->get();
	return view('products.product',compact('brands'));

   }

   public function saveProductData(Request $req){

			$Product	=	new Product;
			$Product->name  			=       $req->name;
			$Product->brand 			=       $req->brand;
			$Product->model 			=       $req->model;
			$Product->sku 				=       $req->sku;
			$Product->info 				=       $req->info;
	        if (Input::hasFile('image')) 
    	    {
    		   $file = Input::file('image');
    		   $file->move(public_path().'/images/', $file->getClientOriginalName());
               $Product->image = $file->getClientOriginalName();
    	    }
    	    
			$Product->save();
	       return redirect('/product/add')->with('status', 'New Product Record saved Successfully');
;

   }

    public function getEdit($id){

     $result = Product::find($id);
     $brands = Brand::where('status',1)->get();
     return view('products.product_edit', ['result' => $result,'brands' => $brands]);

   }


   public function postEdit(Request $req, $id)
    {
    	
    	    $Product	= Product::find($id);
			$Product->name  			=       $req->name;
		    $Product->brand 			=       $req->brand;
			$Product->model 			=       $req->model;
			$Product->sku 				=       $req->sku;
			$Product->info 			    =       $req->info;
			 if (Input::hasFile('image')) 
    	    {
    		   $file = Input::file('image');
    		   $file->move(public_path().'/images/', $file->getClientOriginalName());
               $Product->image = $file->getClientOriginalName();
    	    }

			$Product->save();
		    return redirect('/product/edit/'.$id)->with('status', ' Record updated Successfully');
    }

    public function deletePost(Request $request){
    	
    	 $Product = Product::find($request->id)->delete();
         return response()->json(array('msg'=>$Product,'status'=>'success' ));
    }
}
