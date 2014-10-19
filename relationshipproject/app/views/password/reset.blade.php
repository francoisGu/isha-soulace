@extends('layouts.main')

@section('main')
<div class="row-fluid" style="display: block; align-content: center">
    <div class="span6" style="margin-left: 10px;min-height:200px; padding:10px;align-self: center">
        <div id="step1Form" class="panel panel-success" >
            <div class="panel-heading">
                <h3 class="form-passwordremind-heading panel-title">
                    Reset password</h3>
            </div>


            {{ Form::open(array('url'=>'password/reset', 'class'=>'form-passwordreset')) }}
            <h2 class="form-passwordreset-heading">Reset your password</h2>

            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

            {{ Form::hidden('email', Input::get('email') ) }}
            {{ Form::hidden('resetPasswordCode', Input::get('resetPasswordCode') ) }}

            {{ Form::password('password', array('class'=>'input-large form-control',
            'placeholder'=>'New password')) }}

            <br/>

            {{ Form::password('password_confirmation', array('class'=>'input-large form-control',
            'placeholder'=>'Confirm new password')) }}

            <br/>


            {{ Form::submit('Reset password', array('class'=>'btn btn-danger btn-outline'))}}
            {{ Form::close() }}


        </div>
    </div><!--span12-->
</div>



@stop
