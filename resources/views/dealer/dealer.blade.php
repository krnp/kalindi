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

<div class="col-sm-12 col-md-12  col-xs-12">
 @if (session('status'))
 <div class="row hidemsg" >
  <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-xs-12">
     <div class="alert alert-success">
        {{ session('status') }}
     </div>
   </div>
</div>
     <script type="text/javascript">
       setTimeout(()=>{ $(".hidemsg").hide(); },2500);
     </script>
  @endif
  <div class="x_panel">
    <div class="x_title">
      <h2>Dealer Application</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="{{ url('dealer') }}" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="{{ url('dealer/add') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

	
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
              <input type="text" name="name" class="form-control " required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Email <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <input type="text" name="email" class="form-control "  required>
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
                  <input type="text" name="phone" class="form-control "  required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Fax <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="fax" class="form-control"  required>
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
                <input type="text" name="info" class="form-control"  required>
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
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true" name="seleted_area[]"  required>
                                  <option value="" >--Select Category--</option>
                                  <option value="1">india</option>
                                  <option value="2">chennai</option>
                                  <option value="3">goa</option>
                                  <option value="4">up</option>
                                  <option value="5">mp</option>
                                  <option value="6"> Agra </option>
                                  <option value="7">Aligarh</option>
                                  <option value="8">Allahabad</option>
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
               <input type="file" name="profile_pic" id="profile_pic"  required>
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

@endsection 
@section('script')
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
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
@endsection 