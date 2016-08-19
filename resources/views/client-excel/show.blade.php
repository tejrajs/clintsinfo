@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
        				<div class="col-md-9">
                			Profiles
                		</div>
                		<div class="col-md-1">
                			{{ link_to_route('client-excel.edit', 'Edit',[$clients[0]],['class' => 'btn btn-primary'] )}}
                		</div>
                		<div class="col-md-1">
							{!! Form::open(array('route' => ['client-excel.destroy',$clients[0]], 'class' => 'form-horizontal','method' => 'DELETE')) !!}
								{!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
							{!! Form::close() !!}
                		</div>
                	</div>
                </div>
                <div class="panel-body"> 
                	@if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                	<table class="table table-striped">   
                		<tbody>
							<tr>
								<td>Name</td>
								<td>{{ $clients[1] }}</td>
							</tr>
							<tr>	
								<td>Gender</td>							
								<td>{{ $clients[3] }}</td>
							</tr>
							<tr>	
								<td>Phone</td>
								<td>{{ $clients[4] }}</td>
							</tr>
							<tr>	
								<td>Email</td>
								<td>{{ $clients[2] }}</td>
							</tr>
							<tr>	
								<td>Date of birth</td>
								<td>{{ $clients[7] }}</td>
							</tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
