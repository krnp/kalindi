<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use App\account_heads;
use App\type_of_accounts;

class AccountHeads extends Controller
{
    public function index()
    {
		$result = account_heads::paginate(5);
        return view('accounts-heads', ['result' => $result]);
    }
	
	public function getAddNew()
    {
		$typeaccounts = type_of_accounts::all();
		//print_r($type_of_accounts);die;
        return view('accounts-heads-new', ['typeaccounts' => $typeaccounts]);
    }
	
	public function postAddNew()
    {
		
		$input = Input::all();
		
		$new = new account_heads;
		$new->account_code = $input['account_code'];
		$new->account_name = $input['account_name'];
		$new->account_type = $input['account_type'];
		$new->type_name = $input['type_name'];
		$new->suppler_code = $input['suppler_code'];
		$new->suppler_name = $input['suppler_name'];
		$new->credit_days = $input['credit_days'];
		$new->opening_bal = $input['opening_bal'];
		$new->balance_type = $input['balance_type'];
		$new->balance_date = strtotime($input['balance_date']);
		$new->area = $input['area'];
		$new->address1 = $input['address1'];
		$new->address2 = $input['address2'];
		$new->city = $input['city'];
		$new->pincode = $input['pincode'];
		$new->phone1 = $input['phone1'];
		$new->phone2 = $input['phone2'];
		$new->phone3 = $input['phone3'];
		$new->phone4 = $input['phone4'];
		$new->save();
		return redirect('/accounts-heads');
        
    }
	
	public function getEdit($id)
    {
		$typeaccounts = type_of_accounts::all();
		
		$result = account_heads::find($id);
        return view('accounts-heads-edit', ['result' => $result, 'typeaccounts' => $typeaccounts]);
    }
	
	public function postEdit($id)
    {
		$input = Input::all();
		$new = account_heads::find($id);
		$new->account_code = $input['account_code'];
		$new->account_name = $input['account_name'];
		$new->account_type = $input['account_type'];
		$new->type_name = $input['type_name'];
		$new->suppler_code = $input['suppler_code'];
		$new->suppler_name = $input['suppler_name'];
		$new->credit_days = $input['credit_days'];
		$new->opening_bal = $input['opening_bal'];
		$new->balance_type = $input['balance_type'];
		$new->balance_date = strtotime($input['balance_date']);
		$new->area = $input['area'];
		$new->address1 = $input['address1'];
		$new->address2 = $input['address2'];
		$new->city = $input['city'];
		$new->pincode = $input['pincode'];
		$new->phone1 = $input['phone1'];
		$new->phone2 = $input['phone2'];
		$new->phone3 = $input['phone3'];
		$new->phone4 = $input['phone4'];
		$new->save();
		return redirect('/accounts-heads');
        
    }
}
