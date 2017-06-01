@extends('layouts.nav')
@section('title', $course)

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstap.min.css">

</head>
@section('content')

<h2>{{ $course }}</h2>
	{!! Form::open(array('route' => 'course.store')) !!}
		{!! Form::token() !!}
		{{ Form::button('Subscribe to Course', array('class' => 'btn')) }}
	{!! Form::close()!!}

	@if($modules == '[]')
		<p>No modules Currently available</p>
	@endif

	@foreach($modules as $module)
	<a href="{{ url('course/'.$course.'/module/'.$module->moduleName.'') }}" class="btn btn-info" role="button" value="{{ $module->id}} ">{{ $module->moduleName." | ".$module->moduleCode }}</a>
    @endforeach

@endsection



@section('scripts')

<script type="text/javascript" src="/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("subscribe").click(function(){
    	$('subscribe').click(function(){
    		alert(this.val());
    	});
        /*$.ajax({url: "course.show", success: function(result){
            $(".title").html(result);
        }});*/
    });
});

</script>

@stop