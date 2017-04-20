@extends('layouts.app')
@section('title', 'Courses')
@section('main')
<h2>Courses</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Current Courses</div>
                
                <div class="panel-body">
                @foreach ($courses as $course )
                    <a href="{{ url('course/'.$course->courseName.'') }}" class="btn btn-info" role="button">{{ $course->courseName }}</a>
                @endforeach
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection