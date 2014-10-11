
@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Register</title>
@stop


@section('main')
<div class="row-fluid">
	<div class="span9">
		<div id="step1Form" class="panel panel-success" style="min-height:100px;">
			<div class="panel-heading">
				<h3 class="panel-title">
					Register</h3>
				</div> 
				 {{Former::open()->method('POST')->class('form-horizontal')->url('users/register')}}          
				<!-- Form Name -->
				<legend></legend>
            
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

				{{Former::text('email')->placeholder('Email')->class('input-xlarge inputHeight form-control')->required()}} 
						<!-- {{ Form::text('email', null, array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Email Address')) }} -->
				{{Former::password('password')->placeholder('Password')->class('input-xlarge inputHeight form-control')->required()}}
						<!-- {{ Form::password('password', array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Password')) }} -->
				{{ Former::password('password_confirmation','Confirm Password')->class('input-xlarge inputHeight form-control')->placeholder('Confirm Password')->required() }}

				{{ Former::text('first_name','first name')->class('input-large inputHeight form-control')->placeholder('First Name')->required() }}

				{{ Former::text('last_name','last name')->class('input-large inputHeight form-control')->placeholder('Last Name')->required() }}



				{{ Former::inline_radios('identity')->radios(array('Individual' =>array( 'name'=>'identity','checked'=>'checked'), 'Company' => array('name'=>'identity', 'checked'=>'')))->onchange('change()') }}

                <div id='company_part' style="display:none;">

				{{ Former::text('companyname','company name')->class('input-xlarge inputHeight form-control')->placeholder('Company Name')->required()}}
		
                {{ Former::text('acn')->label('ACN')->class('input-medium inputHeight form-control')->placeholder('ACN')->required()}}
                </div>
                <div id='individual_part'>
                    {{ Former::text('abn')->label('ABN')->class('input-medium inputHeight form-control')->placeholder('ABN')->required()}}
                </div>

                {{ Former::select('type')->class('input-large inputHeight form-control')->placeholder('Service Type')->options($services) }}

                {{ Former::text('unit')->class('input-xxlarge inputHeight form-control')->placeholder('unit')->required() }}

				{{ Former::text('street_number')->class('input-xxlarge inputHeight form-control')->placeholder('Street Number')->required() }}


				{{ Former::text('street_name')->class('input-xxlarge inputHeight form-control')->placeholder('Street Name')->required() }}


				{{ Former::text('street_type')->class('input-xxlarge inputHeight form-control')->placeholder('Street Type')->required() }}


                {{ Former::text('suburb')->class('input-xxlarge inputHeight form-control')->placeholder('Suburb')->required() }}


				{{ Former::text('state')->class('input-xxlarge inputHeight form-control')->placeholder('State')->required() }}


				{{ Former::text('postcode')->class('input-xxlarge inputHeight form-control')->placeholder('Postcode')->required() }}

				{{ Former::number('phone')->class('input-medium inputHeight form-control')->placeholder('Phone Number')->required() }}

				{{ Former::number('mobile')->class('input-medium inputHeight form-control')->placeholder('Mobile') }}

				{{ Former::inline_radios('mode')->radios(array('hourly' =>array( 'name'=>'mode','checked'=>'checked'), 'session' => array('name'=>'mode', 'checked'=>''))) }}
				<!-- Multiple Radios -->
				
				<div class="control-group controls">
					{{ Form::submit('Register', array('class'=>'btn btn-success'))}}
				</div>
				{{ Former::close()}}

			</div>

			</div>
		</div>
		<script type="text/javascript">
		function change() {
			var radio = document.getElementsByName("identity");
			if(radio[0].checked) {
				document.getElementById('company_part').style.display = 'none';
                document.getElementById('individual_part').style.display = '';
			}
			else if(radio[1].checked) {
				document.getElementById('company_part').style.display = '';
                document.getElementById('individual_part').style.display = 'none';

			}
		}

		</script>

@stop

