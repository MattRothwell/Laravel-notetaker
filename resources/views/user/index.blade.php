@extends('layouts.app')
@section('title', 'Users')

@section('main')
<div class="container">
	<div class="row">
		<a href="user/create" class="btn btn-default-sm">
	    <i class="fa fa-search">Create User</i></a>
    </div>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
		</tr>
		<tbody>
		@foreach ($users as $user)
		<tr>
			<div class='col-md-8'>
	    		<td><label>{{ $user->id }}</label></td>
	    		<td><label>{{ $user->username }}</label></td>
		    	<td><label>{{ $user->firstname }}</label></td>
	    		<td><label>{{ $user->lastname }}</label></td>
	    		<td><label>{{ $user->email }}</label></td>
    		</div>

    		<td>
    		<div class='col-md-1'>
	    		{{ Html::linkRoute('user.edit', 'Edit', $user->id, array('class' => 'btn')) }}
	    		</div>
	    		<div class='col-md-2'>
	    		{{ Html::linkRoute('user.show', 'Details', $user->username, array('class' => 'btn')) }}
	    		</div>
	    		<div class='col-md-4'>
	    		{!! Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'delete'))!!}
	    		{!! Form::submit('Delete', ['class' => 'btn btn-danger pull-right'])!!}
	    		{!! Form::close() !!}
    		</div>
    		</td>
  		</tr>
  		@endforeach
  		</tbody>
	</table>
</div>
@endsection