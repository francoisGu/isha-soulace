<div class="text-center">
<h2 class="form-signup-heading">Brief details</h2>
  <p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
</div>
  
<div id="big-form" class="well auth-box">
	<ul>
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
		@endforeach
  </ul>
{{ Former::open()
  ->id('financialAdviceForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST');
}}
{{ Former::radio('title', 'Title')
    ->radios(array('Mr' => 'title', 'Ms' => 'title', 'Mrs' => 'title', 'Miss' => 'title'))
    ->inline();
}}
 <input name="type" type='hidden' value='Financial Advice'/>
{{ Former::text('first_name', 'first name')
	->class('form-control input-xlarge')
    ->placeholder('First Name');
}}
{{ Former::text('last_name', 'Last name')
	->class('form-control input-xlarge')
    ->placeholder('Last Name');
}}
{{ Former::number('age', 'Age')
	->class('form-control input-small')
	->placeholder('25')
	->min('1')
	->max('200');
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
	->options(array(''=>'Select a state','ACT'=> 'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA'))
	->required(); 
}}
{{ Former::text('country', 'Country')
	->class('form-control input-large')
	->value('Australia')
	->readonly();
}}
{{ Former::number('number_of_dependants', 'Number of dependants (Includes children from current and previous relationships and any other family members e.g. partner/spouse/grandparents/parents)')
	->class('form-control input-small')
	->placeholder('4')
	->min(0)
	->required();
}}
{{ Former::group('Approximate Personal Income (Includes superannuation)') }}
<div class="controls">
  {{ Former::select('personal_frequency')
	  ->options(array(''=>'Select a frequency','fortnightly'=>'Fortnightly','monthly'=> 'Monthly','annually'=>'Annually')) 
	  ->class('form-control input-large')
	  ->required();
  }}
  {{ Former::number('personal_income')
	->class('form-control input-medium')
	->min('0')
	->required();
  }}
</div>
{{ Former::closeGroup() }}
{{ Former::group('Approximate Family Income') }}
<div class="controls">
  {{ Former::select('family_frequency')
	  ->options(array(''=>'Select a frequency','fortnightly'=>'Fortnightly','monthly'=> 'Monthly','annually'=>'Annually')) 
	  ->class('form-control input-large')
	  ->required();
  }}
  {{ Former::number('family_income')
	->class('form-control input-medium')
	->min('0')
	->required();
  }}
</div>
{{ Former::closeGroup() }}
{{ Former::group('Approximate day-to-day expenses') }}
<div class="controls">
  {{ Former::select('day_frequency')
	  ->options(array(''=>'Select a frequency','fortnightly'=>'Fortnightly','monthly'=> 'Monthly','annually'=>'Annually')) 
	  ->class('form-control input-large')
	  ->required();
  }}
  {{ Former::number('day_expenses')
	->class('form-control input-medium')
	->min('0')
	->required();
  }}
</div>
{{ Former::closeGroup() }}
{{ Former::checkbox('liability', 'Do you have any liabilities?')
    ->checkboxes(array('Mortage Loan' => 'liability', 'Financial Debt' => 'liability', 'Car Loan' => 'liability', 'Personal Loan' => 'liability', 'Other' => 'liability'))
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
{{ Former::checkbox('insurance', 'Do you have any insurance?')
    ->checkboxes(array('Medical' => 'insurance', 'Total and Permanent Disability' => 'insurance', 'Income Protection' => 'insurance', 'Life insurance' => 'insurance'))
    ->inline();
}}
{{ Former::checkbox('investments', 'Do you have any investments?')
    ->checkboxes(array('Property' => 'investments', 'Shares' => 'investments', 'Cash Investments' => 'investments', 'Other' => 'investments'))
    ->inline();
}}
{{ Former::textarea('health', 'State of health - Do you have any existing illness/injury?')
	->class('form-control')
	->maxlength('2500')
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
<div class="form-group controls">
{{ Form::submit('Submit', array('class'=>'btn btn-danger btn-outline'))}}
</div>
{{ Former::close(); }}
</div>
