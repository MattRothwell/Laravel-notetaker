@extends('layouts.nav')
@section('title', 'Tasks')
@section('content')

<h2>Tasks</h2>

<p>add image</p>

{!! Form::open(array('route' => 'tasks.store', 'data-parsley-validate' => '', 'files' => true)) !!}
{{ Form::label('featured_image', 'upload image') }}
{{ Form::file('featured_image') }}

{!! Form::close() !!}

@endsection