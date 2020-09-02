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
                
                <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>Hello, {{ Auth::user()->name }}!</h1>
                      <p>You are logged in to The SHRI KALINDI FINANCIERS.</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
			

@endsection
