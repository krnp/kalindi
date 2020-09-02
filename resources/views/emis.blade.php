@extends('layouts.app')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_title">
      <h2>{{$result->loan_ag_name}} ({{$result->loanProduct->name}})<small></small></h2>
      <div class="clearfix"></div>
    </div>
  @if (session('status'))
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
    {{ session('status') }}
  </div>
  @endif
  <div class="x_panel">
    <div class="x_content">
      <p></p>
      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th class="column-title" width="20%">Emi</th>
              <th class="column-title" width="15%">Emi Date </th>
              <th class="column-title" width="10%">Emi Amount </th>
              <th class="column-title" width="15%">Payment Date </th>
              <th class="column-title" width="10%">Payment Amount </th>
              <th class="column-title" width="10%">Balance Amount </th>
              <th class="column-title no-link last" width="10%">Status</th>
              <th class="column-title no-link last" width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
			@php
				$temi = 0;
				$tpaid = 0;
				$tbalance = 0;
			@endphp
          @foreach ($result->totalEmis as $data)
		  	@php
				$temi = $temi + $data->emi_amount;
				$tpaid = $tpaid + $data->payment_amout;
				if($data->payment_amout > 0)
				$tbalance = $tbalance + ($data->emi_amount - $data->payment_amout);
			@endphp
          <tr class="even pointer">
            <td class=" ">{{$data->title}}</td>
            <td class=" ">{{date("d M, Y",$data->emi_date)}}</td>
            <td class=" ">&#8377;{{number_format($data->emi_amount,2)}}</td>
            <td class=" ">@if($data->payment_date!=''){{date("d M, Y",$data->payment_date)}}@else - @endif</td>
            <td class=" ">@if($data->payment_amout!='')&#8377;{{number_format($data->payment_amout,2)}}@else - @endif</td>
			<td class=" ">@if(($data->payment_amout < $data->emi_amount) && $data->payment_amout!='')&#8377;{{number_format($data->emi_amount - $data->payment_amout,2)}} @else - @endif</td>
            <td class=" last">
				@if($data->status==0)
					<span class="btn btn-danger btn-xs">Pending</span>
				@elseif($data->status==1)
					<span class="btn btn-warning btn-xs">Partial Paid</span>
				@elseif($data->status==2)
					<span class="btn btn-success btn-xs">Paid</span>
				@endif
            </td>
            <td class=" last">
				@if($data->status==1)
					<span class="btn btn-info btn-xs" data-toggle="modal" data-target=".balanceamt">Pay Balance</span>
				@elseif($data->status==0)
					<span class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm{{$data->id}}">Pay</span>
					
					<div class="modal fade bs-example-modal-sm{{$data->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
					<form action="{{ url('loan-application/payemis',array($data->id)) }}" method="post">
					{{ csrf_field() }}
					<div class="modal-dialog modal-sm">
					  <div class="modal-content">
	
						<div class="modal-header bg-primary">
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
						  </button>
						  <h4 class="modal-title" id="myModalLabel2">Pay Emi ({{date("d M, Y",$data->emi_date)}})</h4>
						</div>
						<div class="modal-body">
						<h5>Emi amount to pay: &#8377;{{number_format($data->emi_amount,2)}}</h5>
						  <div class="form-group">
								Payment Date:<br/>
								<input type="text" class="form-control zebradate" id="paymenttdate" name="paymenttdate" value="@php echo date('d-m-Y H:i'); @endphp" />
							  </div>
						  <div class="form-group has-feedback">
							Enter Amount:<br/>
							<input type="text" class="form-control" id="emiamount{{$data->id}}" name="emiamount" value="{{round($data->emi_amount,2)}}" onkeyup="checkbalanceamt({{$data->id}},{{$data->emi_amount}},this.value);" />
							<div id="balance{{$data->id}}" class="red">&nbsp;</div>
						  </div>
						  <div class="form-group">
							Mode:<br/>
							<select name="mode" class="form-control">
								<option value="cash">By Cash</option>
								<option value="cheque">By Cheque</option>
								<option value="bank">By Bank Transfer</option>
							</select>
						  </div>
						  <div class="form-group">
							Desciption:<br/>
							<textarea class="form-control" name="details" rows="6"></textarea>
						  </div>
						  
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary left">Pay</button>
						</div>
	
					  </div>
					  </form>
					</div>
					
					
				@endif
            </td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr class="headings">
              <th class="column-title" width="20%"></th>
              <th class="column-title" width="15%">TOTAL </th>
              <th class="column-title" width="10%">&#8377;{{number_format($temi,2)}}</th>
              <th class="column-title" width="15%"> </th>
              <th class="column-title" width="10%">&#8377;{{number_format($tpaid,2)}}</th>
              <th class="column-title" width="10%">&#8377;{{number_format($tbalance,2)}}</th>
              <th class="column-title no-link last" width="10%"></th>
              <th class="column-title no-link last" width="10%" id="balanceamttd">
			  	@if($tbalance > 0)
					<span class="btn btn-info btn-xs" data-toggle="modal" data-target=".balanceamt">Pay Balance</span>
					
					<div class="modal fade balanceamt" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
						<form action="{{ url('loan-application/payemis',array($data->id)) }}" method="post">
						{{ csrf_field() }}
						<div class="modal-dialog modal-sm">
						  <div class="modal-content">
		
							<div class="modal-header bg-primary">
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
							  </button>
							  <h4 class="modal-title" id="myModalLabel2">Pay Balance</h4>
							</div>
							<div class="modal-body">
							<h5><strong>Total balance amount to pay: &#8377;{{number_format($tbalance,2)}}</strong><br/>&nbsp;</h5>
							  <input type="hidden" readonly="readonly" class="form-control" id="balanceamt" name="balanceamt" value="{{round($tbalance,2)}}" />
							  <div class="form-group">
								Payment Date:<br/>
								<input type="text" class="form-control zebradate" id="paymenttdate" name="paymenttdate" value="@php echo date('d-m-Y H:i'); @endphp" />
							  </div>
							  <div class="form-group">
								Mode:<br/>
								<select name="mode" class="form-control">
									<option value="cash">By Cash</option>
									<option value="cheque">By Cheque</option>
									<option value="bank">By Bank Transfer</option>
								</select>
							  </div>
							  <div class="form-group">
								Desciption:<br/>
								<textarea class="form-control" name="details" rows="6"></textarea>
							  </div>
							</div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-primary left">Pay</button>
							</div>
						  </div>
						</div>
						</form>
					</div>
				@endif
				
			</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div align="center"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
function checkbalanceamt(id,emi,amt){
	var emi = parseFloat(emi);
	var amt = parseFloat(amt);
	if(amt > emi){
		$("#emiamount"+id).val(emi);
		amt = emi;
	}
	if(amt < 1){
		$("#emiamount"+id).val(0);
		amt = 0;
	}
	if(emi == amt){
		$("#balance"+id).html('&nbsp;');
	}else{
		$("#balance"+id).html('Emi balance amount is ' + (emi-amt));
	}
}
</script>

@endsection 
