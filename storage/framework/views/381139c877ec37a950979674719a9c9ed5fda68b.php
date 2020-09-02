<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12"> <?php if(session('status')): ?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Ã—</span> </button>
    <?php echo e(session('status')); ?> </div>
  <?php endif; ?>
  
  <div class="x_title">
      <h2>Loan Agreement<small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
            <li><a href="<?php echo e(url('loan-application/create_lone')); ?>" class="green"><i class="fa fa-plus green"></i> <span class="green">Add New</span></a></li>
        <li><a href="<?php echo e(url('loan-application/add')); ?>" class="green"><i class="fa fa-plus green"></i> <span class="green">Upload</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
  <div class="x_panel">
  	<div class="x_title">
		<h2><small>Filter by</small></h2>
		<ul class="nav navbar-right panel_toolbox">
		  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		</ul>
		<div class="clearfix"></div>
	  </div>
    <div class="x_content">
		<form action="" method="get">
		<div class="filterCLS" role="tabpanel" data-example-id="togglable-tabs">
		  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab_content1" id="Loan" role="tab" data-toggle="tab" aria-expanded="true">Loan</a> </li>
			<li role="presentation" class=""><a href="#tab_content2" id="Borrower" role="tab" data-toggle="tab" aria-expanded="false">Borrower</a> </li>
			<li role="presentation" class=""><a href="#tab_content3" role="tab" id="References" data-toggle="tab" aria-expanded="false">References</a> </li>
			<li role="presentation" class=""><a href="#tab_content4" role="tab" id="Co-Borrower" data-toggle="tab" aria-expanded="false">Co-Borrower</a> </li>
			<li role="presentation" class=""><a href="#tab_content5" role="tab" id="Guarantor" data-toggle="tab" aria-expanded="false">Guarantor</a> </li>
			<li role="presentation" class=""><a href="#tab_content6" role="tab" id="Product" data-toggle="tab" aria-expanded="false">Product</a> </li>
			<li role="presentation" class=""><a href="#tab_content7" role="tab" id="Dealer" data-toggle="tab" aria-expanded="false">Dealer</a> </li>
			<li role="presentation" class=""><a href="#tab_content8" role="tab" id="Surveyor" data-toggle="tab" aria-expanded="false">Surveyor</a> </li>
			<li role="presentation" class=""><a href="#tab_content9" role="tab" id="FieldExcutive" data-toggle="tab" aria-expanded="false">Field Excutive</a> </li>
		  </ul>
		  <div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="Loan">
				  <div class="row">
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Case Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="loan_ag_caseno" value="<?php echo e(app('request')->input('loan_ag_caseno')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Invoice Value</label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="invoice_value_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('invoice_value_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
							  	<option value=">" <?php if(app('request')->input('invoice_value_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('invoice_value_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('invoice_value_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('invoice_value_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="invoice_value" value="<?php echo e(app('request')->input('invoice_value')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Down Payment</label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="down_payment_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('down_payment_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('down_payment_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('down_payment_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('down_payment_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('down_payment_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="down_payment" value="<?php echo e(app('request')->input('down_payment')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Loan A/C No.</label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="loan_ac_no_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('loan_ac_no_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('loan_ac_no_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('loan_ac_no_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('loan_ac_no_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('loan_ac_no_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="loan_ac_no" value="<?php echo e(app('request')->input('loan_ac_no')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Loan Amount</label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="loan_amount_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('loan_amount_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('loan_amount_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('loan_amount_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('loan_amount_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('loan_amount_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="loan_amount" value="<?php echo e(app('request')->input('loan_amount')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Interest@</label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="loan_interest_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('loan_interest_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('loan_interest_operate')=='>'): ?> selected="selected" <?php endif; ?>> ></option>
							  	<option value="<" <?php if(app('request')->input('loan_interest_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('loan_interest_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('loan_interest_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="loan_interest" value="<?php echo e(app('request')->input('loan_interest')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">For (in months)</label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="loan_for_month_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('loan_for_month_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('loan_for_month_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('loan_for_month_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('loan_for_month_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('loan_for_month_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="loan_for_month" value="<?php echo e(app('request')->input('loan_for_month')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Loan Date</label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="loan_ag_date_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('loan_ag_date_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('loan_ag_date_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('loan_ag_date_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('loan_ag_date_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('loan_ag_date_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="loan_ag_date" value="<?php echo e(app('request')->input('loan_ag_date')); ?>" class="form-control zebradate">
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="Borrower">
			  <div class="row">
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Pan Number</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_pan" value="<?php echo e(app('request')->input('borrower_pan')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> AAdhar Number</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_aadhar" value="<?php echo e(app('request')->input('borrower_aadhar')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Name</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_name" value="<?php echo e(app('request')->input('borrower_name')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label"> Age </label>
					</div>
					<div class="col-md-12">
					  <div class="row">
							<div class="col-md-4">
							  <select name="borrower_age_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('borrower_age_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('borrower_age_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('borrower_age_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('borrower_age_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('borrower_age_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="borrower_age" value="<?php echo e(app('request')->input('borrower_age')); ?>" class="form-control">
							</div>
						  </div>
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Father's / Husband Name</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_care_of_name" value="<?php echo e(app('request')->input('borrower_care_of_name')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Present Address</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_present_addr" value="<?php echo e(app('request')->input('borrower_present_addr')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Land Mark</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_present_addr_landmark" value="<?php echo e(app('request')->input('borrower_present_addr_landmark')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Permanent Home Address</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_parmanent_addr" value="<?php echo e(app('request')->input('borrower_parmanent_addr')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Residence Type</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_present_addr_type" value="<?php echo e(app('request')->input('borrower_present_addr_type')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Telephone No</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_telephone" value="<?php echo e(app('request')->input('borrower_telephone')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Gross Family Income</label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_family_income" value="<?php echo e(app('request')->input('borrower_family_income')); ?>" class="form-control">
					</div>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="row">
					<div class="col-md-12">
					  <label class="control-label">Occupation </label>
					</div>
					<div class="col-md-12">
					  <input type="text" name="borrower_occupation" value="<?php echo e(app('request')->input('borrower_occupation')); ?>" class="form-control">
					</div>
				  </div>
				</div>
			</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="References">
			  <div class="row">
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="reference_name" value="<?php echo e(app('request')->input('reference_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Relation</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="reference_relation" value="<?php echo e(app('request')->input('reference_relation')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Address</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="reference_addr" value="<?php echo e(app('request')->input('reference_addr')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Phone</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="reference_phone" value="<?php echo e(app('request')->input('reference_phone')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="Co-Borrower">
			  	<div class="row">
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Pan Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_pan" value="<?php echo e(app('request')->input('co_borrower_pan')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> AAdhar Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_aadhar" value="<?php echo e(app('request')->input('co_borrower_aadhar')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_name" value="<?php echo e(app('request')->input('co_borrower_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Age </label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="co_borrower_age_operate" class="form-control">
							  	<option value="=" <?php if(app('request')->input('co_borrower_age_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('co_borrower_age_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
							  	<option value="<" <?php if(app('request')->input('co_borrower_age_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
							  	<option value=">=" <?php if(app('request')->input('co_borrower_age_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
							  	<option value="<=" <?php if(app('request')->input('co_borrower_age_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="co_borrower_age" value="<?php echo e(app('request')->input('co_borrower_age')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Father's / Husband Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_care_of_name" value="<?php echo e(app('request')->input('co_borrower_care_of_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Present Address</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_present_addr" value="<?php echo e(app('request')->input('co_borrower_present_addr')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Land Mark</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_present_addr_landmark" value="<?php echo e(app('request')->input('co_borrower_present_addr_landmark')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Permanent Home Address</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_parmanent_addr" value="<?php echo e(app('request')->input('co_borrower_parmanent_addr')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Residence Type</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_present_addr_type" value="<?php echo e(app('request')->input('co_borrower_present_addr_type')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Telephone No</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_telephone" value="<?php echo e(app('request')->input('co_borrower_telephone')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Occupation </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="co_borrower_occupation" value="<?php echo e(app('request')->input('co_borrower_occupation')); ?>" class="form-control">
						</div>
					  </div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="Guarantor">
			  	<div class="row">
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Pan Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_pan" value="<?php echo e(app('request')->input('guarantor_pan')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> AAdhar Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_aadhar" value="<?php echo e(app('request')->input('guarantor_aadhar')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_name" value="<?php echo e(app('request')->input('guarantor_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Age </label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="guarantor_age_operate" class="form-control">
								<option value="=" <?php if(app('request')->input('guarantor_age_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('guarantor_age_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
								<option value="<" <?php if(app('request')->input('guarantor_age_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
								<option value=">=" <?php if(app('request')->input('guarantor_age_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
								<option value="<=" <?php if(app('request')->input('guarantor_age_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="guarantor_age" value="<?php echo e(app('request')->input('guarantor_age')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Father's / Husband Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_care_of_name" value="<?php echo e(app('request')->input('guarantor_care_of_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Present Address</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_present_addr" value="<?php echo e(app('request')->input('guarantor_present_addr')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Land Mark</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_present_addr_landmark" value="<?php echo e(app('request')->input('guarantor_present_addr_landmark')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Permanent Home Address</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_parmanent_addr" value="<?php echo e(app('request')->input('guarantor_parmanent_addr')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Residence Type</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_present_addr_type" value="<?php echo e(app('request')->input('guarantor_present_addr_type')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Telephone No</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_telephone" value="<?php echo e(app('request')->input('guarantor_telephone')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Occupation </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="guarantor_occupation" value="<?php echo e(app('request')->input('guarantor_occupation')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Gross Family Income  </label>
						</div>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-4">
							  <select name="guarantor_family_income_operate" class="form-control">
								<option value="=" <?php if(app('request')->input('guarantor_family_income_operate')=='='): ?> selected="selected" <?php endif; ?>> = </option>
								<option value=">" <?php if(app('request')->input('guarantor_family_income_operate')=='>'): ?> selected="selected" <?php endif; ?>> > </option>
								<option value="<" <?php if(app('request')->input('guarantor_family_income_operate')=='<'): ?> selected="selected" <?php endif; ?>> < </option>
								<option value=">=" <?php if(app('request')->input('guarantor_family_income_operate')=='>='): ?> selected="selected" <?php endif; ?>> >= </option>
								<option value="<=" <?php if(app('request')->input('guarantor_family_income_operate')=='<='): ?> selected="selected" <?php endif; ?>> <= </option>
							  </select>
							</div>
							<div class="col-md-8">
							  <input type="text" name="guarantor_family_income" value="<?php echo e(app('request')->input('guarantor_family_income')); ?>" class="form-control">
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="Product">
			  	<div class="row">
					<div class="col-md-6">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Name</label>
						</div>
						<div class="col-md-12">
						  <select name="loan_ag_product" class="form-control select2">
						  	<option value="">-- Select Products --</option>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($product->id); ?>" <?php if(app('request')->input('loan_ag_product')==$product->id): ?> selected="selected" <?php endif; ?>> <?php echo e($product->name); ?> </option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </select>
						</div>
					  </div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="Dealer">
			  	<div class="row">
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Pan Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="dealer_pan" value="<?php echo e(app('request')->input('dealer_pan')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> AAdhar Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="dealer_aadhar" value="<?php echo e(app('request')->input('dealer_aadhar')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="dealer_name" value="<?php echo e(app('request')->input('dealer_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Email </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="dealer_email" value="<?php echo e(app('request')->input('dealer_email')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Phone</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="dealer_telephone" value="<?php echo e(app('request')->input('dealer_telephone')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Fax </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="dealer_fax" value="<?php echo e(app('request')->input('dealer_fax')); ?>" class="form-control">
						</div>
					  </div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="Surveyor">
			  	<div class="row">
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Pan Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="surveyor_pan" value="<?php echo e(app('request')->input('surveyor_pan')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> AAdhar Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="surveyor_aadhar" value="<?php echo e(app('request')->input('surveyor_aadhar')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="surveyor_name" value="<?php echo e(app('request')->input('surveyor_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Email </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="surveyor_email" value="<?php echo e(app('request')->input('surveyor_email')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Phone</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="surveyor_telephone" value="<?php echo e(app('request')->input('surveyor_telephone')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Address </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="surveyor_addr" value="<?php echo e(app('request')->input('surveyor_addr')); ?>" class="form-control">
						</div>
					  </div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content9" aria-labelledby="FieldExcutive">
			  	<div class="row">
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Pan Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="field_excutive_pan" value="<?php echo e(app('request')->input('field_excutive_pan')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> AAdhar Number</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="field_excutive_aadhar" value="<?php echo e(app('request')->input('field_excutive_aadhar')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Name</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="field_excutive_name" value="<?php echo e(app('request')->input('field_excutive_name')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label"> Email </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="field_excutive_email" value="<?php echo e(app('request')->input('field_excutive_email')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Phone</label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="field_excutive_telephone" value="<?php echo e(app('request')->input('field_excutive_telephone')); ?>" class="form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="row">
						<div class="col-md-12">
						  <label class="control-label">Address </label>
						</div>
						<div class="col-md-12">
						  <input type="text" name="field_excutive_addr" value="<?php echo e(app('request')->input('field_excutive_addr')); ?>" class="form-control">
						</div>
					  </div>
					</div>
				</div>
			</div>
		  </div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-md-12">
			  <button type="submit" class="btn btn-success" name="Submit">Filter</button>
			  <a href="<?php echo e(url('/loan-application')); ?>" class="btn btn-primary">Reset Filter</a>
			</div>
		  </div>
		</form>		
	</div>
  </div>
  
  <div class="x_panel">
    <div class="x_content">
      <p></p>
      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th class="column-title">Borrower Name</th>
              <th class="column-title">Dealer Name</th>
              <th class="column-title">Loan Amount </th>
              <th class="column-title">Interest </th>
              <th class="column-title">Down Payment </th>
              <th class="column-title">Month </th>
              <th class="column-title">Date </th>
              <th class="column-title no-link last"><span class="nobr">Action</span> </th>
              <th class="bulk-actions" colspan="7" align="center"> <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a> </th>
            </tr>
          </thead>
          <tbody>
          <script type="text/javascript" src="<?php echo e(asset('js/zebra_datepicker.min.js')); ?>"></script>
          <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php //print_r($data);exit; ?>
          <tr class="even pointer">
            <td class=" "><?php echo e($data->borrower); ?></td>
            <td class=" "><?php echo e($data->dealer); ?></td>
            <td class=" ">&#8377;<?php echo e($data->loan_amount); ?></td>
            <td class=" "><?php echo e($data->loan_interest); ?></td>
            <td class=" ">&#8377;<?php echo e($data->down_payment); ?></td>
            <td class=" "><?php echo e($data->loan_for_month); ?></td>
            <td class=" "><?php echo e($data->created_at); ?></td>
            <td class=" last">
                <?php  $selectTests = Common::getStatus($data->id);   
                if($selectTests ==0){ ?>
					<a href="<?php echo e(url('loan-application/emis_status/1/')); ?>/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Approve </a>
                <?php }if($selectTests ==1){ ?>
					<a href="<?php echo e(url('loan-application/emis_status/0/')); ?>/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-ban"></i> Disapprove </a>
                <?php }?>
                                        
				<?php $emis = Common::getEmis($data->id);  
                                if($emis > 0){ ?>
					<a href="<?php echo e(url('loan-application/emis/')); ?>/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-calculator"></i> EMIs </a>
				<?php }if($emis ==0 ){ ?>
					<a href="javascript:;" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo e($data->id); ?>"><i class="fa fa-calculator"></i> Genearate EMIs </a>
                                <?php }?>
					<div class="modal fade bs-example-modal-sm<?php echo e($data->id); ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
					
                                            
                                            <form action="<?php echo e(url('loan-application/generateemis',array($data->id))); ?>" method="post">
					<?php echo e(csrf_field()); ?>

                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header bg-primary">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Enter Emi Day</h4>
                        </div>
                        <div class="modal-body">
                          <input type="text" class="form-control" id="emiday<?php echo e($data->id); ?>" name="emiday" />
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary left">Genearte</button>
                        </div>

                      </div>
                    </div>
					</form>
					
					<script type="text/javascript">
						setTimeout("$('#emiday<?php echo e($data->id); ?>').Zebra_DatePicker({ direction: 1, format: 'd-m-Y'});",2000);
					</script>
                  </div>
				
				<a href="<?php echo e(url('loan-application/view/')); ?>/<?php echo e($data->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
				<a href="<?php echo e(url('loan-application/edit/')); ?>/<?php echo e($data->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
				<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo e($data->id); ?>"><i class="fa fa-trash-o"></i> Delete </a>
              <div id="myModal<?php echo e($data->id); ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header modal-header-danger">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><?php echo e($data->borrower); ?></h4>
                    </div>
                    <div class="modal-body">
                      <h3>Do you want to delete this account type?</h3>
                    </div>
                    <div class="modal-footer">
                      <form action="<?php echo e(url('/loan-application/delete/')); ?>/<?php echo e($data->id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" name="submit" class="btn btn-danger left" data-dismiss="modal" >delete</button>
                      </form>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(funtion(){
		$('.select2').select2({
		  placeholder: 'Select an option'
		});
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>