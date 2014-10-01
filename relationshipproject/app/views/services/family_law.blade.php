
<h2 class="form-signup-heading">Brief details</h2>
  <p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
  <ul>
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
		@endforeach
  </ul>
{{ Former::open()
  ->id('familyLawForm')
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
{{ Former::select('State')->options(array(''=>'Select a state','ACT'=> 'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA')); }}
{{ Former::text('Country')
	->class('form-control input-large')
	->value('Australia')
	->readonly();
}}
{{ Former::radio('Type of service')
    ->radios(array('Separation & Divorce' => 'service', 'Pre-nuptial agreement' => 'service'))
    ->inline()
    ->required();
}}
{{ Former::radio('same-sex', 'Are you in a same-sex relationship?')
    ->radios(array('Yes' => 'same-sex', 'No' => 'same-sex'))
    ->inline()
    ->required();
}}
{{ Former::radio('Relationship status')
    ->radios(array('Married' => 'status', 'De facto' => 'status', 'Separated' => 'status'))
    ->inline()
    ->required();
}}
{{ Former::radio('Are you employed?')
    ->radios(array('Yes' => 'employed', 'No' => 'employed'))
    ->inline()
    ->required();
}}
{{ Former::radio('What is your residency status?')
    ->radios(array('Student Visa' => 'residency-status', '457 Visa' => 'residency-status', 'Permanent Resident' => 'residency-status', 'Citizen' => 'residency-status'))
    ->inline()
    ->required();
}}
{{ Former::radio('Do you own property?')
    ->radios(array('Yes' => 'property', 'No' => 'property'))
    ->inline()
    ->required();
}}
{{ Former::radio('Do you have any liabilities? e.g. Mortage loan, financial debt, car loan')
    ->radios(array('Yes' => 'liability', 'No' => 'liability'))
    ->inline()
    ->required();
}}
{{ Former::radio('Do you have superannuation?')
    ->radios(array('Yes' => 'superannuation', 'No' => 'superannuation'))
    ->inline()
    ->required();
}}
{{ Former::radio('Do you have a will?')
    ->radios(array('Yes' => 'will', 'No' => 'will'))
    ->inline()
    ->required();
}}
{{ Former::radio('Do you have children?')
    ->radios(array('Yes' => 'children', 'No' => 'children'))
    ->inline()
    ->required();
}}
{{ Former::textarea('Health Status')
	->class('form-control')
	->maxlength('2500')
	->placeholder('Please describe your current state of health')
	->required();
}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}
