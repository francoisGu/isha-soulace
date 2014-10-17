
<h2 class="form-signup-heading">Brief details</h2>
  <p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
  <ul>
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
		@endforeach
  </ul>
<div id="big-form" class="well auth-box">
{{ Former::open()
  ->id('familyLawForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST');
}}
{{ Former::radio('title', 'Title')
    ->radios(array('Mr' => 'title', 'Ms' => 'title', 'Mrs' => 'title', 'Miss' => 'title'))
    ->inline();
}}
 <input name="type" type='hidden' value='family_law'/>
{{ Former::text('first_name', 'first name')
	->class('form-control input-xlarge')
    ->placeholder('First Name');
}}
{{ Former::text('last_name', 'Last name')
	->class('form-control input-xlarge')
    ->placeholder('Last Name');
}}
{{ Former::radio('gender', 'Gender')
    ->radios(array('Male' => 'gender', 'Female' => 'gender'))
    ->inline()
    ->required();
}}
{{ Former::text('address_line_1', 'Address Line 1')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 1');
}}
{{ Former::text('address_line_2', 'Address Line 2')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 2');
}}
{{ Former::text('suburb', 'Suburb')
	->class('form-control input-large')
	->placeholder('Suburb');
}}
{{ Former::number('postcode', 'Postcode')
	->class('form-control input-small')
    ->placeholder('3000')
    ->min('0200')
    ->max('9944')
    ->required();
}}
{{ Former::select('state', 'State')
	->class('form-control input-medium')
	->options(array(''=>'Select a state','ACT'=> 'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA')); 
}}
{{ Former::text('country', 'Country')
	->class('form-control input-large')
	->value('Australia')
	->readonly();
}}
{{ Former::radio('service_type','Type of service')
    ->radios(array('Separation & Divorce' => 'service', 'Pre-nuptial agreement' => 'service'))
    ->inline()
    ->required();
}}
{{ Former::radio('same_sex', 'Are you in a same-sex relationship?')
    ->radios(array('Yes' => 'same_sex', 'No' => 'same_sex'))
    ->inline()
    ->required();
}}
{{ Former::radio('status', 'Relationship status')
    ->radios(array('Married' => 'status', 'De facto' => 'status', 'Separated' => 'status'))
    ->inline()
    ->required();
}}
{{ Former::radio('employment', 'Are you employed?')
    ->radios(array('Yes' => 'employment', 'No' => 'employment'))
    ->inline()
    ->required();
}}
{{ Former::radio('residency_status', 'What is your residency status?')
    ->radios(array('Student Visa' => 'residency_status', '457 Visa' => 'residency_status', 'Spouse Visa' => 'residency_status', 'Permanent Resident' => 'residency_status', 'Citizen' => 'residency_status', 'Other' => 'residency_status'))
    ->inline()
    ->required();
}}
{{ Former::radio('property', 'Do you own property?')
    ->radios(array('Yes' => 'property', 'No' => 'property'))
    ->inline()
    ->required();
}}
{{ Former::checkbox('liabilities', 'Do you have any liabilities?')
    ->checkboxes(array('Mortage Loan' => 'liabilities', 'Financial Debt' => 'liabilities', 'Car Loan' => 'liabilities', 'Personal Loan' => 'liabilities', 'Other' => 'liabilities'))
    ->inline();
}}
{{ Former::radio('superannuation', 'Do you have superannuation?')
    ->radios(array('Yes' => 'superannuation', 'No' => 'superannuation'))
    ->inline()
    ->required();
}}
{{ Former::radio('will', 'Do you have a will?')
    ->radios(array('Yes' => 'will', 'No' => 'will'))
    ->inline()
    ->required();
}}
{{ Former::radio('children', 'Do you have children?')
    ->radios(array('Yes' => 'children', 'No' => 'children'))
    ->inline()
    ->required();
}}
{{ Former::textarea('health', 'Status of health - Do you have existing illness/injury?')
	->class('form-control')
	->maxlength('2500')
	->placeholder('Please describe your current state of health')
	->required();
}}
<br>
<h3>   Your Contact details</h3>
<br>
{{Former::radio('contact_mode')
  ->label('Preferred mode of contact')
  ->radios(array('Email' => 'contact_mode', 'Phone' => 'contact_mode'))
  ->inline()
  ->required();
}}
{{Former::email('email')
  ->label('Email Address')
	->class('form-control input-large')
  ->required();
}}
{{Former::number('phonenumber','Phone number')
	->placeholder('Home or Work')
	->min('10000000')
	->max('99999999')
	->class('input-large input-md form-control')
	->required();
}}
{{Former::number('mobile','Mobile number')
	->min('0100000000')
	->max('0999999999')
	->class('input-large input-md form-control');
}}
    <div id="datetimepicker" class="input-append date timepicker">
    {{Former::text('contact_date','Contact date')
	  ->class('input-large input-md form-control form_birthday')
	  ->required();
	}}
	</div>
    {{Former::radio('select_time','Select a time period')
	  ->radios(array('9am to 1pm' =>array( 'name'=>'select_time','checked'=>'checked'),
					'1pm to 5pm' =>array( 'name'=>'select_time','checked'=>''),
					'Other' => array('name'=>'select_time', 'checked'=>'')))
	  ->required();
	}}
    <div id="start_timepicker" class="input-append date timepicker">
	{{ Former::text('start_time')
      ->label('Start Time')
      ->placeholder(' hh:mm')
      ->class('form-control input-medium'); 
	}}
    </div>
    <span>to<span>
    <div id="end_timepicker" class="input-append date timepicker">
	{{ Former::text('end_time')
      ->label('End Time')
      ->placeholder(' hh:mm')
      ->class('form-control input-medium'); 
    }}
    </div>
{{ Former::actions()
  ->large_primary_submit('Submit');
}}
{{ Former::close(); }}
</div>