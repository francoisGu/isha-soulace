@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Register</title>
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

            {{Former::open()->method('POST')->class('form-horizontal')->url('users/register')}}          
            <!-- Form Name -->
            <legend  class="text-center" style="border-bottom:solid 1px;">Register</legend>

            <ul>
                @foreach($errors->all() as $error)
                <li style="color:red; margin-left: 50px;">{{ $error }}</li>
                @endforeach
            </ul>

            <!--
            @if(Session::has('message'))
            <p style="color:red; margin-left: 50px;">{{ Session::get('message') }}</p>
                @endif
                -->

{{Former::email('email')->placeholder('Email')->class('input-xlarge inputHeight form-control')->required()}} 
<!-- {{ Form::text('email', null, array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Email Address')) }} -->
{{Former::password('password')->placeholder('Password')->class('input-xlarge inputHeight form-control')->required()}}
<!-- {{ Form::password('password', array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Password')) }} -->
{{ Former::password('password_confirmation','Confirm Password')->class('input-xlarge inputHeight form-control')->placeholder('Confirm Password')->required() }}


{{ Former::text('first_name','First Name')->class('input-large inputHeight form-control')->placeholder('First Name')->required() }}

{{ Former::text('last_name','Last Name')->class('input-large inputHeight form-control')->placeholder('Last Name')->required() }}


{{ Former::inline_radios('identity')->radios(array('Individual' =>array( 'name'=>'identity','checked'=>'checked'), 'Company' => array('name'=>'identity', 'checked'=>'')))->onchange('change()') }}

<div id='company_part' style="display:none;">
    {{ Former::text('companyName')->id('companyName')->label('Company Name')->class('input-xlarge inputHeight form-control company')->placeholder('Company Name')->required()}}

    {{ Former::text('acn')->label('ACN')->class('input-medium inputHeight form-control company')->placeholder('ACN')->required()}}
</div>
<div id='individual_part'>
    {{ Former::text('abn')->label('ABN')->class('input-medium inputHeight form-control individual')->placeholder('ABN')->required()}}
</div>

{{ Former::select('type')->class('input-large inputHeight form-control')->placeholder('Service Type')->options($services)->required() }}

{{ Former::text('unit')->class('input-xlarge inputHeight form-control')->placeholder('unit') }}

{{ Former::text('street_number')->class('input-xlarge inputHeight form-control')->placeholder('Street Number')->required() }}


{{ Former::text('street_name')->class('input-xlarge inputHeight form-control')->placeholder('Street Name')->required() }}


{{ Former::text('street_type')->class('input-xlarge inputHeight form-control')->placeholder('Street Type')->required() }}


{{ Former::text('suburb')->class('input-xlarge inputHeight form-control')->placeholder('Suburb')->required() }}


{{ Former::text('state')->class('input-xlarge inputHeight form-control')->placeholder('State')->required() }}


{{ Former::text('postcode')->class('input-xlarge inputHeight form-control')->placeholder('Postcode')->required() }}


{{ Former::number('phone')->class('input-medium inputHeight form-control')->placeholder('Phone Number')->required() }}

{{ Former::number('mobile')->class('input-medium inputHeight form-control')->placeholder('Mobile') }}

{{ Former::inline_radios('mode')->radios(array('hourly' =>array( 'name'=>'mode','checked'=>'checked'), 'session' => array('name'=>'mode', 'checked'=>'')))->required() }}

{{ Former::number('price')->class('input-medium inputHeight form-control')->placeholder('AU$ 0')->min(0)->required() }}

{{ Former::checkbox('negotiable', 'Negotiable?') }}

<!-- Multiple Radios -->

<div class="control-group controls">
    {{ Form::submit('Register', array('class'=>'btn btn-danger btn-outline'))}}
</div>
{{ Former::close()}}

            </div>

    </div>



<script type="text/javascript"
        src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script> 

<script type="text/javascript">
    function change() {
        var radio = document.getElementsByName("identity");

        if(radio[0].checked) {

            $('#company_part').empty();
            $('#individual_part').empty();
            $('#individual_part').append('<div class="control-group required"><label for="abn" class="control-label">ABN<sup>*</sup></label><div class="controls"><input class="input-medium inputHeight form-control individual" placeholder="ABN" required="true" id="abn" type="text" name="abn"></div></div>');

            document.getElementById('company_part').style.display = 'none';
            document.getElementById('individual_part').style.display = '';
        }
        else if(radio[1].checked) {

            $('#individual_part').empty();
            $('#company_part').empty();
            $('#company_part').append('<div class="control-group required"><label for="companyName" class="control-label">Company Name<sup>*</sup></label><div class="controls"><input class="input-xlarge inputHeight form-control company" placeholder="Company Name" required="true" id="companyName" type="text" name="companyName"></div></div><div class="control-group required"><label for="acn" class="control-label">ACN<sup>*</sup></label><div class="controls"><input class="input-medium inputHeight form-control company" placeholder="ACN" required="true" id="acn" type="text" name="acn"></div></div></div>');



            document.getElementById('company_part').style.display = '';
            document.getElementById('individual_part').style.display = 'none';

        }
    }

    $(document).ready(change());

</script>


@stop
