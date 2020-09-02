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

<div class="col-md-12 col-sm-12 col-xs-12">

  <?php if(session('status')): ?>
 <div class="row hidemsg" >
  <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-xs-12">
     <div class="alert alert-success">
        <?php echo e(session('status')); ?>

     </div>
   </div>
</div>
     <script type="text/javascript">
       setTimeout(()=>{ $(".hidemsg").hide(); },2500);
     </script>
  <?php endif; ?>


  <div class="x_panel">
    <div class="x_title">
      <h2>Receipt Voucher</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="<?php echo e(url('payment')); ?>" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="<?php echo e(url('payment/edit')); ?>/<?php echo e($result->id); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


  
<div style="padding: 3% 0;">
     <fieldset>
           <legend> Receipt </legend>
    
     <div class="row">
	 <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Voucher Type <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="v_type" value="<?php echo e($result->v_type); ?>" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Voucher No <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
				  <input type="text" name="v_no" value="<?php echo e($result->v_no); ?>" class="form-control">
                </div>
              </div>
            </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Account Code <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <input type="text" name="acc_code" class="form-control" value="<?php echo e($result->acc_code); ?>" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Party <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="parti" class="form-control" value="<?php echo e($result->parti); ?>" required>
              </div>
            </div>
          </div>
        </div>

       <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Credit/Debit <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                 <select name="cd_flag" class="form-control col-md-7 col-xs-12">

                <option value=""> - Select One - </option>

              <option value="D" <?php if($result->cd_flag=='D'): ?> selected="selected" <?php endif; ?>> Debit </option>

              <option value="C" <?php if($result->cd_flag=='C'): ?> selected="selected" <?php endif; ?>> Credit </option>

            

              </select>
              </div>
            </div>
          </div>
         

    
     <div class="row">
          <div class="col-md-6">
            
           <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Amount <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                 <input type="text" name="amount" class="form-control" value="<?php echo e($result->amount); ?>" required>
              </div>
            </div>
          </div>
          
        </div>
      </div>
          <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Date<span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input name="date" id="date" value="<?php echo e($result->date); ?>" class="form-control" disabled="">
              </div>
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
  $( function() {
   $('#date').Zebra_DatePicker({
    direction:0,
    format: 'd-m-Y'
   // direction: [true,'<?php //echo date("Y-m-d")?>']
   });
  } );
  </script>
  

<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>