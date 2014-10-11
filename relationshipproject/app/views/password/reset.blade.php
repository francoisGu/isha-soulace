{{ Form::open(array('url'=>'password/reset', 'class'=>'form-passwordreset')) }}
	<h2 class="form-passwordreset-heading">Reset your password</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

    {{ Form::text('resetcode', null, array('class'=>'input-block-level', 'placeholder'=>'Reset Password Code')) }}
    {{ Form::password('password', array('class'=>'input-block-level',
    'placeholder'=>'New password')) }}

	{{ Form::submit('Reset password', array('class'=>'btn btn-large btn-primary'))}}
{{ Form::close() }}
