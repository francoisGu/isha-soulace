{{ Form::open(array('url' => 'services/accommodation')) }}
<h2 class="form-signup-heading">Brief details</h2>
<p> Give some brief details about yourself so the expert can understand your situation. This saves time and cost before actual contact between yourself and the expert.</p>

<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
<div class="form-group">
    {{ Form::label('first_name', 'First Name', array('class' => 'control_label')) }}
    {{ Form::text('first_name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('last_name', 'Last Name', array('class' => 'control_label')) }}
    {{ Form::text('last_name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('date_of_birth', 'Date of Birth', array('class' => 'control_label')) }}
    {{ Form::text('date_of_birth', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email', array('class' => 'control_label')) }}
    {{ Form::email('email', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('password', 'Password', array('class' => 'control_label')) }}
    {{ Form::password('password', array('class' => 'form-control')) }}
</div>
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
