{{ Form::open(array('url'=>'users/login', 'class'=>'form-signin')) }}
	<h2 class="form-signin-heading">Please Login</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

	{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
	{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
    {{ Form::checkbox('rememberme', 'Remember me.', false)}}
    {{ Form::label('rememberme', 'Remember me') }}

	{{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
{{ Form::close() }}
