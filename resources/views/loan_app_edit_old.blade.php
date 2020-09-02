@extends('layouts.app')

@section('customcss')
<style>

legend{

width:auto!important;

padding: 0px!important;

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
      <form class="form-horizontal" method="POST"

         action="{{ url('loan-application/edit',array($result->id)) }}">
        {{ csrf_field() }}
        <div style="padding: 3% 0;">
          <fieldset>
          <legend>Loan Agreement</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Pan Number <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="loan_ag_pannum" value="{{ $result->loan_ag_pannum }}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> AAdhar Number <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
				  <input type="text" name="loan_ag_aadhar" value="{{ $result->loan_ag_aadhar }}" class="form-control">
                </div>
              </div>
            </div>
          </div>
		  <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="loan_ag_name" value="{{ $result->loan_ag_name }}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Address of Borrower <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="loan_ag_address" class="form-control">{{$result->loan_ag_address}}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> case No. <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_ag_caseno" name="loan_ag_caseno" value="{{$result->loan_ag_caseno}}" class="form-control">
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
						<option value="{{$res->id}}" @if($result->loan_ag_product==$res->id) selected="selected" @endif>{{$res->name}}</option>
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
						<option value="{{$res->id}}" @if($result->loan_ag_dealer==$res->id) selected="selected" @endif>{{$res->name}}</option>
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
                  <input type="text" id="loan_ag_date" name="loan_ag_date"  class="form-control cal" value="{{date('Y-m-d',$result->loan_ag_date)}}" >
                </div>
              </div>
            </div>
          </div>
          </fieldset>
        </div>
        <div style="padding: 3% 0;">
          <fieldset>
          <legend>Loan Application</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name Of Applicant <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_name" name="loan_app_name" value="{{$result->loan_app_name}}" class="form-control">
				  
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Product <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_product" name="loan_app_product" value="{{$result->loan_app_product}}" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Invoice Value <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_invoice" name="loan_app_invoice" value="{{$result->loan_app_invoice}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Down Payment <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_down_payment" name="loan_app_down_payment" value="{{$result->loan_app_down_payment}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Loan a/c No. <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_loan_account" name="loan_app_loan_account" value="{{$result->loan_app_loan_account}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Loan Amount <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_loan_amount" name="loan_app_loan_amount" value="{{$result->loan_app_loan_amount}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Month <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_month" name="loan_app_month" value="{{$result->loan_app_month}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Interest <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_interest" name="loan_app_interest" value="{{$result->loan_app_interest}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> On Loan date <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_loandate" name="loan_app_loandate" value="{{date('Y-m-d',$result->loan_app_loandate) }}"  class="form-control cal">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> For Month <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="loan_app_formonth" name="loan_app_formonth" value="{{$result->loan_app_formonth}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name of The borrower <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_name" name="first_loanapp_name" value="{{$result->first_loanapp_name}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> age <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_age" name="first_loanapp_age" value="{{$result->first_loanapp_age}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Fathers/ Husband Name <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_parent" name="first_loanapp_parent" value="{{$result->first_loanapp_parent}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Present Residential <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="first_loanapp_presesnt_res" class="form-control">{{ $result->first_loanapp_presesnt_res}} </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Land mark <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_landmark" name="first_loanapp_landmark" value="{{$result->first_loanapp_landmark}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> permanent Home Address <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="first_loanapp_per_homeaddr" class="form-control">{{$result->first_loanapp_per_homeaddr}} </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="checkbox"  name="first_loanapp_per_homeaddr_type" value="Residence own">
                  Residence own
                  <input type="checkbox"  name="first_loanapp_per_homeaddr_type" value="Rental">
                  Rental
                  <input type="checkbox"  name="first_loanapp_per_homeaddr_type" value="Parent/spouse" >
                  Parent/spouse
                  <input type="checkbox"  name="first_loanapp_per_homeaddr_type" value="Employer Leased">
                  Employer Leased </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Occupation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_occupation" name="first_loanapp_occupation"  class="form-control" value="{{$result->first_loanapp_occupation}}" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Designation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_designation" name="first_loanapp_designation"  class="form-control" value="{{$result->first_loanapp_designation}}" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name & Office Address/Plase of Business <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="first_loanapp_nameoffice_addr">{{$result->loan_ag_name}}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div> Telephone no </div>
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> office<span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_office" name="first_loanapp_office"  class="form-control" value="{{$result->first_loanapp_office}}" >
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Residence <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_residence" name="first_loanapp_residence"  class="form-control" value="{{$result->first_loanapp_residence}}" >
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Mobile <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_mobile" name="first_loanapp_mobile"  class="form-control" value="{{$result->first_loanapp_mobile}}" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Is the post permanent or temporary? <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea  class="form-control" name="first_loanapp_postpermant">{{$result->first_loanapp_postpermant}} </textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Whether your occupation is subject to transfers? <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea  class="form-control" name="first_loanapp_your_occupation">{{$result->first_loanapp_your_occupation}} </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Gross family income <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_gross_income" name="first_loanapp_gross_income"  class="form-control" value="{{$result->first_loanapp_gross_income}}" >
                </div>
              </div>
            </div>
            <div class="col-md-6"> </div>
          </div>
          <div class="innerlegend">
            <fieldset >
            <legend>Attach Photocopy</legend>
            <div class="row">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12 fileinput">
                    <label class="control-label"> voter card/ration card /Electricity bill / water tax receipt <span class="required">*</span></label>
                  </div>
                  <div class="col-md-12">
                    <input type="file" id="first_loanapp_votercard" name="first_loanapp_votercard" value="{{$result->first_loanapp_votercard}}" >
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12 fileinput">
                    <label class="control-label"> bank detail: photocopy of latest bank statement / first page & updated entries of last 6 months <span class="required">*</span></label>
                  </div>
                  <div class="col-md-12">
                    <input type="file" id="first_loanapp_bankdetail" name="first_loanapp_bankdetail" value="{{$result->first_loanapp_bankdetail}}" >
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12 fileinput">
                    <label class="control-label"> salary certificate/ income tax return <span class="required">*</span></label>
                  </div>
                  <div class="col-md-12">
                    <input type="file" id="first_loanapp_salarycerticate" name="first_loanapp_salarycerticate" value="{{$result->first_loanapp_salarycerticate}}" >
                  </div>
                </div>
              </div>
            </div>
            </fieldset>
          </div>
          <div>References 1.Relative   2. Associate/colleague/friend</div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name of person <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_refname" name="first_loanapp_refname" value="{{$result->first_loanapp_refname}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Relation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_relation" name="first_loanapp_relation"  class="form-control" value="{{$result->first_loanapp_relation}}" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Address <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="first_loanapp_addr" class="form-control">{{$result->first_loanapp_addr}}</textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Telephone No. <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_tel" name="first_loanapp_tel" value="{{$result->first_loanapp_tel}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          2.
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name of person <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_ref2name" name="first_loanapp_ref2name"  class="form-control" value="{{$result->first_loanapp_ref2name}}" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Relation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_relation2" name="first_loanapp_relation2"  class="form-control" value="{{$result->first_loanapp_relation2}}" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Address <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="first_loanapp_address2"  class="form-control">{{$result->first_loanapp_address2}} </textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Telephone No. <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="first_loanapp_tel2" name="first_loanapp_tel2"  class="form-control" value="{{$result->first_loanapp_tel2}}" >
                </div>
              </div>
            </div>
          </div>
          2.
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name of Co-borrower <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="second_app_coborrower_name" name="second_app_coborrower_name"  class="form-control" value="{{$result->second_app_coborrower_name}}" >
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> age <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="second_app_age" name="second_app_age" value="{{$result->second_app_age}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Realtion with applicant ( if any ) <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="second_app_applicant_relation" name="second_app_applicant_relation"  class="form-control" value="{{$result->second_app_applicant_relation}}" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Fathers/ Husband Name <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="second_app_parent" name="second_app_parent" value="{{$result->second_app_parent}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Present Residential <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="second_app_presentresi"  class="form-control">{{$result->second_app_presentresi}}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Land mark <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="second_app_landmark" name="second_app_landmark"  class="form-control" value="{{$result->second_app_landmark}}" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> permanent Address <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="second_app_peraddr" class="form-control">{{$result->second_app_peraddr}}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="checkbox" name="second_app_peraddr_type" value="Residence own" >
                  Residence own
                  <input type="checkbox" name="second_app_peraddr_type" value="Rental">
                  Rental
                  <input type="checkbox" name="second_app_peraddr_type" value="Parent/spouse">
                  Parent/spouse
                  <input type="checkbox" name="second_app_peraddr_type" value="Employer Leased">
                  Employer Leased </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Occupation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="second_app_occupation" name="second_app_occupation" value="{{$result->second_app_occupation}}" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Designation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="second_app_designation" name="second_app_designation" value="{{$result->second_app_designation}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          3.
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name of Co-borrowe<span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_coborr_name" name="third_app_coborr_name" value="{{$result->third_app_coborr_name}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> age <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_age" name="third_app_age" value="{{$result->third_app_age}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Realtion with applicant ( if any ) <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_applicantrel" name="third_app_applicantrel" value="{{$result->third_app_applicantrel}}" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Fathers/ Husband Name <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_parent" name="third_app_parent" value="{{$result->third_app_parent}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Present Residential <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="third_app_present_resid"  class="form-control">{{$result->third_app_present_resid}} </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Lank mark <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_landmark" name="third_app_landmark" value="{{$result->third_app_landmark}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> permanent Home Address <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="third_app_perhomeaddr"  class="form-control"> {{$result->third_app_landmark}}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="checkbox"  name="third_app_home_type" value="Residence own" >
                  Residence own
                  <input type="checkbox"  name="third_app_home_type" value="Rental" >
                  Rental
                  <input type="checkbox"  name="third_app_home_type" value="Parent/spouse">
                  Parent/spouse
                  <input type="checkbox" id="" name="third_app_home_type" value="Employer Leased">
                  Employer Leased </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Occupation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_occupation" name="third_app_occupation" value="{{$result->third_app_occupation}}" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Designation <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_designation" name="third_app_designation" value="{{$result->third_app_designation}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name & Office Address/Plase of Business <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="third_app_nameoffice_addr" class="form-control">{{$result->third_app_nameoffice_addr }} </textarea>
                </div>
              </div>
            </div>
          </div>
          <div> Telephone no </div>
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> office<span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_office" name="third_app_office"  class="form-control" value="{{$result->third_app_office}}" >
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Residence <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_residence" name="third_app_residence" value="{{$result->third_app_residence }}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Mobile <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_mobile" name="third_app_mobile" value="{{$result->third_app_mobile}}"  class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Is the post permanent or temporary? <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="third_app_postpermannt" class="form-control">{{$result->third_app_postpermannt}} </textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Whether your occupation is subject to transfers? <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="third_app_your_occupation" class="form-control">{{$result->third_app_your_occupation }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Gross family income <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="third_app_gross_income" name="third_app_gross_income"  class="form-control" value="{{$result->third_app_gross_income}}" >
                </div>
              </div>
            </div>
            <div class="col-md-6"> </div>
          </div>
          <div class="innerlegend">
            <fieldset >
            <legend>Attach Photocopy</legend>
            <div class="row">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12 fileinput">
                    <label class="control-label"> voter card/ration card /Electricity bill / water tax receipt <span class="required">*</span></label>
                  </div>
                  <div class="col-md-12">
                    <input type="file" id="third_app_votercard" name="third_app_votercard" value="{{$result->third_app_votercard }}" >
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12 fileinput">
                    <label class="control-label"> bank detail: photocopy of latest bank statement / first page & updated entries of last 6 months <span class="required">*</span></label>
                  </div>
                  <div class="col-md-12">
                    <input type="file" id="third_app_bankdetail" name="third_app_bankdetail" value="{{$result->third_app_bankdetail}}" >
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12 fileinput">
                    <label class="control-label"> salary certificate/ income tax return <span class="required">*</span></label>
                  </div>
                  <div class="col-md-12">
                    <input type="file" id="third_app_salary_certificate" name="third_app_salary_certificate"  value="{{$result->third_app_salary_certificate}}" >
                  </div>
                </div>
              </div>
            </div>
            </fieldset>
          </div>
          </fieldset>
        </div>
        <div style="padding: 3% 0;">
          <fieldset>
          <legend>LOAN AGREEMENT</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Agrement made on <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="finalag_agrment_made" name="finalag_agrment_made"  class="form-control" value="{{$result->finalag_agrment_made}}" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Date <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="finalag_date" name="finalag_date" value="{{date('Y-m-d',$result->finalag_date) }}" class="form-control cal">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> kalindi finance (first part) <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="finalag_kalindifirst" name="finalag_kalindifirst"  class="form-control" value="{{$result->finalag_kalindifirst}}" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> borrower name and address (first part) <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="finalag_borrowname"  class="form-control">{{$result->finalag_borrowname}} </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name of the guarantor (Third  part) <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="finalag_gauranter" name="finalag_gauranter" value="{{$result->finalag_gauranter}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> loan for the purchase of <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="finalag_loanpurchaseof"  class="form-control">{{$result->finalag_loanpurchaseof}}</textarea>
                </div>
              </div>
            </div>
          </div>
          </fieldset>
        </div>
        <div style="padding: 3% 0;">
          <fieldset>
          <legend>PROMISSORY NOTE</legend>
          <div class="row">
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Rs. <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_rs" name="pronote_rs"  class="form-control" value="{{$result->pronote_rs}}" >
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Date <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_date" name="pronote_date"  class="form-control cal" value="{{date('Y-m-d',$result->pronote_date) }}" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">on Demand  i/We (borrower)<span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="pronote_ondemand"  class="form-control">{{$result->pronote_ondemand}} </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">son/daughter/wife <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_parent" name="pronote_parent" value="{{$result->pronote_parent}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> resident of <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="pronote_rsidentof" class="form-control">{{$result->pronote_rsidentof}}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">I (co-borrower) <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_coborrower" name="pronote_coborrower" value="{{$result->pronote_coborrower}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">son/daughter/wife <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_co_parent" name="pronote_co_parent" value="{{$result->pronote_co_parent}}"  class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> resident of <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="pronote_co_residentof" class="form-control">{{$result->pronote_co_residentof }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">I (guarantor) <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_co_guarantor" name="pronote_co_guarantor" value="{{$result->pronote_co_guarantor}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">son/daughter/wife <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_co_guarantor_parent" name="pronote_co_guarantor_parent"  class="form-control" value="{{$result->pronote_co_guarantor_parent }}" >
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> resident of <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <textarea name="pronote_co_guarantor_resident"  class="form-control">{{$result->pronote_co_guarantor_resident }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">sum of rupees<span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_someofrupee" name="pronote_someofrupee"  class="form-control" value="{{$result->pronote_someofrupee}}" >
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Interest <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_interest" name="pronote_interest"  class="form-control" value="{{$result->pronote_interest}}" >
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Date <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_date2" name="pronote_date2" value="{{date('Y-m-d',$result->pronote_date2) }}" class="form-control cal">
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> place <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" id="pronote_place" name="pronote_place" value="{{$result->pronote_place }}"  class="form-control">
                </div>
              </div>
            </div>
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
</script>
@endsection 