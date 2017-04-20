
<?php 
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();
        $userId = $user->id;
        $courses = DB::table('courses')->where('userID', $userId)->get();
?>

@extends('layouts.app')
<head>
<title>@yield('title')</title>
</head>
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="tabs-left">
                <ul class="nav nav-pills nav-stacked">
                @foreach ($courses as $course)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $course->courseName; ?><span class="glyphicon glyphicon-folder-open"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <?php
                            $modules = DB::table('modules')->where('courseID', $course->id)->get();
                            foreach ($modules as $module)
                            {
                        ?>
                            <li><a href="{{ url('course/'.$course->courseName.'/module/'.$module->moduleName.'') }}"><span class="glyphicon glyphicon-list-alt"></span><?php echo " ".$module->moduleCode." | ". $module->moduleName; ?></a></li>
                        <?php
                            }
                        ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('course/'.$course->courseName.'/module/create') }}"><span class="glyphicon glyphicon-plus-sign"></span>New Module</a></li>
                        </ul>
                    </li>
                @endforeach
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('/course/create') }}"><span class="glyphicon glyphicon-plus-sign"></span>New Course</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>
    </div>  
</div>
@endsection
    