@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Client</div>

                <div class="panel-body">
                    {!! Form::model($clients, array('route' => ['client-excel.update', $clients->id], 'class' => 'form-horizontal', 'method' => 'PUT')) !!}
                    {{ csrf_field() }}	
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">	
	                    {!! Form::label('name', 'Name :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::text('name', null, array('class' => 'form-control'))!!}
							@if ($errors->has('name'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">	
	                    {!! Form::label('email', 'Email :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::text('email', null, array('class' => 'form-control'))!!}
							@if ($errors->has('email'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
	                    {!! Form::label('gender', 'Gender :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::select('gender', array('M' => 'Male', 'F' => 'Female', 'O' => 'Other'), array('class' => 'form-control'))!!}
							@if ($errors->has('gender'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
	                    {!! Form::label('phone', 'Phone :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::text('phone', null, array('class' => 'form-control'))!!}
							@if ($errors->has('phone'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	                    {!! Form::label('address', 'Adress :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::textarea('address', null, array('class' => 'form-control'))!!}
							@if ($errors->has('address'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">	
	                    {!! Form::label('nationality', 'Nationality :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::text('nationality', null, array('class' => 'form-control'))!!}
							@if ($errors->has('nationality'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('nationality') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">	
	                    {!! Form::label('date_of_birth', 'Date of Birth :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::text('date_of_birth', null, array('class' => 'form-control'))!!}
							@if ($errors->has('date_of_birth'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
	                    {!! Form::label('education', 'Education :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::text('education', null, array('class' => 'form-control'))!!}
							@if ($errors->has('education'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('education') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('preferred_contact') ? ' has-error' : '' }}">	
	                    {!! Form::label('preferred_contact', 'Preferred Contact :', array('class' => 'col-sm-2 control-label')); !!}
	                    <div class="col-sm-10">
							{!! Form::select('preferred_contact', array('phone' => 'Phone', 'email' => 'Email'), array('class' => 'form-control'))!!}
							@if ($errors->has('preferred_contact'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('preferred_contact') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-2">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-btn fa-user"></i> Update
							</button>
						</div>
					</div>
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection