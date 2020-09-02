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

<div class="col-md-12 col-sm-12 col-xs-12"> 


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
      <h2>Brand Application</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="{{ url('brand') }}" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="{{ url('brand/edit',array($result->id)) }}" enctype="multipart/form-data">
        {{ csrf_field() }}

  
<div style="padding: 3% 0;">
     <fieldset>
           <legend> Brand </legend>
    
     <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Name <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <input type="text" name="name" class="form-control "  value="{{ $result->name }}" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Brand<span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <input type="text" name="brand" class="form-control " value="{{ $result->brand }}" required>
              </div>
            </div>
          </div>
        </div>
    
     <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Info <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                  <input type="text" name="info" class="form-control "  value="{{ $result->info }}" required>
              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="row">
            <div class="col-md-12">
                <label class="control-label">Image<span class="required">*</span></label>
              </div>
              <div class="col-md-12">
               <input type="file" name="image" id="image">
                 @if($result->image)
                <img src="{{  URL::asset('images/'.$result->image) }}" width="80" height="80" id="oldimg">
                @endif
              </div>
            </div>
          </div>     
        </div>

       <div class="row">
             
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

    document.getElementById("image").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("oldimg").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  };

</script>
@endsection 