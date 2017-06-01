@extends('layouts.app')
@section('title', 'Test Yourself')
@section('main')
<div class="container">
	<ul class="list-unstyled">
		<li><a href="{{ url('#') }}">Generate Random Test</a></li>
		<h5>Select a course below to create a more precise test for you!</h5>

		{!! Form::open(array('route' => 'Tests.store')) !!}
		@foreach($courses as $course)
  			<a class="btn btn-info btn-md" data-toggle="modal" data-id="{{ $course->id }}" data-target="#testModal">{{ $course->courseName }}</a>
		@endforeach
	</ul>

	<div class="modal fade validate" id="testModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Generate test</h4>
        </div>
        <div class="modal-body edit-content" id='18'>
        	<fieldset id="amount">
        	<input type="hidden" name="id" value="18">
        	<div class="row">
			{!! Form::label('text', 'Amount of questions: ', ['class' => 'control-label']) !!}
			</div>
			<div class="row">
				<div class="col-md-4">
		        <label>3</label><input type="radio" value="3" name="amount">
		        </div>
		        <div class="col-md-4">
		        <label>5</label><input type="radio" value="5" name="amount">
		        </div>
		        <div class="col-md-4">
		        <label>10</label><input type="radio" value="10" name="amount">
		        </div>
		    </fieldset>
        </div>
        <div class="modal-footer">
			<div class="col-sm-6 center-block">
				{!! Form::submit('Submit', ['id' => 'btn-submit', 'class' => 'btn btn-info btn-lg btn-block']) !!}
			</div>
			<div class="col-sm-6 center-block">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
        </div>
      </div>
      
    </div>
  </div>
  {{ Form::close() }}
</div>
@endsection