
<h2 class="form-signup-heading">Brief details</h2>
  <p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
  <ul>
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
		@endforeach
  </ul>
{{ Former::horizontal_open()
  ->id('accommodationForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST')->url('services/accommodation')->class('');
}}
{{ Former::radio('title')
    ->radios(array('Mr' => 'title', 'Ms' => 'title', 'Mrs' => 'title', 'Miss' => 'title'))
    ->inline();
}}
{{ Former::text('first name')
	->class('form-control input-xlarge')
    ->placeholder('First Name');
}}
{{ Former::text('last name')
	->class('form-control input-xlarge')
    ->placeholder('Last Name');
}}
{{ Former::number('Age (yrs)')
	->class('form-control input-small')
    ->placeholder('25')
    ->min(1)
    ->max(200);
}}
{{ Former::radio('gender')
    ->radios(array('Male' => 'gender', 'Female' => 'gender'))
    ->inline()
    ->required();
}}
{{ Former::text('Address Line 1')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 1');
}}
{{ Former::text('Address Line 2')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 2');
}}
{{ Former::text('Suburb')
	->class('form-control input-large')
	->placeholder('Suburb');
}}
{{ Former::number('postcode')
	->class('form-control input-small')
    ->placeholder('3000')
    ->min('0200')
    ->max('9944')
    ->required();
}}
{{ Former::select('State')
	->options(array(''=>'Select a state','ACT'=> 'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA'))
	->required(); 
}}
{{ Former::text('Country')
	->class('form-control input-large')
	->value('Australia')
	->readonly();
}}
{{ Former::number('How many people need accommodation? (Includes any children living with you)')
    ->class('form-control input-small')
    ->placeholder('4')
    ->required();
}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}
