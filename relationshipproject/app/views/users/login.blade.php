@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Login</title>
@stop


@section('main')

  <div class="row-fluid">
      <div class="span6" style="margin: 0px auto; min-height:200px;">
      <div id="step1Form" class="panel panel-success" >
        <div class="panel-heading">
          <h3 class="panel-title">
            Log in</h3>
          </div>
          {{Former::open()->method('POST')->class('form-horizontal')->url('users/login')}} 
          <!-- Form Name -->
          <legend></legend>
          <!-- Text input-->
           @if(Session::has('message'))
          <p style="color:red; margin-left: 100px;">{{ Session::get('message') }}</p>
          @endif

            @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li style="color:red" class="error">:message</li>')) }}
            </ul>
            @endif


          {{Former::text('email')->placeholder('Email')->class('input-xlarge inputHeight form-control')->required()}} 
            <!-- {{ Form::text('email', null, array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Email Address')) }} -->
        {{Former::password('password')->placeholder('Password')->class('input-xlarge inputHeight form-control')->required()}}
          
          <div class="control-group">
            <label class="control-label" for="checkboxes"></label>
            <div class="controls">
              <label class="checkbox inline" for="checkboxes-0">
                {{ Form::checkbox('rememberme', 'Remember me.', false)}}
                Remember me
                <br/>
    <a href="{{ URL::to('/password/remind/') }}">Forget password?<a/>
              </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="submit"></label>
            <div class="controls">
              {{ Form::submit('Login', array('class'=>'btn btn-success'))}}
            </div>
          </div>
          {{ Former::close()}}

      </div>
    </div><!--span12-->
  </div>

@stop
