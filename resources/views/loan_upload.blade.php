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
<div class="col-md-12 col-sm-12 col-xs-12"> @if (session('status'))
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
    {{ session('status') }} </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
      <h2>Upload Loan Application</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="{{ url('loan-application') }}" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="{{ url('loan-application/add') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div style="padding: 3% 0;">
          <div class="row">
			<div class="col-md-6">
			  <div class="row">
				<div class="col-md-12">
				  <label class="control-label">Upload File (csv or excel file only)</label>
				</div>
				<div class="col-md-12">
				  <input type="file" id="loan_file" name="loan_file" value="" class="form-control" required />
				</div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="row">
				<div class="col-md-12">
				  <label class="control-label">&nbsp;</label>
				</div>
				<div class="col-md-12">
				  <input type="submit" class="btn btn-success" name="submit" value="Upload">
				</div>
			  </div>
			</div>
		  </div>
        </div>
        
      </form>
    </div>
  </div>
</div>
@endsection 

@section('script')
<script type="text/javascript">

 

  $('.cal').Zebra_DatePicker();

</script>
@endsection 