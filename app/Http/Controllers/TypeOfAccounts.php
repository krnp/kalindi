<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use App\type_of_accounts;

class TypeOfAccounts extends Controller
{
    public function index()
    {
		$result = type_of_accounts::paginate(5);
        return view('type-of-accounts', ['result' => $result]);
    }
	
	public function getAddNew()
    {
        return view('type-of-accounts-new');
    }
	
	public function postAddNew()
    {
		$input = Input::all();
		$new = new type_of_accounts;
		$new->type_name = $input['type_name'];
		$new->closes_to = $input['closes_to'];
		$new->control_as = $input['control_as'];
		$new->put_title_as = $input['put_title_as'];
		$new->control_narr = $input['control_narr'];
		$new->personal = $input['personal'];
		$new->summarise_it = $input['summarise_it'];
		$new->print_order = $input['print_order'];
		$new->save();
		return redirect('/type-of-accounts');
        
    }
	
	public function getEdit($id)
    {
		$result = type_of_accounts::find($id);
        return view('type-of-accounts-edit', ['result' => $result]);
    }
	
	public function postEdit($id)
    {
		$input = Input::all();
		$new = type_of_accounts::find($id);
		$new->type_name = $input['type_name'];
		$new->closes_to = $input['closes_to'];
		$new->control_as = $input['control_as'];
		$new->put_title_as = $input['put_title_as'];
		$new->control_narr = $input['control_narr'];
		$new->personal = $input['personal'];
		$new->summarise_it = $input['summarise_it'];
		$new->print_order = $input['print_order'];
		$new->save();
		return redirect('/type-of-accounts');
        
    }
}
