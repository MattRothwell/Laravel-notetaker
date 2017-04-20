@extends('layouts.nav')
@section('title', 'New Subject')
@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/course/{{ $course }}">{{ $course }}</a></li>
  <li class="breadcrumb-item"><a href="/course/{{ $course }}/module/{{ $module }}">{{ $module }}</a></li>
  <li class="breadcrumb-item active">New Note</li>
</ol>
<div>
	<h4>New Note</h4>
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
<div class="container">		
		{!! Form::open(array('route' => array('course.module.subject.store', $course, $module), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true')) !!}
			{!! Form::token() !!}    
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'Note Title: ', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::text('subjectTitle', "", ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'Subject Type', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-3 center-block">
					{{ Form::select('subjectType', array('Definition', 'Advantages', 'Disadvantages', 'Information', 'Image', 'Diagram'), array('class' => 'form-control', 'style' => '')) }}
				</div>
				<div class="col-sm-4 cnter-block">
					{{ Form::label('file', 'upload image or diagrams') }}
       				{{ Form::File('file', ['class' => 'field']) }} 
       			</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'Subject Information', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::textarea('subjectInfo', "",['3 < 7', 'class' => 'form-control']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
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