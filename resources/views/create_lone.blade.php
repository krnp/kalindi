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
        background: #fbfbfb;
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
    .authError{
        color:red;
        font-size: 12px;
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
            <h2>New Loan Application</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ url('loan-application') }}" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content"> <br>
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="loneFormEdit" action="{{ url('loan-application/create_lone') }}">
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
                                        <input type="text" id="loan_ag_caseno" name="lone[loan_ag_caseno]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Product <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <select name="lone[loan_ag_product]" class="form-control select2">
                                            <option value="">-- Select Product --</option>
                                            @foreach($products as $res)
                                            <option value="{{$res->id}}">{{$res->name}}</option>
                                            @endforeach
                                        </select>
                                        <label id="lone[loan_ag_product]-error" class="authError" for="lone[loan_ag_product]" style="display:none">Please select product</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            
                        </style>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Dealer <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <select name="lone[loan_ag_dealer]" class="form-control select2">
                                            <option value="">-- Select Dealer --</option>
                                            @foreach($dealers as $res)
                                            <option value="{{$res->id}}">{{$res->name}}</option>
                                            @endforeach
                                        </select>
                                        <label id="lone[loan_ag_dealer]-error" class="authError" style="display:none" for="lone[loan_ag_dealer]">Please select dealer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Date <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="loan_ag_date" name="lone[loan_ag_date]"  class="form-control cal"  >
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
                                        <input type="text" id="invoice_value" required="required" number="numer" name="lone[invoice_value]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Down Payment <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="down_payment" name="lone[down_payment]"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Loan A/C No. <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="loan_ac_no" name="lone[loan_ac_no]"  class="form-control">
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
                                        <input type="text" id="loan_amount" name="lone[loan_amount]"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> For (in months) <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="loan_for_month" name="lone[loan_for_month]"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Interest@ <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="loan_interest" name="lone[loan_interest]" class="form-control">
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
                                        <input type="text" id="borrower_name" name="lone_details[borrower_name]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Age <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="borrower_age" name="lone_details[borrower_age]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Father's / Husband Name Shri<span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <select id="borrower_care_of" name="lone_details[borrower_care_of]" class="form-control select2">
                                            <option value="Father" >Father</option>
                                            <option value="Husband" >Husband</option>
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
                                        <input type="text" id="borrower_care_of_name" name="lone_details[borrower_care_of_name]" class="form-control">
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
                                        <textarea name="lone_details[borrower_present_addr]" id="borrower_present_addr" class="form-control"> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Land Mark <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="lone_details[borrower_present_addr_ladmark]" id="borrower_present_addr_ladmark" class="form-control"></textarea>
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
                                        <textarea name="lone_details[borrower_parmanent_addr]" id="borrower_parmanent_addr" class="form-control"></textarea>
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
                                                Own <input type="radio" name="lone_details[borrower_present_addr_type]" value="Own">
                                            </div>
                                            <div class="col-md-6">
                                                Rental <input type="radio" name="lone_details[borrower_present_addr_type]" value="Rental">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                Parent/Spouse <input type="radio" name="lone_details[borrower_present_addr_type]" value="Parent/Spouse" >
                                            </div>
                                            <div class="col-md-6">
                                                Employer Leased <input type="radio" name="lone_details[borrower_present_addr_type]" value="Employer Leased">
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
                                        <input type="text" id="borrower_occupation" name="lone_details[borrower_occupation]"  class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Designation <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="borrower_designation" name="lone_details[borrower_designation]"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Name & Office Address/Plase of Business <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="lone_details[borrower_office_addr]" id="borrower_office_addr" class="form-control"> </textarea>
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
                                        <input type="text" id="borrower_phone_office" name="lone_details[borrower_phone_office]"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Residence <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="borrower_phone_residence" name="lone_details[borrower_phone_residence]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="borrower_phone_mobile" name="lone_details[borrower_phone_mobile]" class="form-control">
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
                                        <select id="borrower_job_type" name="lone_details[borrower_job_type]" class="form-control select2">
                                            <option value="Permanent" >Permanent</option>
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
                                        <input type="text" id="borrower_occupation_transfer" name="lone_details[borrower_occupation_transfer]"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Gross Family Income</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" id="borrower_family_income" name="lone_details[borrower_family_income]"  class="form-control">
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
                                                <select id="borrower_identity" name="lone_details[borrower_identity]" class="form-control select2">
                                                    <option value="Voter Card"  >Voter Card</option>
                                                    <option value="Ration Card" >Ration Card</option>
                                                    <option value="Electricity Bill">Electricity Bill</option>
                                                    <option value="Water Tax Receipt">Water Tax Receipt</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="file" id="borrower_identity_file" name="lone_details[borrower_identity_file]" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label"> Bank Detail</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select id="borrower_bankdetail" name="lone_details[borrower_bankdetail]" class="form-control select2">
                                                    <option value="Photocopy of Latest Bank Statement">Photocopy of Latest Bank Statement</option>
                                                    <option value="First Page & Updated Entries of Last 6 Months" >First Page & Updated Entries of Last 6 Months</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="file" id="borrower_bankdetail_file" name="lone_details[borrower_bankdetail_file]" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Income Detail</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select id="borrower_incomedetail" name="lone_details[borrower_incomedetail]" class="form-control select2">
                                                    <option value="Salary Certificate" >Salary Certificate</option>
                                                    <option value="Income Tax Return" >Income Tax Return</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="file" id="borrower_incomedetail_file" name="lone_details[borrower_incomedetail_file]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <p>&nbsp;</p>
                            
                              </fieldset>
                             <fieldset>
                                
                                <legend>References (Residing in the same area)</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">1. Name of Person</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_1_name" name="loans_references[reference_name]"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Relationship</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_1_relation" name="loans_references[reference_relation]"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Address</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_1_addr" name="loans_references[reference_addr]" >
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
                                                <input type="text" class="form-control" id="borrower_reference_1_phone_office" name="loans_references[reference_phone_office]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Residence</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_1_phone_residence" name="loans_references[reference_phone_residence]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Mobile</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_1_phone_mobile" name="loans_references[reference_phone_mobile]" >
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
                                                <input type="text" class="form-control" id="borrower_reference_2_name" name="loans_references[reference_2_name]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Relationship</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_2_relation" name="loans_references[reference_2_relation]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Address</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_2_addr" name="loans_references[reference_2_addr]">
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
                                                <input type="text" class="form-control" id="borrower_reference_2_phone_office" name="loans_references[reference_2_phone_office]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Residence</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_2_phone_residence" name="loans_references[reference_2_phone_residence]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Mobile</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="borrower_reference_2_phone_mobile" name="loans_references[reference_2_phone_mobile]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="loans_references[id]" value="{{@$result->loansReferences->id}}">
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
					  <input type="text" id="co_borrower_name" name="loans_co[co_borrower_name]" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Age <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_age" name="loans_co[co_borrower_age]" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Father's / Husband Name Shri<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <select id="co_borrower_care_of" name="loans_co[co_borrower_care_of]" class="form-control select2">
						<option value="Father" >Father</option>
						<option value="Husband" >Husband</option>
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
					  <input type="text" id="co_borrower_care_of_name" name="loans_co[co_borrower_care_of_name]" class="form-control">
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
					  <textarea name="loans_co[co_borrower_present_addr]" id="co_borrower_present_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="loans_co[co_borrower_present_addr_ladmark]" id="co_borrower_present_addr_ladmark" class="form-control"></textarea>
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
					  <textarea name="loans_co[co_borrower_parmanent_addr]" id="co_borrower_parmanent_addr" class="form-control"></textarea>
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
								Own <input type="radio"  name="loans_co[co_borrower_present_addr_type]" value="Own">
							</div>
							<div class="col-md-6">
								Rental <input type="radio"  name="loans_co[co_borrower_present_addr_type]" value="Rental">
							</div>
						</div>
					    <div class="row">
							<div class="col-md-6">
								Parent/Spouse <input type="radio"  name="loans_co[co_borrower_present_addr_type]" value="Parent/Spouse" >
							</div>
							<div class="col-md-6">
								Employer Leased <input type="radio"  name="loans_co[co_borrower_present_addr_type]" value="Employer Leased">
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
					  <input type="text" id="co_borrower_occupation" name="loans_co[co_borrower_occupation]" class="form-control">
					</div>
				  </div>
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Designation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_designation" name="loans_co[co_borrower_designation]" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name & Office Address/Plase of Business <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="loans_co[co_borrower_office_addr]" id="co_borrower_office_addr" class="form-control"> </textarea>
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
					  <input type="text" id="co_borrower_phone_office" name="loans_co[co_borrower_phone_office]"  class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_phone_residence" name="loans_co[co_borrower_phone_residence]"  class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Mobile <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="co_borrower_phone_mobile" name="loans_co[co_borrower_phone_mobile]" class="form-control">
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
						<select id="co_borrower_identity" name="loans_co[co_borrower_identity]" class="form-control select2">
							<option value="Voter Card"  >Voter Card</option>
							<option value="Ration Card" >Ration Card</option>
							<option value="Electricity Bill"  >Electricity Bill</option>
							<option value="Water Tax Receipt" >Water Tax Receipt</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="co_borrower_identity_file" name="loans_co[co_borrower_identity_file]"  >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label"> Bank Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="co_borrower_bankdetail" name="loans_co[co_borrower_bankdetail]" class="form-control select2">
							<option value="Photocopy of Latest Bank Statement">Photocopy of Latest Bank Statement</option>
							<option value="First Page & Updated Entries of Last 6 Months" >First Page & Updated Entries of Last 6 Months</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="co_borrower_bankdetail_file" name="loans_co[co_borrower_bankdetail_file]" >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Income Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="co_borrower_incomedetail" name="loans_co[co_borrower_incomedetail]" class="form-control select2">
							<option value="Salary Certificate" >Salary Certificate</option>
							<option value="Income Tax Return"  >Income Tax Return</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="co_borrower_incomedetail_file" name="loans_co[co_borrower_incomedetail_file]" >
					  </div>
					</div>
				  </div>
				</div>
				</fieldset>
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
					  <input type="text" id="guarantor_name" name="loans_guarantor[guarantor_name]"  class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Age <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_age" name="loans_guarantor[guarantor_age]"  class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Father's / Husband Name Shri<span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <select id="guarantor_care_of" name="loans_guarantor[guarantor_care_of]" class="form-control select2">
						<option value="Father" >Father</option>
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
					  <input type="text" id="guarantor_care_of_name" name="loans_guarantor[guarantor_care_of_name]" class="form-control">
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
					  <textarea name="loans_guarantor[guarantor_present_addr]" id="guarantor_present_addr" class="form-control"> </textarea>
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="loans_guarantor[guarantor_present_addr_ladmark]" id="guarantor_present_addr_ladmark" class="form-control"> </textarea>
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
					  <textarea name="loans_guarantor[guarantor_parmanent_addr]" id="guarantor_parmanent_addr" class="form-control"></textarea>
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
								Own <input type="radio"  name="loans_guarantor[guarantor_present_addr_type]" value="Own">
							</div>
							<div class="col-md-6">
								Rental <input type="radio"  name="loans_guarantor[guarantor_present_addr_type]" value="Rental">
							</div>
						</div>
					    <div class="row">
							<div class="col-md-6">
								Parent/Spouse <input type="radio"  name="loans_guarantor[guarantor_present_addr_type]" value="Parent/Spouse" >
							</div>
							<div class="col-md-6">
								Employer Leased <input type="radio"  name="loans_guarantor[guarantor_present_addr_type]" value="Employer Leased">
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
					  <input type="text" id="guarantor_occupation" name="loans_guarantor[guarantor_occupation]"  class="form-control">
					</div>
				  </div>
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Designation <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_designation" name="loans_guarantor[guarantor_designation]"  class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name & Office Address/Plase of Business <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <textarea name="loans_guarantor[guarantor_office_addr]" id="guarantor_office_addr" class="form-control"></textarea>
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
					  <input type="text" id="guarantor_phone_office" name="loans_guarantor[guarantor_phone_office]" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_phone_residence" name="loans_guarantor[guarantor_phone_residence]" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Mobile <span class="required">*</span></label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_phone_mobile" name="loans_guarantor[guarantor_phone_mobile]"  class="form-control">
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
					  <select id="guarantor_job_type" name="loans_guarantor[guarantor_job_type]" class="form-control select2">
						<option value="Permanent"  >Permanent</option>
						<option value="Temporary" >Temporary</option>
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
					  <input type="text" id="guarantor_occupation_transfer" name="loans_guarantor[guarantor_occupation_transfer]" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Gross Family Income</label>
					</div>
					<div class="col-md-12">
					  <input type="text" id="guarantor_family_income" name="loans_guarantor[guarantor_family_income]"  class="form-control">
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
						<select id="guarantor_identity" name="loans_guarantor[guarantor_identity]" class="form-control select2">
							<option value="Voter Card">Voter Card</option>
							<option value="Ration Card">Ration Card</option>
							<option value="Electricity Bill" >Electricity Bill</option>
							<option value="Water Tax Receipt" >Water Tax Receipt</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="guarantor_identity_file" name="loans_guarantor[guarantor_identity_file]"  >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label"> Bank Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="guarantor_bankdetail" name="loans_guarantor[guarantor_bankdetail]" class="form-control select2">
							<option value="Photocopy of Latest Bank Statement" >Photocopy of Latest Bank Statement</option>
							<option value="First Page & Updated Entries of Last 6 Months" >First Page & Updated Entries of Last 6 Months</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="guarantor_bankdetail_file" name="loans_guarantor[guarantor_bankdetail_file]" >
					  </div>
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Income Detail</label>
					  </div>
					  <div class="col-md-12">
						<select id="guarantor_incomedetail" name="loans_guarantor[guarantor_incomedetail]" class="form-control select2">
							<option value="Salary Certificate" >Salary Certificate</option>
							<option value="Income Tax Return"  >Income Tax Return</option>
						  </select>
					  </div>
					  <div class="col-md-12">
						<input type="file" id="guarantor_incomedetail_file" name="loans_guarantor[guarantor_incomedetail_file]" >
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
    $(document).ready(function() {
        $(".select2").select2();
    });




    $(function() {
        
      

        $("#loneFormEdit").validate({
            debug: false,
            errorClass: "authError",
            onkeyup: false,
            rules: {
                
                
                "lone[loan_ag_caseno]": {
                    required: true,
                    number: true,
                },
                "lone[loan_ag_date]": {
                    required: true,
                },
                "lone[loan_ag_product]": {
                    required: true,
                },
                "lone[loan_ag_dealer]": {
                    required: true,
                },
                "lone[invoice_value]": {
                    required: true,
                    number: true,
                },
                                
                "lone[down_payment]": {
                    required: true,
                    number: true,
                },
                "lone[loan_ac_no]": {
                    required: true,
                    number: true,
                },
                "lone[loan_amount]": {
                    required: true,
                    number: true,
                },
                "lone[loan_for_month]": {
                    required: true,
                    number: true,
                },
                "lone[loan_interest]": {
                    required: true,
                    number: true,
                },
                
//    application details
                "lone_details[borrower_name]": {
                    required: true,
                },
                "lone_details[borrower_age]": {
                    required: true,
                    number: true,
                },"lone_details[borrower_care_of_name]": {
                    required: true,
                },"lone_details[borrower_present_addr]": {
                    required: true,
                },"lone_details[borrower_present_addr_ladmark]": {
                    required: true,
                },"lone_details[borrower_parmanent_addr]": {
                    required: true,
                },"lone_details[borrower_present_addr_type]": {
                    required: true,
                },"lone_details[borrower_occupation]": {
                    required: true,
                },"lone_details[borrower_office_addr]": {
                    required: true,
                },"lone_details[borrower_designation]": {
                    required: true,
                },
                "lone_details[borrower_phone_office]": {
                    required: true,
                    number: true,
                },
                "lone_details[borrower_phone_residence]": {
                    required: true,
                    number: true,
                },
                "lone_details[borrower_family_income]": {
                    required: true,
                    number: true,
                },
                "lone_details[borrower_phone_mobile]": {
                    required: true,
                    number: true,
                },
//    Co-Borrower Details
//             "loans_co[co_borrower_name]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_age]": {
//                    required: true,
//                    number: true,
//                },"loans_co[co_borrower_care_of_name]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_present_addr]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_present_addr_ladmark]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_parmanent_addr]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_present_addr_type]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_occupation]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_office_addr]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_designation]": {
//                    required: true,
//                },
//                "loans_co[co_borrower_phone_office]": {
//                    required: true,
//                    number: true,
//                },
//                "loans_co[co_borrower_phone_residence]": {
//                    required: true,
//                    number: true,
//                },
//                "loans_co[co_borrower_phone_mobile]": {
//                    required: true,
//                    number: true,
//                },
//                
                
                            //    Guarantor - Borrower Details
             "loans_guarantor[guarantor_name]": {
                    required: true,
                },
                "loans_guarantor[guarantor_age]": {
                    required: true,
                    number: true,
                },"loans_guarantor[guarantor_care_of_name]": {
                    required: true,
                },
                "loans_guarantor[guarantor_present_addr]": {
                    required: true,
                },
                "loans_guarantor[guarantor_present_addr_ladmark]": {
                    required: true,
                },
                "loans_guarantor[guarantor_parmanent_addr]": {
                    required: true,
                },
                "loans_guarantor[guarantor_present_addr_type]": {
                    required: true,
                },
                "loans_guarantor[guarantor_occupation]": {
                    required: true,
                },
                "loans_guarantor[guarantor_office_addr]": {
                    required: true,
                },
                "loans_guarantor[guarantor_designation]": {
                    required: true,
                },
                "loans_guarantor[guarantor_phone_office]": {
                    required: true,
                    number: true,
                },
                "loans_guarantor[guarantor_phone_residence]": {
                    required: true,
                    number: true,
                },
                "loans_guarantor[guarantor_phone_mobile]": {
                    required: true,
                    number: true,
                },
                "loans_guarantor[guarantor_family_income]": {
                    required: true,
                    number: true,
                },
                

},
            messages: {
 /////////////////////////////         

                "lone[loan_ag_caseno]": {
                    required: "Please insert case no",
                    number: "Please enter only numeric value"
                },
                "lone[loan_ag_date]": {
                    required: "Please select date",
                },
                "lone[loan_ag_product]": {
                    required: "Please select product",
                },
                "lone[loan_ag_dealer]": {
                    required: "Please select dealer",
                },
                
                
                "lone[invoice_value]": {
                    required: "Please insert invoice value",
                    number: "Please enter only numeric value"
                },
                "lone[down_payment]": {
                    required: "Please insert down payment ",
                    number: "Please enter only numeric value"
                },
                "lone[loan_ac_no]": {
                    required: "Please enter Loan A/C No",
                    number: "Please enter only numeric value"
                },
                "lone[loan_amount]": {
                    required: "Please enter Loan Amount",
                    number: "Please enter only numeric value"
                },
                "lone[loan_for_month]": {
                    required: "Please enter For (in months)",
                    number: "Please enter only numeric value"
                },
                "lone[loan_interest]": {
                    required: "Please enter Interest ",
                    number: "Please enter only numeric value"
                },
                
                
//    application details
                "lone_details[borrower_name]": {
                    required: "Please enter name ",
                },
                
                 "lone_details[borrower_age]": {
                    required: "Please enter age ",
                    number: "Please enter only numeric value"
                },
                 "lone_details[borrower_care_of_name]": {
                    required: "Please enter care of name ",
                },
                
                 "lone_details[borrower_present_addr]": {
                    required: "Please enter present address ",
                },
                 "lone_details[borrower_present_addr_ladmark]": {
                    required: "Please enter present_address ladmark ",
                },
                 "lone_details[borrower_parmanent_addr]": {
                    required: "Please enter parmanent address ",
                },
                 "lone_details[borrower_present_addr_type]": {
                    required: "Please enter present addrress type ",
                },
                
                 "lone_details[borrower_occupation]": {
                    required: "Please enter occupation ",
                },
                
                 "lone_details[borrower_office_addr]": {
                    required: "Please enter Interest ",
                },
                
                 "lone_details[borrower_designation]": {
                    required: "Please enter office addrress ",
                },
                
                 "lone_details[borrower_phone_office]": {
                    required: "Please enter office phone number  ",
                    number: "Please enter only numeric value"
                },
                 "lone_details[borrower_family_income]": {
                    required: "Please enter Family Income ",
                    number: "Please enter only numeric value"
                },
                 "lone_details[borrower_phone_residence]": {
                    required: "Please enter residence phone number",
                    number: "Please enter only numeric value"
                },
                 
                 "lone_details[borrower_phone_mobile]": {
                    required: "Please enter mobile ",
                    number: "Please enter only numeric value"
                },
                
//    Co-Borrower Details

//                "loans_co[co_borrower_name]": {
//                    required: "Please enter name ",
//                },
//                
//                 "loans_co[co_borrower_age]": {
//                    required: "Please enter age ",
//                    number: "Please enter only numeric value"
//                },
//                 "loans_co[co_borrower_care_of_name]": {
//                    required: "Please enter care of name ",
//                },
//                
//                 "loans_co[co_borrower_present_addr]": {
//                    required: "Please enter present address ",
//                },
//                 "loans_co[co_borrower_present_addr_ladmark]": {
//                    required: "Please enter present_address ladmark ",
//                },
//                 "loans_co[co_borrower_parmanent_addr]": {
//                    required: "Please enter parmanent address ",
//                },
//                 "loans_co[co_borrower_present_addr_type]": {
//                    required: "Please enter present addrress type ",
//                },
//                
//                 "loans_co[co_borrower_occupation]": {
//                    required: "Please enter occupation ",
//                },
//                
//                 "loans_co[co_borrower_office_addr]": {
//                    required: "Please enter Interest ",
//                },
//                
//                 "loans_co[co_borrower_designation]": {
//                    required: "Please enter office addrress ",
//                },
//                
//                 "loans_co[co_borrower_phone_office]": {
//                    required: "Please enter office phone number  ",
//                    number: "Please enter only numeric value"
//                },
//                 "loans_co[co_borrower_phone_residence]": {
//                    required: "Please enter residence phone number",
//                    number: "Please enter only numeric value"
//                },
//                 
//                 "loans_co[co_borrower_phone_mobile]": {
//                    required: "Please enter mobile ",
//                    number: "Please enter only numeric value"
//                },

                   //    Co-Borrower Details

                "loans_guarantor[guarantor_name]": {
                    required: "Please enter name ",
                },
                
                 "loans_guarantor[guarantor_age]": {
                    required: "Please enter age ",
                    number: "Please enter only numeric value"
                },
                 "loans_guarantor[guarantor_care_of_name]": {
                    required: "Please enter care of name ",
                },
                
                 "loans_guarantor[guarantor_present_addr]": {
                    required: "Please enter present address ",
                },
                 "loans_guarantor[guarantor_present_addr_ladmark]": {
                    required: "Please enter present_address ladmark ",
                },
                 "loans_guarantor[guarantor_parmanent_addr]": {
                    required: "Please enter parmanent address ",
                },
                 "loans_guarantor[guarantor_present_addr_type]": {
                    required: "Please enter present addrress type ",
                },
                
                 "loans_guarantor[guarantor_occupation]": {
                    required: "Please enter occupation ",
                },
                
                 "loans_guarantor[guarantor_office_addr]": {
                    required: "Please enter Interest ",
                },
                
                 "loans_guarantor[guarantor_designation]": {
                    required: "Please enter office addrress ",
                },
                
                 "loans_guarantor[guarantor_phone_office]": {
                    required: "Please enter office phone number  ",
                    number: "Please enter only numeric value"
                },
                 "loans_guarantor[guarantor_phone_residence]": {
                    required: "Please enter residence phone number",
                    number: "Please enter only numeric value"
                },
                 
                 "loans_guarantor[guaranto_phone_mobile]": {
                    required: "Please enter mobile ",
                    number: "Please enter only numeric value"
                },
                "loans_guarantor[guarantor_family_income]": {
                    required: "Please enter Family Income ",
                    number: "Please enter only numeric value"
                },

         
            
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endsection 