
<div class="row-fluid">
	<div class="span9">
		<div id="step1Form" class="panel panel-success" style="min-height:100px;">
			<div class="panel-heading">
				<h3 class="panel-title">
					Register</h3>
				</div> 
				<!-- {{Former::horizontal_open()->id('MyForm')->secure()->rules(['name' => 'required'])->method('GET'); -->                 
				{{ Form::open(array('url'=>'users/register', 'class'=>'form-horizontal')) }}
				<!-- Form Name -->
				<legend></legend>
				@if(Session::has('message'))
                <p style="color:red; margin-left: 50px;">{{ Session::get('message') }}</p>
                @endif
				<div class="control-group">
					<label class="control-label" for="email">Email Address</label>
					<div class="controls">
						{{ Form::text('email', null, array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Email Address')) }}
					<a style="color:red;"></a>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						{{ Form::password('password', array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Password')) }}
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password_confirmation">Confirm Password</label>
					<div class="controls">
						{{ Form::password('password_confirmation', array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Confirm Password')) }}
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="firstname">First Name</label>
					<div class="controls">
						{{ Form::text('firstname', null, array('class'=>'input-large inputHeight form-control', 'placeholder'=>'First Name')) }}
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="lastname">Last Name</label>
					<div class="controls">
						{{ Form::text('lastname', null, array('class'=>'input-large inputHeight form-control', 'placeholder'=>'Last Name')) }}
					</div>
				</div>
				<!-- Multiple Radios -->
				<div class="control-group">
					<label class="control-label" for="radios">Identity</label>
					<div class="controls">
						<label class="radio inline" for="radios-0">
							{{ Form::radio('identity', null, array('checked'=>'checked', 'value'=>'Individual')) }}
							Individual
						</label>
						<label class="radio inline" for="radios-1">
							{{ Form::radio('identity', null, array('value'=>'Company')) }}
							Company
						</label>
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="companyName">Company Name</label>
					<div class="controls">
						{{ Form::text('companyname', null, array('class'=>'input-xlarge inputHeight form-control', 'placeholder'=>'Company Name')) }}
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="ACN">ACN</label>
					<div class="controls">
						{{ Form::text('acn', null, array('class'=>'input-medium inputHeight form-control', 'placeholder'=>'ACN')) }}
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="ABN">ABN</label>
					<div class="controls">
						{{ Form::text('abn', null, array('class'=>'input-medium inputHeight form-control', 'placeholder'=>'ABN')) }}
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="address">Address</label>
					<div class="controls">
						{{ Form::text('address', null, array('class'=>'input-xxlarge inputHeight form-control', 'placeholder'=>'Address')) }}
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="phone">Phone Number</label>
					<div class="controls">
						{{ Form::text('phone', null, array('class'=>'input-medium inputHeight form-control', 'placeholder'=>'Phone Number')) }}
					</div>
				</div>
				<!-- Appended Input-->
				<div class="control-group">
					<label class="control-label" for="mobile">Mobile Phone</label>
					<div class="controls">
						<div class="input-append">
							{{ Form::text('mobile', null, array('class'=>'input-medium inputHeight form-control', 'placeholder'=>'Mobile')) }}
						</div>
						<!-- <span class="add-on" style="margin-left:-7px;">Opt.</span> -->
					</div>
				</div>
				<!-- Multiple Radios -->
				<div class="control-group">
					<label class="control-label" for="modeRadio">Mode</label>
					<div class="controls">
						<label class="radio inline" for="modeRadio-0">
							{{ Form::radio('mode', null, array('checked'=>'checked', 'value'=>'Hourly')) }}
							Hourly
						</label>
						<label class="radio inline" for="modeRadio-1">
							{{ Form::radio('mode', null, array('checked'=>'', 'value'=>'Session')) }}
							Session
						</label>
					</div>
				</div>
				
				<div class="control-group controls">
					{{ Form::submit('Register', array('class'=>'btn btn-success'))}}
				</div>
				{{ Form::close() }}

                <ul>
					@foreach($errors->all() as $error)
					<li style="color:red;">{{ $error }}</li>
					@endforeach
				</ul>
			</div>

			</div>
		</div>
