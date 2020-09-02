@extends('layouts.app')



@section('customcss')
<style>

legend{

width:auto!important;

padding: 0 5px!important;

border: none!important;

margin-bottom:0px;		



}

fieldset {

    padding: 22px;

    margin: 0 2px;

    border: 2px solid silver!important;

}

label{

    text-align: left!important;

}

.innerlegend{

padding:1% 0;

}

.innerlegend fieldset{

    padding: 12px;

    margin: 0 1px;

    border: 2px dotted greenyellow!important;

}

.fileinput{

padding-bottom:2%;

}

</style>
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12"> @if (session('status'))
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
    {{ session('status') }} </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
      <h2>Loan Application</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="{{ url('loan-application') }}" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="{{ url('loan-application/add') }}">
        {{ csrf_field() }}
        <div style="padding: 3% 0;">
          <fieldset>
			  <legend>Loan Agreement</legend>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> case No. <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="loan_ag_caseno" name="loan_ag_caseno" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Product <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <select name="loan_ag_product" class="form-control select2">
						<option value="">-- Select Product --</option>
						@foreach($products as $res)
							<option value="{{$res->id}}">{{$res->name}}</option>
						@endforeach
					  </select>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Dealer <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <select name="loan_ag_dealer" class="form-control select2">
						<option value="">-- Select Product --</option>
						@foreach($dealers as $res)
							<option value="{{$res->id}}">{{$res->name}}</option>
						@endforeach
					  </select>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Date <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="loan_ag_date" name="loan_ag_date"  class="form-control cal" value="" >
					</div>
				  </div>
				</div>
			  </div>
          </fieldset>
		  <p>&nbsp;</p>
		  <fieldset>
			  <legend>Loan Application</legend>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Invoice Value<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="invoice_value" name="invoice_value" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Down Payment <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="down_payment" name="down_payment" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Loan A/C No. <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="loan_ac_no" name="loan_ac_no" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Loan Amount <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="loan_amount" name="loan_amount" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> For (in months) <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="loan_for_month" name="loan_for_month" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Interest@ <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="loan_interest" name="loan_interest" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
          </fieldset>
		  <p>&nbsp;</p>
		  <fieldset>
			  <legend>Applicant Details</legend>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name of Borrower<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_name" name="borrower_name" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Age <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_age" name="borrower_age" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Father's / Husband Name Shri<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <select id="borrower_care_of" name="borrower_care_of" class="form-control select2">
						<option value="Father">Father</option>
						<option value="Husband">Husband</option>
					  </select>
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">&nbsp;</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_care_of_name" name="borrower_care_of_name" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Present Address <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="borrower_present_addr" id="borrower_present_addr" class="form-control"></textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="borrower_present_addr_ladmark" id="borrower_present_addr_ladmark" class="form-control"></textarea>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Permanent Home Address <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="borrower_parmanent_addr" id="borrower_parmanent_addr" class="form-control"></textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								Own <input type="radio" name="borrower_present_addr_type" value="Own">
							</div>
							<div class="col-md-6">
								Rental <input type="radio" name="borrower_present_addr_type" value="Rental">
							</div>
						</div>
					    <div class="row">
							<div class="col-md-6">
								Parent/Spouse <input type="radio" name="borrower_present_addr_type" value="Parent/Spouse" >
							</div>
							<div class="col-md-6">
								Employer Leased <input type="radio" name="borrower_present_addr_type" value="Employer Leased">
							</div>
						</div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Occupation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_occupation" name="borrower_occupation" value="" class="form-control">
					</div>
				  </div>
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Designation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_designation" name="borrower_designation" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name & Office Address/Plase of Business <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="borrower_office_addr" id="borrower_office_addr" class="form-control"></textarea>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
			    <div class="col-md-12">
			    	<label class="control-label">Telephone No. <span class="required">*</span></label>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Office <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_phone_office" name="borrower_phone_office" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_phone_residence" name="borrower_phone_residence" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Mobile <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_phone_mobile" name="borrower_phone_mobile" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Is the Post Permanent or Temporary</label>
					</div>
					<div class="col-md-12">
					  <select id="borrower_job_type" name="borrower_job_type" class="form-control select2">
						<option value="Permanent">Permanent</option>
						<option value="Temporary">Temporary</option>
					  </select>
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Whether your occupation is subject to transfer</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_occupation_transfer" name="borrower_occupation_transfer" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Gross Family Income</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="borrower_family_income" name="borrower_family_income" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="innerlegend">
            	<fieldset>
				<legend>Attach Photocopy</legend>
				<div class="row">
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Identity Details</label>
					  </div>
					  <div class="col-md-12">
						<select id="borrower_identity" name="borrower_identity" class="form-control select2">
							<option value="Voter Card">Voter Card</option>
							<option value="Ration Card">Ration Card</option>
							<option value="Electricity Bill">Electricity Bill</option>
							<option value="Water Tax Receipt">Water Tax Receipt</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="borrower_identity_file" name="borrower_identity_file" value="" >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label"> Bank Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="borrower_bankdetail" name="borrower_bankdetail" class="form-control select2">
							<option value="Photocopy of Latest Bank Statement">Photocopy of Latest Bank Statement</option>
							<option value="First Page & Updated Entries of Last 6 Months">First Page & Updated Entries of Last 6 Months</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="borrower_bankdetail_file" name="borrower_bankdetail_file" value="" >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Income Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="borrower_incomedetail" name="borrower_incomedetail" class="form-control select2">
							<option value="Salary Certificate">Salary Certificate</option>
							<option value="Income Tax Return">Income Tax Return</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="borrower_incomedetail_file" name="borrower_incomedetail_file" value="" >
					  </div>
					</div>
				  </div>
				</div>
				</fieldset>
				<p>&nbsp;</p>
				<fieldset>
				<legend>References (Residing in the same area)</legend>
					<div class="row">
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">1. Name of Person</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_1_name" name="borrower_reference_1_name" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Relationship</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_1_relation" name="borrower_reference_1_relation" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Address</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_1_addr" name="borrower_reference_1_addr" value="" >
						  </div>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-12">
						<label class="control-label">Telephone No.</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Office</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_1_phone_office" name="borrower_reference_1_phone_office" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Residence</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_1_phone_residence" name="borrower_reference_1_phone_residence" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Mobile</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_1_phone_mobile" name="borrower_reference_1_phone_mobile" value="" >
						  </div>
						</div>
					  </div>
					</div>
					<p>&nbsp;</p>
					<div class="row">
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">2. Name of Person</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_2_name" name="borrower_reference_2_name" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Relationship</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_2_relation" name="borrower_reference_2_relation" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Address</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_2_addr" name="borrower_reference_2_addr" value="" >
						  </div>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-12">
						<label class="control-label">Telephone No.</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Office</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_2_phone_office" name="borrower_reference_2_phone_office" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Residence</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_2_phone_residence" name="borrower_reference_2_phone_residence" value="" >
						  </div>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="row">
						  <div class="col-md-12 fileinput">
							<label class="control-label">Mobile</label>
						  </div>
						  <div class="col-md-12">
							<input type="text" class="form-control" id="borrower_reference_2_phone_mobile" name="borrower_reference_2_phone_mobile" value="" >
						  </div>
						</div>
					  </div>
					</div>
				</fieldset>
			  </div>
          </fieldset>
		  <p>&nbsp;</p>
		  <fieldset>
			  <legend>Co-Borrower Details</legend>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name of Co-Borrower<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_name" name="co_borrower_name" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Age <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_age" name="co_borrower_age" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Father's / Husband Name Shri<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <select id="co_borrower_care_of" name="co_borrower_care_of" class="form-control select2">
						<option value="Father">Father</option>
						<option value="Husband">Husband</option>
					  </select>
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">&nbsp;</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_care_of_name" name="co_borrower_care_of_name" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Present Address <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="co_borrower_present_addr" id="co_borrower_present_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="co_borrower_present_addr_ladmark" id="co_borrower_present_addr_ladmark" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Permanent Home Address <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="co_borrower_parmanent_addr" id="co_borrower_parmanent_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								Own <input type="radio"  name="co_borrower_present_addr_type" value="Own">
							</div>
							<div class="col-md-6">
								Rental <input type="radio"  name="co_borrower_present_addr_type" value="Rental">
							</div>
						</div>
					    <div class="row">
							<div class="col-md-6">
								Parent/Spouse <input type="radio"  name="co_borrower_present_addr_type" value="Parent/Spouse" >
							</div>
							<div class="col-md-6">
								Employer Leased <input type="radio"  name="co_borrower_present_addr_type" value="Employer Leased">
							</div>
						</div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Occupation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_occupation" name="co_borrower_occupation" value="" class="form-control">
					</div>
				  </div>
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Designation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_designation" name="co_borrower_designation" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name & Office Address/Plase of Business <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="co_borrower_office_addr" id="co_borrower_office_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
			    <div class="col-md-12">
			    	<label class="control-label">Telephone No. <span class="required">*</span></label>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Office <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_phone_office" name="co_borrower_phone_office" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_phone_residence" name="co_borrower_phone_residence" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Mobile <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_phone_mobile" name="co_borrower_phone_mobile" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
          </fieldset>
		  <p>&nbsp;</p>
		  <fieldset>
			  <legend>Guarantor Details</legend>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name of Guarantor<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_name" name="guarantor_name" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Age <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_age" name="guarantor_age" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Father's / Husband Name Shri<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <select id="guarantor_care_of" name="guarantor_care_of" class="form-control select2">
						<option value="Father">Father</option>
						<option value="Husband">Husband</option>
					  </select>
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">&nbsp;</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_care_of_name" name="guarantor_care_of_name" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Present Address <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="guarantor_present_addr" id="guarantor_present_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="guarantor_present_addr_ladmark" id="guarantor_present_addr_ladmark" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Permanent Home Address <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="guarantor_parmanent_addr" id="guarantor_parmanent_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								Own <input type="radio"  name="guarantor_present_addr_type" value="Own">
							</div>
							<div class="col-md-6">
								Rental <input type="radio"  name="guarantor_present_addr_type" value="Rental">
							</div>
						</div>
					    <div class="row">
							<div class="col-md-6">
								Parent/Spouse <input type="radio"  name="guarantor_present_addr_type" value="Parent/Spouse" >
							</div>
							<div class="col-md-6">
								Employer Leased <input type="radio"  name="guarantor_present_addr_type" value="Employer Leased">
							</div>
						</div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Occupation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_occupation" name="guarantor_occupation" value="" class="form-control">
					</div>
				  </div>
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Designation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_designation" name="guarantor_designation" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name & Office Address/Plase of Business <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="guarantor_office_addr" id="guarantor_office_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
			    <div class="col-md-12">
			    	<label class="control-label">Telephone No. <span class="required">*</span></label>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Office <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_phone_office" name="guarantor_phone_office" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_phone_residence" name="guarantor_phone_residence" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Mobile <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_phone_mobile" name="guarantor_phone_mobile" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Is the Post Permanent or Temporary</label>
					</div>
					<div class="col-md-12">
					  <select id="guarantor_job_type" name="guarantor_job_type" class="form-control select2">
						<option value="Permanent">Permanent</option>
						<option value="Temporary">Temporary</option>
					  </select>
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Whether your occupation is subject to transfer</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_occupation_transfer" name="guarantor_occupation_transfer" value="" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Gross Family Income</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_family_income" name="guarantor_family_income" value="" class="form-control">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="innerlegend">
            	<fieldset>
				<legend>Attach Photocopy</legend>
				<div class="row">
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Identity Details</label>
					  </div>
					  <div class="col-md-12">
						<select id="guarantor_identity" name="guarantor_identity" class="form-control select2">
							<option value="Voter Card">Voter Card</option>
							<option value="Ration Card">Ration Card</option>
							<option value="Electricity Bill">Electricity Bill</option>
							<option value="Water Tax Receipt">Water Tax Receipt</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="guarantor_identity_file" name="guarantor_identity_file" value="" >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label"> Bank Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="guarantor_bankdetail" name="guarantor_bankdetail" class="form-control select2">
							<option value="Photocopy of Latest Bank Statement">Photocopy of Latest Bank Statement</option>
							<option value="First Page & Updated Entries of Last 6 Months">First Page & Updated Entries of Last 6 Months</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="guarantor_bankdetail_file" name="guarantor_bankdetail_file" value="" >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Income Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="guarantor_incomedetail" name="guarantor_incomedetail" class="form-control select2">
							<option value="Salary Certificate">Salary Certificate</option>
							<option value="Income Tax Return">Income Tax Return</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="guarantor_incomedetail_file" name="guarantor_incomedetail_file" value="" >
					  </div>
					</div>
				  </div>
				</div>
				</fieldset>
			  </div>
          </fieldset>
		  
        </div>
        
        <input type="submit" class="btn btn-success" name="submit">
      </form>
    </div>
  </div>
</div>
@endsection 

@section('script')
<script type="text/javascript">

 

  $('.cal').Zebra_DatePicker();

</script>
@endsection 