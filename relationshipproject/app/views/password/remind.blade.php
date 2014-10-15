@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Login</title>
@stop


@section('main')

<div class="row-fluid" style="display: block; align-content: center">
    <div class="span6" style="min-height:200px; padding:10px;align-self: center">
        <div id="step1Form" class="panel panel-success" >
            <div class="panel-heading">
                <h3 class="form-passwordremind-heading panel-title">
                    Forget your password?</h3>
            </div>

            {{ Former::open()->url('password/remind')->class('form-passwordremind') }}
            <ul>
                @foreach($errors->all() as $error)
                <li style="color:red; margin-left: 100px;">{{ $error }}</li>
                @endforeach
            </ul>

              {{ Former::text('email')->class('input-xlarge inputHeight form-control')->placeholder('Email Address') }}


              {{ Former::submit('Send Reminder')->class('btn btn-success') }}

            {{ Former::close() }}


        </div>
    </div><!--span12-->
</div>


@stop
