<h2 class="form-signup-heading">Brief details</h2>
  <p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
  <ul>
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
		@endforeach
  </ul>
{{ Former::horizontal_open()
  ->id('fitnessForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST');
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
{{ Former::number('age')
	->class('form-control input-small')
    ->placeholder('25')
    ->min(1)
    ->max(300)
	->required();
}}
{{ Former::radio('gender')
    ->radios(array('M' => 'gender', 'F' => 'gender'))
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
{{ Former::select('State')->options(array(''=>'Select a state','ACT'=> 'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA')); }}
{{ Former::text('Country')
	->class('form-control input-large')
	->value('Australia')
	->readonly();
}}
{{ Former::number('weight')
	->class('form-control input-small')
    ->placeholder('kgs')
    ->required();
}}
{{ Former::group('Height (cm)') }}
<div class="controls">
  {{ Former::number('height')
	->class('form-control input-small')
	->min(1)
	->placeholder('176 cm')
	->required();
  }}
<!--  {{ Former::select('Select unit for height')
	->class('form-control input-small')
	->options(array('cm' => 'cm', 'inch' => 'ft and inches'), array('cm'));
  }}-->
</div>
{{ Former::closeGroup() }}
{{ Former::checkbox('Fitness Goal')
	->checkboxes(array('Weight loss/gain' => 'goal', 'Recovery from injury' => 'goal', 'Nutrition/Diet' => 'goal', 'Other reason' => 'goal'))
	->inline()
	->required();
}}
{{ Former::textarea('Do you have any injury/illness - e.g. diabetes?')
	->class('form-control')
	->required();
}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}
