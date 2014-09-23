{{ Form::open(array('url'=>'', 'class'=>'form-payment')) }}
	<h2 class="form-payment-heading">Please pay</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
    {{ Form::submit('Pay', array('class'=>'btn btn-primary'))}}
{{ Form::close() }}
