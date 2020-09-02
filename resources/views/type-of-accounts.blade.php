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
                    <h2>Type of Accounts<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a href="{{url('type-of-accounts/add')}}" class="green"><i class="fa fa-plus green"></i> <span class="green">Add New</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p></p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Type name </th>
                            <th class="column-title">Close To </th>
                            <th class="column-title">Put Title As </th>
                            <th class="column-title">Control As </th>
                            <th class="column-title">Control Narr </th>
                            <th class="column-title">Personal </th>
                            <th class="column-title">Summarise It </th>
                            <th class="column-title">Print </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
						@foreach ($result as $data)
							  <tr class="even pointer">
								<td class=" ">{{$data->type_name}}</td>
								<td class=" ">{{$data->closes_to}}</td>
								<td class=" ">{{$data->put_title_as}}</td>
								<td class=" ">{{$data->control_as }}</td>
								<td class=" ">{{$data->control_narr}}</td>
								<td class=" ">{{$data->personal}}</td>
								<td class=" ">{{$data->summarise_it}}</td>
								<td class=" ">@if ($data->print_order==1) Yes @else No @endif</td>
								<td class=" last">
									<a href="{{url('type-of-accounts/edit/')}}/{{$data->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
									<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{$data->id}}"><i class="fa fa-trash-o"></i> Delete </a>
								
									<!-- Modal -->
									<div id="myModal{{$data->id}}" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header modal-header-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">{{$data->type_name}}</h4>
										  </div>
										  <div class="modal-body">
											<h3>Do you want to delete this account type?</h3>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-danger left" data-dismiss="modal">Delete</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
										  </div>
										</div>
									
									  </div>
									</div>
								</td>
							  </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
							
					<div align="center">{{ $result->links() }}</div>
                  </div>
                </div>
            </div>
			

@endsection
