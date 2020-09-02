<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>SHRI KALINDI FINANCIERS</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/jqvmap/dist/jqvmap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('build/css/custom.min.css')); ?>" rel="stylesheet">

</head>
<body class="login">
    <div>

      <div class="login_wrapper">
        <div id="register" class="animate form login_form">
          <section class="login_content">
            <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>
              <h1>Create Account</h1>
              <div>
                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="name" required autofocus>

				<?php if($errors->has('name')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('name')); ?></strong>
					</span>
				<?php endif; ?>
              </div>
              <div>
				<input id="email" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>

					<?php if($errors->has('email')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('email')); ?></strong>
						</span>
					<?php endif; ?>
              </div>
              <div>
				<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

				<?php if($errors->has('password')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('password')); ?></strong>
					</span>
				<?php endif; ?>
              </div>
			  <div>
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">
					Register
				</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="<?php echo e(route('login')); ?>" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />


                <div>
                  <a href="<?php echo e(url('/')); ?>"><h1><i class="fa fa-paw"></i> SHRI KALINDI FINANCIERS</h1></a>
                  <p>&copy;<?=date("Y")?> All Rights Reserved. SHRI KALINDI FINANCIERS!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/fastclick/lib/fastclick.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/nprogress/nprogress.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/gauge.js/dist/gauge.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/iCheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/skycons/skycons.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.time.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.stack.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/flot-spline/js/jquery.flot.spline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/flot.curvedlines/curvedLines.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/DateJS/build/date.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jqvmap/dist/jquery.vmap.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('build/js/custom.min.js')); ?>"></script>
</body>
</html>
