@extends('layouts.nav')
@section('title', 'New Subject')
@section('content')

<h2>Notes for {{ $module }}</h2>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/course/{{ $course }}">{{ $course }}</a></li>
  <li class="breadcrumb-item"><a href="/course/{{ $course }}/module/{{ $module }}">{{ $module }}</a></li>
  <li class="breadcrumb-item active">Subjects</li>
</ol>
	@foreach($subjects as $subject)
	<div class="container">

	  <div class="panel-group col-md-8">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" href="#{{ $subject->id }}">{{ $subject->subjectTitle }}</a>
	        </h4>
	      </div>
	      <div id="{{ $subject->id }}" class="panel-collapse collapse">
	        <div class="panel-body">{{ $subject->subjectType}}</div>
	        <div class="panel-footer">{{ $subject->subjectInfo}}</div>
	      </div>
	    </div>
	  </div>
	</div>
    @endforeach

@endsection