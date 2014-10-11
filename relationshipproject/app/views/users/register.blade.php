
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
				@if(Session::has('message'))
                <p style="color:red; margin-left: 50px;">{{ Session::get('message') }}</p>
                @endif
				{{Former::text('email')->placeholder('Email')->class('input-xlarge inputHeight form-control')->required()}} 
						<!-- {{ Form::text('email', null, array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Email Address')) }} -->
				{{Former::password('password')->placeholder('Password')->class('input-xlarge inputHeight form-control')->required()}}
						<!-- {{ Form::password('password', array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Password')) }} -->
				{{ Former::password('password_confirmation','Confirm Password')->class('input-xlarge inputHeight form-control')->placeholder('Confirm Password')->required() }}


				{{ Former::text('firstname','first name')->class('input-large inputHeight form-control')->placeholder('First Name')->required() }}

				{{ Former::text('lastname','last name')->class('input-large inputHeight form-control')->placeholder('Last Name')->required() }}


				{{ Former::inline_radios('identity')->radios(array('Individual' =>array( 'name'=>'identity','checked'=>'checked'), 'Company' => array('name'=>'identity', 'checked'=>'')))->onchange('change()') }}

                <div id='company_part' style="display:none;">
				{{ Former::text('companyname','company name')->class('input-xlarge inputHeight form-control')->placeholder('Company Name')}}
		
				{{ Former::text('ACN')->class('input-medium inputHeight form-control')->placeholder('ACN')}}
                </div>
                <div id='individual_part'>
				{{ Former::text('ABN')->class('input-medium inputHeight form-control')->placeholder('ABN')}}
                </div>
				{{ Former::text('address')->class('input-xxlarge inputHeight form-control')->placeholder('Address')->required() }}

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
