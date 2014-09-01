{{ Form::open(array('url'=>'emails/send', 'class'=>'form-email')) }}
	<h2 class="email-heading">Email</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

    {{ Form::text('text', null, array('class'=>'input-block-level', 'placeholder'=>'Email Message')) }}
	{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}

	{{ Form::submit('Send', array('class'=>'btn btn-large btn-primary')) }}
{{ Form::close() }}
