{{ Form::open(array('url'=>'users/login', 'class'=>'form-signin')) }}
	<h2 class="form-signin-heading">Please Login</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

	{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    <br/>
	{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
    <br/>
    <a href="{{ URL::to('/password/remind/') }}">Forget password?<a/>
    <br/>
    <a href="{{ URL::to('/users/register/') }}">Sign up now!<a/>
    <br/>

    {{ Form::checkbox('rememberme', 'Remember me.', false)}}
    {{ Form::label('rememberme', 'Remember me') }}

    <br/>
	{{ Form::submit('Login', array('class'=>'btn btn-primary'))}}
{{ Form::close() }}
