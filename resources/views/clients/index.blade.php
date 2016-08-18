@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
        				<div class="col-md-10">
                			All Clients
                		</div>
                		<div class="col-md-2">
                			<a href="{{ url('/clients/create') }}" class="btn btn-primary">Create New Client</a>
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
                		<thead>
                			<tr>
                				<th>Name</th>
                				<th>Gender</th>
                				<th>Phone</th>
                				<th>Email</th>
                				<th>Date of birth</th>
                				<th>Created at</th>
                				<th colspan="2"></th>
                			</tr>
                		</thead>    
                		<tbody>
						@foreach($clients as $client)
							<tr>
								<td>{{ link_to_route('clients.show', $client->name, [$client->id]) }}</td>
								<td>{{ $client->gender }}</td>
								<td>{{ $client->phone }}</td>
								<td>{{ $client->email }}</td>
								<td>{{ $client->date_of_birth }}</td>
								<td>{{ $client->created_at }}</td>
								<td colspan="2">
									{{ link_to_route('clients.edit', 'Edit',[$client->id],['class' => 'btn btn-primary'] )}} | 
									{!! Form::open(array('route' => ['clients.destroy',$client->id], 'class' => 'form-horizontal','method' => 'DELETE')) !!}
										{!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
