<?php $__env->startSection('customcss'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12"> <?php if(session('status')): ?>
  <div class="row hidemsg" >
    <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-xs-12">
      <div class="alert alert-success"> <?php echo e(session('status')); ?> </div>
    </div>
  </div>
  <script type="text/javascript">
       setTimeout(()=>{ $(".hidemsg").hide(); },2500);
     </script>
  <?php endif; ?>
  <div class="x_panel">
    <div class="x_title">
      <h2>Dealer Application</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="<?php echo e(url('dealer')); ?>" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="<?php echo e(url('dealer/edit',array($result->id))); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div style="padding: 3% 0;">
          <fieldset>
          <legend> Dealer </legend>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Pan Number <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="pan" value="<?php echo e($result->pan); ?>" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> AAdhar Number <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="aadhar" value="<?php echo e($result->aadhar); ?>" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Name <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="name" class="form-control "  value="<?php echo e($result->name); ?>" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Email <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="email" class="form-control " value="<?php echo e($result->email); ?>" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Phone <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="phone" class="form-control "  value="<?php echo e($result->phone); ?>" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Fax <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="fax" class="form-control"  value="<?php echo e($result->fax); ?>" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Info <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="info" class="form-control"  value="<?php echo e($result->info); ?>" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="row">
                  <div class="col-md-12">
                    <label class="control-label"> Select Area <span class="required">*</span></label>
                  </div>
                  <div class="col-md-12">
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true" name="seleted_area[]" required>
                      <option value="" >--Select Category--</option>
                      <option value="1" <?php if(in_array(1, explode(',',$result->seleted_area))): ?> selected="selected" <?php endif; ?>>india</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Profile Picture<span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="file" name="profile_pic" id="profile_pic">
                  <?php if($result->profile_pic): ?> <img src="<?php echo e(URL::asset('images/'.$result->profile_pic)); ?>" width="80" height="80" id="oldimg"> <?php endif; ?> </div>
              </div>
            </div>
          </div>
          </fieldset>
        </div>
        <input type="submit"  class="btn btn-success"  name="submit">
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
});
</script>
<script type="text/javascript">

    document.getElementById("profile_pic").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("oldimg").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  };

</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>