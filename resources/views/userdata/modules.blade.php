@extends('layouts.nav')
@section('title', $modules->moduleName)
@section('content')

<h2>{{ $modules->moduleName }}</h2>
	 <div class="container">
			{!! Form::open(['url' =>  url('module', $modules->moduleName), 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			{!! Form::token() !!}
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'Subject Name: ', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
					{!! Form::text('subjectName', " ", ['class' => 'form-control'], ['placeholder' => 'Enter Subject Name Here']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-2 center-block">
				{!! Form::label('text', 'Subject Type', ['class' => 'control-label pull-right']) !!}
				</div>
				<div class="col-sm-6 center-block">
				<select class="form-control" col-form-label>
					<option value="Definition">Definition</option>
					<option value="AorD">Advantage/Disadvantage</option>
				</select>
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-8 center-block">
					{!! Form::textarea('subjectType', " ",['size' => '50x5', 'class' => 'form-control']) !!}
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="col-sm-8 center-block">
					{!! Form::submit('Submit', ['id' => 'btn-submit', 'class' => 'btn btn-info btn-lg btn-block']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
<form method="POST" action="currentmodule">

</form>
@endsection