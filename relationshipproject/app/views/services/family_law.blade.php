<!-- {{ Form::open(array('url' => 'services/familylaw')) }} -->
	<h2 class="form-signup-heading">Brief details</h2>
	<p> Give some brief details about yourself so the expert can understand your situation. This saves time and cost before actual contact between yourself and the expert.</p>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
{{ Former::horizontal_open()
  ->id('FamilyLawForm')
  ->secure()
  ->rules(['name' => 'required'])
  ->method('GET');
}}
{{ Former::text('name')
    ->placeholder('Name')
    ->required()
    ->autofocus();
}}
{{ Former::number('age')
    ->required();
}}
{{ Former::inline_checkboxes('foo')->checkboxes('foo', 'bar')
    ->required();
}}
{{ Former::number('postcode')
    ->required();
}}
{{ Former::textarea('comments')
    ->rows(10)->columns(20);
}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}
