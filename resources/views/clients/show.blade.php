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
                			{{ link_to_route('clients.edit', 'Edit',[$clients->id],['class' => 'btn btn-primary'] )}}
                		</div>
                		<div class="col-md-1">
							{!! Form::open(array('route' => ['clients.destroy',$clients->id], 'class' => 'form-horizontal','method' => 'DELETE')) !!}
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
								<td>{{ $clients->name }}</td>
							</tr>
							<tr>	
								<td>Gender</td>							
								<td>{{ $clients->gender }}</td>
							</tr>
							<tr>	
								<td>Phone</td>
								<td>{{ $clients->phone }}</td>
							</tr>
							<tr>	
								<td>Email</td>
								<td>{{ $clients->email }}</td>
							</tr>
							<tr>	
								<td>Date of birth</td>
								<td>{{ $clients->date_of_birth }}</td>
							</tr>
							<tr>	
								<td>Created at</td>
								<td>{{ $clients->created_at }}</td>
							</tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
