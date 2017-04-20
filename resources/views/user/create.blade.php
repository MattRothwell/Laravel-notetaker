@extends('layouts.app')
@section('title', 'Add New Users')

@section('main')
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
	<h2>New User</h2>
	{!! Form::open(['route' => 'user.store']) !!}
	<table class="table">
		<tr>
			<th>{!! Form::label('username', 'Username', ['class' => 'control-label']) !!}</th>
			<th>{!! Form::label('firstname', 'Firstname', ['class' => 'control-label']) !!}</th>
			<th>{!! Form::label('lastname', 'Lastname', ['class' => 'control-label']) !!}</th>
			<th>{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}</th>
			<th>{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}</th>
			<th>{!! Form::label('admin', 'Admin', ['class' => 'control-label']) !!}</th>
		</tr>
		<tbody>
		<tr>
    		<td>{!! Form::text('username', '', ['class' => 'form-control']) !!}</td>
    		<td>{!! Form::text('firstname', '', ['class' => 'form-control']) !!}</td>
	    	<td>{!! Form::text('lastname', '', ['class' => 'form-control']) !!}</td>
    		<td>{!! Form::text('email', '', ['class' => 'form-control']) !!}</td>
    		<td>{!! Form::text('password', '', ['class' => 'form-control']) !!}</td>
    		<td>{!! Form::text('admin', '', ['class' => 'form-control']) !!}</td>
  		</tr>
  		</tbody>
	</table>
	<div class="form-group">
        <div class="col-md-8">
          {!! Form::submit('Add User', ['id' => 'btn-submit', 'class' => 'btn btn-success']) !!}
          <span></span>
        </div>        
      </div>
	{!! Form::close() !!}
</div>
@endsection
