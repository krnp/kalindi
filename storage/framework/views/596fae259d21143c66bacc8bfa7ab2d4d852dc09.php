

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
                
                <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>Hello, <?php echo e(Auth::user()->name); ?>!</h1>
                      <p>You are logged in to The SHRI KALINDI FINANCIERS.</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
			

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>