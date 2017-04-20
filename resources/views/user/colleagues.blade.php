@extends('layouts.app')
@section('title', 'Your Colleagues')
@section('main')
<div class="container">
	<div class="row">
		{!! Form::open(['method'=>'GET', 'url' => 'user/colleagues','class'=>'navbar-form','role'=>'search'])  !!}
		    <div class="input-group custom-search-form">
		    	<div class='col-md-6'>
		    		<p>Find your Friends & Colleagues today</p>
		    	</div>
		    	<div class='col-md-12'>
			        <input type="text" class="form-control" name="search" placeholder="Find Friends...">
			        <span class="input-group-btn">
			            <button class="btn btn-default-sm" type="submit">
			                <i class="fa fa-search">Search</i>
			            </button>
			        </span>
		        </div>
		    </div>
		{!! Form::close() !!}
	</div>

	@if( ! empty($users))
	    @foreach($users as $user)
	    <div class="row">
			<h4>{{ $user->username }}</h4>
			<h5>{{ $user->firstname }} {{ $user->lastname }}</h5>
			<h5>{{ $user->email }}</h5>
	        </tr>
	       	<div class="panel panel-default">
    		</div>
   		</div>
	    @endforeach
	@else
	    <p> No Users </p>
	@endif

</div>
@endsection