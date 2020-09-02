<?php $__env->startSection('content'); ?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<?php if(session('status')): ?>
						<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
						<?php echo e(session('status')); ?>
					  </div>
                    <?php endif; ?>
					
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Type of Accounts <small>Edit "<strong><?php echo e($result->type_name); ?></strong>" account</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a href="<?php echo e(url('type-of-accounts')); ?>" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('type-of-accounts/edit')); ?>/<?php echo e($result->id); ?>">
						<?php echo e(csrf_field()); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="type_name" name="type_name" value="<?php echo e($result->type_name); ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Closes To <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="closes_to" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="B" <?php if($result->closes_to=='B'): ?> selected="selected" <?php endif; ?>> Balance Sheet. </option>
							<option value="P" <?php if($result->closes_to=='P'): ?> selected="selected" <?php endif; ?>> P&L Ac. </option>
							<option value="T" <?php if($result->closes_to=='T'): ?> selected="selected" <?php endif; ?>> Trading Ac. </option>
							<option value="M" <?php if($result->closes_to=='M'): ?> selected="selected" <?php endif; ?>> Manufacure Ac. </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Put Title As (with msg.) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="put_title_as" name="put_title_as" value="<?php echo e($result->put_title_as); ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Control As <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="control_as" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="S" <?php if($result->control_as=='S'): ?> selected="selected" <?php endif; ?>> Sub Ledger </option>
							<option value="Y" <?php if($result->control_as=='Y'): ?> selected="selected" <?php endif; ?>> Yearly </option>
							<option value="M" <?php if($result->control_as=='M'): ?> selected="selected" <?php endif; ?>> Monthly </option>
							<option value="D" <?php if($result->control_as=='D'): ?> selected="selected" <?php endif; ?>> Daily </option>
							<option value="X" <?php if($result->control_as=='X'): ?> selected="selected" <?php endif; ?>> No Control </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Control Narr <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="control_narr" name="control_narr" value="<?php echo e($result->control_narr); ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Personal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="personal" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="Y" <?php if($result->personal=='Y'): ?> selected="selected" <?php endif; ?>> Yes </option>
							<option value="N" <?php if($result->personal=='N'): ?> selected="selected" <?php endif; ?>> No </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Summarise It <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="summarise_it" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="Y" <?php if($result->summarise_it=='Y'): ?> selected="selected" <?php endif; ?>> Yes </option>
							<option value="N" <?php if($result->summarise_it=='N'): ?> selected="selected" <?php endif; ?>> No </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Print Order <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="print_order" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="1" <?php if($result->print_order==1): ?> selected="selected" <?php endif; ?>> Yes </option>
							<option value="0" <?php if($result->print_order==0): ?> selected="selected" <?php endif; ?>> No </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
            </div>
			

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>