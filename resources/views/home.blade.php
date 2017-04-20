@extends('layouts.nav')

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
                    <td>{{ $course->courseName }}</td>

                    <td>Year: {{ $course->courseYear }}</td>
                </tr>
                @endforeach
            @else
            <p> empty course </p>
            
            @endif

            @if( ! empty($modules))
                @foreach($modules as $module)
                <tr>
                    <td>{{ $module->moduleName }}</td>

                    <td>Module Code: {{ $module->moduleCode}}</td>
                </tr>
                @endforeach
            @else
            <p> empty module </p>
             @endif

            @if( ! empty($subjects))
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->subjectTitle }}</td>

                    <td>{{ $subject->subjectType }}</td>
                </tr>
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
