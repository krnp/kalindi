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
      <h2>Journal Voucher</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a href="{{ url('bank_receipt') }}" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"> <br>
      <form class="form-horizontal" method="POST" action="{{ url('bank_receipt/edit') }}/{{$result->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}

  
<div style="padding: 3% 0;">
            <fieldset>
           <legend> Bank Receipt Voucher </legend>
    
     <div class="row">
           
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"> Voucher No  <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
          <input type="text" name="v_no" value="{{$result->v_no}}" onkeyup="this.value=this.value.replace(/[^\d]/,'')"  class="form-control" maxlength="6" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Bank Code <span class="required">*</span></label>
                </div>
                <div class="col-md-12">
                  <input type="text" value="{{$result->bank_code}}" name="bank_code" value="" class="form-control" maxlength="10" required="">
                </div>
              </div>
            </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Account Code <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
              <input type="text" name="acc_code" value="{{$result->acc_code}}"  onkeyup="this.value=this.value.replace(/[^\d]/,'')"  class="form-control" maxlength="6" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Case No <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="case_no" value="{{$result->case_no}}" class="form-control" required>
              </div>
            </div>
          </div>
        </div>

       <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Narration <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
               <input type="text" name="narr" value="{{$result->narr}}" class="form-control" required>
              </div>
            </div>
          </div>
        
            <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Check No <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="ch_no" value="{{$result->ch_no}}" class="form-control" required>
              </div>
            </div>
          </div>
        </div>
         <div class="row">
            <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Amount<span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" value="{{$result->amount}}" name="amount" id="chosen-keyword-container" class="form-control num1 key"  required>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label"> Principle <span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="principle" value="{{$result->principle}}" class="form-control num2 key" required>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Interest<span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input type="text" name="interest" value="{{$result->interest}}" class="form-control sum"  readonly="">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Check Date<span class="required">*</span></label>
              </div>
              <div class="col-md-12">
                <input name="ch_date" id="date" value="{{$result->ch_date}}" class="form-control" disabled="">
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
  $( function() {
   $('#date').Zebra_DatePicker({
    direction:0,
    format: 'd-m-Y'
   // direction: [true,'<?php //echo date("Y-m-d")?>']
   });
  } );
  </script>
<script type="text/javascript">
    $(document).ready(function() {
    $(".sum").val();
    $(".key").val();

    function calc() {

        var $num1 = ($.trim($(".num1").val()) != "" && !isNaN($(".num1").val())) ? parseFloat($(".num1").val()) : 0;
        console.log($num1);
        var $num2 = ($.trim($(".num2").val()) != "" && !isNaN($(".num2").val())) ? parseFloat($(".num2").val()) : 0;
        console.log($num2);
        $(".sum").val($num1 - $num2);
    }
    $(".key").keyup(function() {
        calc();
    });
});
</script>
@endsection