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
      <h2>Field Excutive </h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="<?php echo e(url('fieldexcutive')); ?>" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="<?php echo e(url('fieldexcutive/add')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


	
<div style="padding: 3% 0;">
		 <fieldset>
           <legend> Field Excutive  </legend>
		
		 <div class="row">
		 <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Pan Number <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="pan" value="" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> AAdhar Number <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
				  <input type="text" name="aadhar" value="" class="form-control">
                </div>
              </div>
            </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Name <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <input type="text" name="name" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Email <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="email" class="form-control" required>
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
              <input type="text" name="phone" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Assign Area <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                 <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true" name="assign_area[]" required>
				  <option value="" >-- Select Area --</option>
				  <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  	<option value="<?php echo e($area->id); ?>"> <?php echo e($area->area); ?> </option>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
            </div>
          </div>
        </div>

        <?php /*?><div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Country <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
               <select name="country" id="country" class="form-control" required> 
                   @foreach($country as $c)
                     <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
              </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> State <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <select name="state" id="state" class="form-control" required> 
                   <option value="">select state </option>
              </select>
              </div>
            </div>
          </div>
        </div>
		
		 <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> City <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <select name="city" id="city" class="form-control" required> 
               	   <option value="">select city </option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Pincode <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="pincode" class="form-control" required>
              </div>
            </div>
          </div>
        </div><?php */?>
		
		 <div class="row">
          <div class="col-md-6">
            
			<div class="row">
              <div class="col-md-12">
                <label class="control-label"> Address <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <textarea name="address"  class="form-control" required></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Profile Picture <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <!--   <input type="file" name="profile_pic"> -->
              <input type="file" name="profile_pic" id="profile_pic" required />
              <img id="image" style="max-width: 80px; max-height: 80px;" />
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


	document.getElementById("profile_pic").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
<script type="text/javascript">
   $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('get-state-list')); ?>?country_id="+countryID,
           success:function(res){               
            if(res){
              
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    

    if(stateID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('get-city-list')); ?>?state_id="+stateID,
           success:function(res){               
            if(res){
            
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });

</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>