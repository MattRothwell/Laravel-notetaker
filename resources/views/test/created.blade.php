@extends('layouts.app')
@section('title', 'Test Yourself')
@section('main')
<h2>Perfect your answers</h2>
<div class="container">
<ol>
	@foreach ($subjects as $subject)
	<div class="row">
		<div class="col-md-6">
			@if ($subject->subjectType == 'Definition')
			<li>What is the definition of {{$subject->subjectTitle}}?</li>
			@elseif ($subject->subjectType == 'Advantage')
			<li>What is an advantage of {{$subject->subjectTitle}}?</li>
			@elseif ($subject->subjectType == 'Disadvantage')
			<li>What is a disadvantage of {{$subject->subjectTitle}}?</li>
			@elseif ($subject->subjectType == 'Information')
			<li>Please explain '{{$subject->subjectTitle}}'?</li>
			@elseif ($subject->subjectType == 'Image')
			<li>What is the context behind this image titled '{{$subject->subjectTitle}}'?</li>
			@elseif ($subject->subjectType == 'Diagram')
			<li>Please explain the diagram for {{$subject->subjectTitle}}? Make use of trying to draw the diagram to help.</li>
			@endif
			{{ Form::textarea('subjectInfo', null, ['1 < 2', 'class' => 'form-control']) }}

		</div>
		<div class="col-md-6">
			<div class="menu" style="display: none;">
				@if ($subject->subjectType == 4 || $subject->subjectType == 4)
					{{ $subject->file}}
				@endif
				<p>{{$subject->subjectInfo}}</p>
			</div>
		</div>
	</div>
	@endforeach
</ol>
</div>
<div class="row">
    <div class="col-md-2 col-md-offset-4"></div>
    <div class="col-lg-1 col-offset-1 centered" id="reveal">{{ Form::button('Reveal answers to questions', array('class' => 'btn')) }}</div>
</div>
@endsection
