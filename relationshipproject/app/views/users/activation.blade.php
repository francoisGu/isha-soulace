{{ Form::open(array('url'=>'users/activate', 'class'=>'form-activate')) }}
	<h2 class="form-activate-heading">Please Activate</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

	{{ Form::text('activationCode', null, array('class'=>'input-block-level','placeholder'=>'Your activation code')) }}

	{{ Form::submit('Activate', array('class'=>'btn btn-primary'))}}
{{ Form::close() }}
