{{ Form::open(array('url'=>'password/reset', 'class'=>'form-passwordreset')) }}
	<h2 class="form-passwordreset-heading">Reset your password</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

    {{ Form::hidden('email', Input::get('email') ) }}
    {{ Form::hidden('resetPasswordCode', Input::get('resetPasswordCode') ) }}

    {{ Form::password('password', array('class'=>'input-block-level',
    'placeholder'=>'New password')) }}

    {{ Form::password('password_confirmation', array('class'=>'input-block-level',
    'placeholder'=>'Confirm new password')) }}


	{{ Form::submit('Reset password', array('class'=>'btn btn-large btn-primary'))}}
{{ Form::close() }}
