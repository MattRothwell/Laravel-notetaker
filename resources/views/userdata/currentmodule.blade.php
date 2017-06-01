@extends('layouts.nav')
@section('title', $module->moduleName)
@section('content')
	<div class="container">
		<div class="row">
	  		<div class="col-sm-4">
	  			<h2>{{ $module->moduleCode." | ".$module->moduleName  }}</h2>
	  		</div>
	  		<div class="col-sm-4 text-right">
	  			<a href="{{url('course/'.$course.'/module/'.$module->moduleName.'/edit')}}" class="btn btn-default btn-md"><span class="glyphicon glyphicon-cog"></span></a>
	  		</div>
		</div>
	</div>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="/course/{{ $course }}">{{ $course }}</a></li>
	  <li class="breadcrumb-item"><a href="/course/{{ $course }}/module/{{ $module->moduleName }}">{{ $module->moduleName }}</a></li>
	  <li class="breadcrumb-item active">Subjects</li>
	</ol>
	{{ Html::linkAction('SubjectController@create', 'Add New + ', array($course, $module->moduleName), array('class' => 'btn')) }}

	<h2>Notes</h2>
	@foreach($subjects as $subject)
	<div class="container">
	  <div class="panel-group col-md-8">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <div class="container">
				<div class="row">
			  		<div class="col-sm-4">
			  			<h4 class="panel-title">
				          <a data-toggle="collapse" href="#{{ $subject->id }}">{{ $subject->subjectTitle }}</a>
				        </h4>
			  		</div>
			  		<div class="col-sm-3 text-right">
			  			<ul class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span></span></a>
                            <ul class="dropdown-menu" role="menu">
                                </li>
                                    <li><a href="{{url('/course/'.$course.'/module/'.$module->moduleName.'/subject/'.$subject->id.'') }}">Edit</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                        	</ul>
                        </ul>
			  		</div>
				</div>
		    </div>
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