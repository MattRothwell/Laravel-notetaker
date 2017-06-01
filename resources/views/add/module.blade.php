@extends('layouts.nav')

@section('content')
<div>
	<h4>New Module</h4>
</div>
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
	{!! Form::open(array('route' => array('course.module.store', $courses->courseName))) !!}
			{!! Form::token() !!}
			<div class="row">
				<div class="col-sm-2 center-block">
					{!! Form::label('text', 'Course', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::text( 'course', $curCourse, ['class' => 'form-control', 'readonly' => 'true']) !!}
				</div>
				<div class="col-sm-6 center-block"></div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'New Module Code', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::text('modCode', " ", ['class' => 'form-control'], ['placeholder' => 'Enter Module Code Here']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'New Module Name', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::text('modName', " ",['class' => 'form-control'], ['placeholder' => 'Enter Module Name Here']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-8 center-block">
					{!! Form::submit('Submit', ['id' => 'btn-submit', 'class' => 'btn btn-info btn-lg btn-block']) !!}
				</div>
				<div class="col-sm-6 center-block">
				</div>
			</div>
			{!! Form::close() !!}
		</div>
@endsection