@extends('layouts.app')
@section('title', 'Account')
@section('main')
<div class="container">
  <h1>{{ $user->username }}</h1>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="row">
    {!! Form::open(array('route' => array('user.update', $user->username), 'files' => 'true')) !!}     
    {{ csrf_field() }}
    {!! Form::token() !!}
    <input name="_method" type="hidden" value="PUT">
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>{{ $user->firstname}}'s Details</h3>      
      <div class="row">
        <div class="col-sm-2 center-block">
          {!! Form::label('text', 'Username: ', ['class' => 'control-label pull-right']) !!}
        </div>
        <div class="col-sm-4 center-block">
          {!! Form::text('username', $user->username, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
      </div>
      <div class="row">
        &nbsp;
      </div>
      <div class="row">
        <div class="col-sm-2 center-block">
          {!! Form::label('text', 'Firstname', ['class' => 'control-label pull-right']) !!}
        </div>
        <div class="col-sm-4 center-block">
          {!! Form::text('firstname', $user->firstname, ['class' => 'form-control']) !!}
        </div>
      </div>    
      <div class="row">
        &nbsp;
      </div>
      <div class="row">
        <div class="col-sm-2 center-block">
          {!! Form::label('text', 'Lastname', ['class' => 'control-label pull-right']) !!}
        </div>
        <div class="col-sm-4 center-block">
          {!! Form::text('lastname', $user->lastname, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="row">&nbsp;</div>
      <div class="row">
        <div class="col-sm-2 center-block">
          {!! Form::label('text', 'Email', ['class' => 'control-label pull-right']) !!}
        </div>
        <div class="col-sm-4 center-block">
          {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="row">
        &nbsp;
      </div>
      <div class="form-group">
        <div class="col-md-8">
          {!! Form::submit('Save Changes', ['id' => 'btn-submit', 'class' => 'btn btn-success']) !!}
          <span></span>
        </div>        
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection