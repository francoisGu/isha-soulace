
@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Login</title>
@stop


@section('main')
<style type="text/css">
.auth .auth-box{
  background-color: white;
  max-width:660px;
  margin:0 auto;
  border:1px solid rgba(255, 255, 255, 0.4);;
  margin-top:40px;
  -webkit-box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  -moz-box-shadow:    0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  box-shadow:         0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
</style>
  <div class="auth">
      <div id="step1Form" class="well auth-box" style="min-height:200px;">
          {{Former::open()->method('POST')->class('form-horizontal')->url('users/login')}} 
          <!-- Form Name -->
          <legend class="text-center" style="border-bottom:solid 1px;">Log in</legend>
          <!-- Text input-->
           @if(Session::has('message'))
          <p style="color:red; margin-left: 100px;">{{ Session::get('message') }}</p>
          @endif

            @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li style="color:red" class="error">:message</li>')) }}
            </ul>
            @endif


          {{Former::email('email')->placeholder('Email')->class('input-xlarge inputHeight form-control')->required()}} 
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
              {{ Form::submit('Login', array('class'=>'btn btn-danger btn-outline'))}}
            </div>
          </div>
          {{ Former::close()}}

      </div>
  </div>

@stop
