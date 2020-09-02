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
    .setImage{
        width:100px;
        
    }
    
    .setImageother{
        width:100px;
        margin-top:23px;
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
           
                <div style="padding: 3% 0;">
                    <fieldset>
                        <legend>Loan Agreement</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> case No. :</label>
                                        <label class="control-label">{{@$result->loan_ag_caseno}}</label>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Product</label>
                                         <label class="control-label">{{@$result->loan_ag_product}}</label>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Dealer <span class="required">*</span></label>
                                        <label class="control-label">{{@$result->loan_ag_product}}</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Date <span class="required">*</span></label>
                                        <label class="control-label">{{@$result->loan_ag_date}}</label>
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
                                        <label class="control-label">Invoice Value :</label>
                                        <label class="control-label">{{@$result->invoice_value}}</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Down Payment :</label>
                                         <label class="control-label">{{@$result->down_payment}}</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Loan A/C No. :</label>
                                         <label class="control-label">{{@$result->loan_ac_no}}</label>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Loan Amount :</label>
                                        <label class="control-label">{{@$result->loan_amount}}</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> For (in months) :</label>
                                        <label class="control-label">{{@$result->loan_for_month}}</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"> Interest@ :</label>
                                        <label class="control-label">{{@$result->loan_interest}}</label>
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
                                        <label class="control-label">Name of Borrower :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_name}}</label>
                                    </div>
                                     <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Age :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_age}}</label>
                                    </div>
                                     <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Father's / Husband :</label>
                                         <label class="control-label">{{@$result->LoanDetail->lone_borrower_care_of_name}}</label>
                                    </div>
                                    <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Present Address :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_present_addr}}</label>
                                    </div>
                                    <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Land Mark :</label>
                                         <label class="control-label">{{@$result->LoanDetail->lone_borrower_present_addr_ladmark}}</label>
                                    </div>
                                    <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Permanent Home Address : &nbsp;</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_parmanent_addr}}</label>
                                    </div>
                                   <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Residence :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_addr_type}}</label>
                                    </div>
                                   <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Occupation :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_occupation}}</label>
                                    </div>
                                    <div class="col-md-12"> &nbsp;
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Designation :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_occupation}}</label>
                                    </div>
                                    <div class="col-md-12"> &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Name & Office Address/Plase of Business :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_office_addr}}</label>
                                    </div>
                                    <div class="col-md-12"> &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Office :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_phone_office}}</label>
                                    </div>
                                    <div class="col-md-12"> &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Residence :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_phone_residence}}</label>

                                    </div>
                                    <div class="col-md-12">
                                      &nbsp;           
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Mobile :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_phone_mobile}}</label>
                                    </div>
                                    <div class="col-md-12"> &nbsp;   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Is the Post Permanent or Temporary : </label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_job_type}}</label>
                                    </div>
                                    <div class="col-md-12">
                                         &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Whether your occupation is subject to transfer :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_occupation_transfer}}</label>
                                    </div>
                                    <div class="col-md-12"> &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Gross Family Income :</label>
                                        <label class="control-label">{{@$result->LoanDetail->lone_borrower_family_income}}</label>
                                        
                                    </div>
                                    <div class="col-md-12">&nbsp; </div>
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
                                                <label class="control-label">Identity Details :</label>
                                                <label class="control-label">{{@$result->LoanDetail->lone_borrower_identity}}</label>
                                            </div>
                                            <div class="col-md-12">
                                                <img class="setImageother" src="{{ asset('images/loan_details/identity/' . @$result->LoanDetail->lone_borrower_identity_file) }}"> 
                                            
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label"> Bank Detail : </label>
                                                <label class="control-label">{{@$result->LoanDetail->lone_borrower_bankdetail}}</label>
                                            </div>
                                           <div class="col-md-12">
                                            <img class="setImage" src="{{ asset('images/loan_details/bankdetail/' . @$result->LoanDetail->lone_borrower_bankdetail_file) }}"> 
                                            
                                           </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Income Detail : </label>
                                                <label class="control-label">{{@$result->LoanDetail->lone_borrower_incomedetail}}</label>
                                            </div>
                                            <div class="col-md-12">
                                            <img class="setImageother" src="{{ asset('images/loan_details/incomedetail/' . @$result->LoanDetail->lone_borrower_incomedetail_file) }}"> 
                                            
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
                                                <label class="control-label">1. Name of Person : </label>
                                                 <label class="control-label">{{@$result->loansReferences->borrower_reference_1_name}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Relationship : </label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_1_relation}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Address :</label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_1_addr}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Office : </label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_1_phone_office}}</label>
                                            </div>
                                           <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Residence : </label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_1_phone_residence}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Mobile : </label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_1_phone_mobile}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">2. Name of Person : </label>
                                                 <label class="control-label">{{@$result->loansReferences->borrower_reference_2_name}}</label>
                                            </div>
                                             <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Relationship : </label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_2_relation}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Address : </label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_2_addr}}</label>
                                            </div>
                                           <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Office : </label>
                                                <label class="control-label">{{@$result->loansReferences->borrower_reference_2_phone_office}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Residence : </label>
                                                 <label class="control-label">{{@$result->loansReferences->borrower_reference_2_phone_residence}}</label>
                                            </div>
                                            <div class="col-md-12">&nbsp; </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 fileinput">
                                                <label class="control-label">Mobile : </label>
                                                  <label class="control-label">{{@$result->loansReferences->borrower_reference_2_phone_mobile}}</label>
                                            </div>
                                             <div class="col-md-12">&nbsp; </div>
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
					  <label class="control-label">Name of Co-Borrower : </label>
                                        <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_name}}</label>

					</div>
					 <div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Age : </label>
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_age}}</label>
					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					 
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_care_of}} : </label>
                                           <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_care_of_name}} </label>
					</div>
					
				  </div>
				</div>
				
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Present Address : <span class="required">*</span></label>
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_present_addr}} </label>
					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark <span class="required">*</span></label>
                                        <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_present_addr_ladmark}} </label>

					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Permanent Home Address : </label>
                                        <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_parmanent_addr}} </label>

					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence : <span class="required">*</span></label>
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_present_addr_type}} </label>
					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Occupation : </label>
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_occupation}} </label>
					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Designation : </label>
                                           <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_designation}} </label>
					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name & Office Address/Plase of Business : </label>
                                           <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_office_addr}} </label>
					</div>
					<div class="col-md-12">&nbsp; </div>
				  </div>
				</div>
			  </div>
			  <div class="row">
			    
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Office : </label>
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_phone_office}} </label>
                                          
					</div>
					<div class="col-md-12">
                                            &nbsp;
                                            </div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence : </label>
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_phone_residence}} </label>
					</div>
					<div class="col-md-12">
                                            &nbsp;					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Mobile : </label>
                                          <label class="control-label">{{@$result->loanscoBorrowers->co_borrower_phone_mobile}} </label>
                                          
					</div>
                                      <div class="col-md-12">&nbsp;
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
						<label class="control-label">Identity Details : </label>
						<label class="control-label">{{@$result->loanscoBorrowers->loanscoBorrowers}} </label>
					  </div>
					  <div class="col-md-12">
                                            <img class="setImageother" src="{{ asset('images/loans_co/identity/' . @$result->loanscoBorrowers->co_borrower_identity_file) }}"> 
					  </div>
					 
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label"> Bank Detail</label>
						<label class="control-label">{{@@$result->loanscoBorrowers->co_borrower_bankdetail}}</label>
					  </div>
					  <div class="col-md-12">
                                            <img class="setImage" src="{{ asset('images/loans_co/bankdetail/' . @$result->loanscoBorrowers->co_borrower_bankdetail_file)}}"> 
					  </div>
					  
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Income Detail</label>
						<label class="control-label">{{@$result->loanscoBorrowers->co_borrower_incomedetail}}</label>
					  </div>
					  <div class="col-md-12">
                                            <img class="setImageother" src="{{ asset('images/loans_co/incomedetail/' . @$result->loanscoBorrowers->co_borrower_incomedetail_file)}}"> 
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
					  <label class="control-label">Name of Guarantor : </label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_name}} </label>
					</div>
                                      <div class="col-md-12">
                                          &nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-2">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Age : </label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_age}}</label>
					</div>
                                      <div class="col-md-12"> &nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_care_of}} : </label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_care_of_name}} : </label>
					</div>
					<div class="col-md-12">
                                            &nbsp;
					</div>
				  </div>
				</div>
				
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Present Address : </label>
					  <label class="control-label">{{ @$result->loansGuarantors->guarantor_present_addr}} </label>
					</div>
                                      <div class="col-md-12">&nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark : </label>
					  <label class="control-label">{{ @$result->loansGuarantors->guarantor_present_addr_ladmark}}</label>
					</div>
                                      <div class="col-md-12">&nbsp;
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Permanent Home Address : </label>
					  <label class="control-label">{{ @$result->loansGuarantors->guarantor_parmanent_addr}}</label>
					</div>
                                      <div class="col-md-12"> &nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence : </label>
					  <label class="control-label">{{ @$result->loansGuarantors->guarantor_present_addr_type}}</label>
					</div>
					
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Occupation : </label>
                                           <label class="control-label">{{@$result->loansGuarantors->guarantor_occupation}}</label>
					</div>
                                      <div class="col-md-12"> &nbsp;
					</div>
				  </div>
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Designation : </label>
                                           <label class="control-label">{{@$result->loansGuarantors->guarantor_designation}}</label>
					</div>
                                      <div class="col-md-12"> &nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Name & Office Address/Plase of Business <span class="required">*</span></label>
					  <label class="control-label"> {{@$result->loansGuarantors->guarantor_office_addr}}</label>
					</div>
                                      <div class="col-md-12"> &nbsp;
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
			    
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Office : </label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_phone_office}}</label>
					</div>
                                      <div class="col-md-12">&nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence : </label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_phone_residence}}</label>
					</div>
                                      <div class="col-md-12"> &nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Mobile : </label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_phone_mobile}}</label>
					</div>
                                      <div class="col-md-12">&nbsp;					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Is the Post Permanent or Temporary</label>
                                           <label class="control-label">{{@$result->loansGuarantors->guarantor_job_type}}</label>
					</div>
					<div class="col-md-12">
                                            &nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Whether your occupation is subject to transfer</label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_occupation_transfer}}</label>
					</div>
                                      <div class="col-md-12">&nbsp;
					</div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Gross Family Income : </label>
					  <label class="control-label">{{@$result->loansGuarantors->guarantor_family_income}}</label>
					</div>
					<div class="col-md-12">
                                            &nbsp;
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
						<label class="control-label">Identity Details : </label>
						<label class="control-label">{{@$result->loansGuarantors->guarantor_identity}} </label>
					  </div>
					  <div class="col-md-12">
                                            <img class="setImageother" src="{{ asset('images/loans_guarantor/identity/' . @$result->loansGuarantors->guarantor_identity_file) }}"> 
					  </div>
					 
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label"> Bank Detail : </label>
						<label class="control-label"> {{@$result->loansGuarantors->guarantor_bankdetail}}</label>
					  </div>
					  <div class="col-md-12">
                                            <img class="setImageother" src="{{ asset('images/loans_guarantor/bankdetail/' . @$result->loansGuarantors->guarantor_bankdetail_file) }}"> 
					  </div>
					  
					</div>
				  </div>
				  <div class="col-md-4">
					<div class="row">
					  <div class="col-md-12 fileinput">
						<label class="control-label">Income Detail</label>
						<label class="control-label">{{@$result->loansGuarantors->guarantor_incomedetail}}</label>
					  </div>
					  <div class="col-md-12">
                                            <img class="setImageother" src="{{ asset('images/loans_guarantor/incomedetail/' . @$result->loansGuarantors->guarantor_incomedetail_file) }}"> 
					  </div>
					  
					</div>
				  </div>
				</div>
				</fieldset>
			  </div>
          </fieldset>

                </div>

              
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
                "lone_details[borrower_phone_mobile]": {
                    required: true,
                    number: true,
                },
//    Co-Borrower Details
             "loans_co[co_borrower_name]": {
                    required: true,
                },
                "loans_co[co_borrower_age]": {
                    required: true,
                    number: true,
                },"loans_co[co_borrower_care_of_name]": {
                    required: true,
                },
                "loans_co[co_borrower_present_addr]": {
                    required: true,
                },
                "loans_co[co_borrower_present_addr_ladmark]": {
                    required: true,
                },
                "loans_co[co_borrower_parmanent_addr]": {
                    required: true,
                },
                "loans_co[co_borrower_present_addr_type]": {
                    required: true,
                },
                "loans_co[co_borrower_occupation]": {
                    required: true,
                },
                "loans_co[co_borrower_office_addr]": {
                    required: true,
                },
                "loans_co[co_borrower_designation]": {
                    required: true,
                },
                "loans_co[co_borrower_phone_office]": {
                    required: true,
                    number: true,
                },
                "loans_co[co_borrower_phone_residence]": {
                    required: true,
                    number: true,
                },
                "loans_co[co_borrower_phone_mobile]": {
                    required: true,
                    number: true,
                },
                
                
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

},
            messages: {
 /////////////////////////////               
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
                 "lone_details[borrower_phone_residence]": {
                    required: "Please enter residence phone number",
                    number: "Please enter only numeric value"
                },
                 
                 "lone_details[borrower_phone_mobile]": {
                    required: "Please enter mobile ",
                    number: "Please enter only numeric value"
                },
                
//    Co-Borrower Details

                "loans_co[co_borrower_name]": {
                    required: "Please enter name ",
                },
                
                 "loans_co[co_borrower_age]": {
                    required: "Please enter age ",
                    number: "Please enter only numeric value"
                },
                 "loans_co[co_borrower_care_of_name]": {
                    required: "Please enter care of name ",
                },
                
                 "loans_co[co_borrower_present_addr]": {
                    required: "Please enter present address ",
                },
                 "loans_co[co_borrower_present_addr_ladmark]": {
                    required: "Please enter present_address ladmark ",
                },
                 "loans_co[co_borrower_parmanent_addr]": {
                    required: "Please enter parmanent address ",
                },
                 "loans_co[co_borrower_present_addr_type]": {
                    required: "Please enter present addrress type ",
                },
                
                 "loans_co[co_borrower_occupation]": {
                    required: "Please enter occupation ",
                },
                
                 "loans_co[co_borrower_office_addr]": {
                    required: "Please enter Interest ",
                },
                
                 "loans_co[co_borrower_designation]": {
                    required: "Please enter office addrress ",
                },
                
                 "loans_co[co_borrower_phone_office]": {
                    required: "Please enter office phone number  ",
                    number: "Please enter only numeric value"
                },
                 "loans_co[co_borrower_phone_residence]": {
                    required: "Please enter residence phone number",
                    number: "Please enter only numeric value"
                },
                 
                 "loans_co[co_borrower_phone_mobile]": {
                    required: "Please enter mobile ",
                    number: "Please enter only numeric value"
                },

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

         
            
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endsection 