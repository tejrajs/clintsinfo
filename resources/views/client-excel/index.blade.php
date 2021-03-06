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
                			<a href="{{ url('/client-excel/create') }}" class="btn btn-primary">Create New Client</a>
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
                				<th colspan="2"></th>
                			</tr>
                		</thead>    
                		<tbody>
						@foreach($clients as $client)
							<tr>
								<td>{{ link_to_route('client-excel.show', $client[1], [$client[0]]) }}</td>
								<td>{{ $client[3] }}</td>
								<td>{{ $client[4] }}</td>
								<td>{{ $client[2] }}</td>
								<td>{{ $client[7] }}</td>
								<td colspan="2">
									{{ link_to_route('client-excel.edit', 'Edit',[$client[0]],['class' => 'btn btn-primary'] )}} | 
									{!! Form::open(array('route' => ['client-excel.destroy',$client[0]], 'class' => 'form-horizontal','method' => 'DELETE')) !!}
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
