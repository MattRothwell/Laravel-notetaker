@extends('layouts.nav')
@section('title', 'Find Course')
@section('content')

<h6>Add courses to your subscriptions to save time</h6>
<div class="container">
	<div class="row col-md-8">
	{!! Form::open(['method'=>'GET', 'url' => 'course/find','role'=>'search'])  !!}
		<div class="input-group custom-search-form">
		    <input type="text" class="form-control" name="search" placeholder="Find new courses...">
		    <span class="input-group-btn">
		        <button class="btn btn-default-sm" type="submit">
		            <i class="fa fa-search">Search</i>
		        </button>
		    </span>
		</div>
	{!! Form::close() !!}
	</div>
</div>
 <div class="panel panel-default">
    </div>
 <div>
        
 <div class="container">
    @if( ! empty($courses))
    	@foreach($courses as $course)
    		<div class="row">
		    	<div class="col-md-6">
			        <div class="dropdown">
			            <a href="course/{{ $course->courseName }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			                {{ $course->courseName }} <span class="caret"></span><span class="glyphicon glyphicon-folder-close"></span>
			            </a>

			            <ul class="dropdown-menu">
			            @foreach ($modules as $module)
			            	@if ($module->courseID == $course->id)
			                <li><a href="{{ url('course/'.$course->courseName.'/module/'.$module->moduleName) }}">{{ $module->moduleName}}</a>
			                </li>
			                @endif
			            @endforeach
			            </ul>
			        </div>
				</div>
				<div class="col-md-6">
					<a role="button" class="btn btn-primary btn-md" href="{{ action('CourseController@subscribe', $course->id) }}" value="{{ $course->id}}"><span class="glyphicon glyphicon-plus"></span>Subscribe</a>
			    </div>
			    <hr>
			</div>
        @endforeach
    @else
        <p> No courses found under search results </p>
    @endif
	
</div>

@endsection