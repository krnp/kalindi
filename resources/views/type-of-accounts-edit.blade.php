@extends('layouts.app')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	@if (session('status'))
						<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
						{{ session('status') }}
					  </div>
                    @endif
					
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Type of Accounts <small>Edit "<strong>{{$result->type_name}}</strong>" account</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a href="{{ url('type-of-accounts') }}" class="green"><i class="fa fa-reply green"></i> <span class="green">Back</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal" method="POST" action="{{ url('type-of-accounts/edit') }}/{{$result->id}}">
						{{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="type_name" name="type_name" value="{{$result->type_name}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Closes To <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="closes_to" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="B" @if($result->closes_to=='B') selected="selected" @endif> Balance Sheet. </option>
							<option value="P" @if($result->closes_to=='P') selected="selected" @endif> P&L Ac. </option>
							<option value="T" @if($result->closes_to=='T') selected="selected" @endif> Trading Ac. </option>
							<option value="M" @if($result->closes_to=='M') selected="selected" @endif> Manufacure Ac. </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Put Title As (with msg.) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="put_title_as" name="put_title_as" value="{{$result->put_title_as}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Control As <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="control_as" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="S" @if($result->control_as=='S') selected="selected" @endif> Sub Ledger </option>
							<option value="Y" @if($result->control_as=='Y') selected="selected" @endif> Yearly </option>
							<option value="M" @if($result->control_as=='M') selected="selected" @endif> Monthly </option>
							<option value="D" @if($result->control_as=='D') selected="selected" @endif> Daily </option>
							<option value="X" @if($result->control_as=='X') selected="selected" @endif> No Control </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Control Narr <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="control_narr" name="control_narr" value="{{$result->control_narr}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Personal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="personal" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="Y" @if($result->personal=='Y') selected="selected" @endif> Yes </option>
							<option value="N" @if($result->personal=='N') selected="selected" @endif> No </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Summarise It <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="summarise_it" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="Y" @if($result->summarise_it=='Y') selected="selected" @endif> Yes </option>
							<option value="N" @if($result->summarise_it=='N') selected="selected" @endif> No </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Print Order <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="print_order" class="form-control col-md-7 col-xs-12">
						  	<option value=""> - Select One - </option>
							<option value="1" @if($result->print_order==1) selected="selected" @endif> Yes </option>
							<option value="0" @if($result->print_order==0) selected="selected" @endif> No </option>
						  </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
            </div>
			

@endsection
