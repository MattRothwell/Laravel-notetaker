@extends('layouts.nav')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    
    <div class="panel panel-default">
    </div> 
    <h6>Search reults found: {{ ($courses->count() + $modules->count() + $subjects->count()) }}</h6>
        <table class="table table-bordered table-hover" >
            <thead>
                <th>Name</th>
            </thead>
            <tbody>
            @if( ! empty($courses))
                @foreach($courses as $course)
                <tr>
                    <td><a href="{{url('course/'.$course->courseName.'') }}">{{ $course->courseName }}</a></td>
                    <td>Year: {{ $course->courseYear }}</td>
                </tr>
                @endforeach
            @else
            <p> empty course </p>
            
            @endif

            @if( ! empty($modules))
                @foreach($modules as $module)
                    @foreach($userCourses as $course)
                        @if($course->id == $module->courseID)
                            <tr>
                                <td><a href="{{url('course/'.$course->courseName.'/module/'.$module->moduleName.'') }}">{{ $module->moduleName  }}</a></td>
                                <td>Module Code: {{ $module->moduleCode}}</td>
                            </tr>
                            @else
                        @endif
                    @endforeach
                @endforeach
            @else
            <p> empty module </p>
            @endif

            @if( ! empty($subjects))
                @foreach($subjects as $subject)
                    @foreach($modID as $module)
                        @foreach($userCourses as $course)
                            @if($subject->courseID == $course->id && $subject->moduleID == $module->id)
                                <tr>
                                    <td><a href="{{url('course/'.$course->courseName.'/module/'.$module->moduleName.'') }}">{{ $subject->subjectTitle  }}</a></td>
                                    <td>{{ $subject->subjectType }}</td>
                                </tr>
                            @endif
                        @endforeach     
                    @endforeach
                @endforeach
            @else
                <p> empty subjects </p>
            @endif
            </tbody>
        </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
