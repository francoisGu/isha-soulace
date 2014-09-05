{{ Form::open(array('url'=>'password/remind', 'class'=>'form-passwordremind')) }}
	<h2 class="form-passwordremind-heading">Forget your password?</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

	{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}

    {{ Form::submit('Send Reminder', array('class'=>'btn btn-large btn-primary'))}}
{{ Form::close() }}
