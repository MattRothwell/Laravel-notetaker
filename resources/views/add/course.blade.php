@extends('layouts.nav')
@section('title', 'New Course')
@section('content')


<div class="container">		
<div class="row">
	<div col-sm-6>
		<h4>New Course</h4>
	    @if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>

	<div col-sm-6>
		<a role="button" class="btn btn-primary btn-md" href="{{ action('CourseController@find') }}">Find a course</a>
		&nbsp;
	</div>			
</div>
		{!! Form::open(array('route' => 'course.store')) !!}
			{!! Form::token() !!}
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'New Course Name: ', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::text('courseName', " ", ['class' => 'form-control'], ['placeholder' => 'Enter Course Name Here']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'Course Year', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::text('courseYear', " ",['class' => 'form-control'], ['placeholder' => 'Enter Course Year Here']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-2 center-block">
					<!--Checkbox default value is 0(false) if checked it will be marked 1(true) for public-->
					{!! Form::label('text', 'Make Course Public: ', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{{ Form::checkbox('public', 1, 0) }}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-2">
					{!! Form::submit('Submit', ['id' => 'btn-submit', 'class' => 'btn btn-success btn-lg btn-block']) !!}
				</div>
				
			</div>
			{!! Form::close() !!}
		</div>
@endsection

@section('scripts')
	
@endsection