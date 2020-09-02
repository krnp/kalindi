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
                    <h2>Area <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a href="{{url('dealer/add')}}" class="green"><i class="fa fa-plus green"></i> <span class="green">Add New</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p></p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Profile</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Phone </th>
                            <th class="column-title">Fax</th>
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

                <td class=" "><img src="{{ URL::asset('images/'.$data->profile_pic) }}" width="80" height="80"></td>
                <td class=" ">{{ $data->name}}</td>
                <td class=" ">{{ $data->email}}</td>
                <td class=" ">{{  $data->phone }}</td>
                <td class=" ">{{  $data->fax   }}</td>
                
                <td class=" last">
                  <a href="{{url('dealer/edit/')}}/{{$data->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                  <a href="#" class="btn btn-danger btn-xs"  onclick='deleteItem({{ $data->id}})'><i class="fa fa-trash-o"></i> Delete </a>
      
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
@section('script')
<script type="text/javascript">
  
function deleteItem(id){

    var checkstr =  confirm('are you sure you want to delete this?');
    if(checkstr == true){
    $.ajax({
           type:"GET",
           url:"{{url('dealer/delete')}}?id="+id,
           success:function(res){               
            if(res){
                alert('deleted') ;  
              setTimeout(function(){ location.reload(); }, 1000);  
            }else{
                alert('Error in deleted') ;      
            }
           }
        });

    }else{
    return false;
    }
  }
</script>
@endsection 