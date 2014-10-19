<div class='text-center'>
<h3 class="form-signup-heading">Brief details</h3>
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
  ->id('accommodationForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST');
}}
{{ Former::radio('title', 'Title')
    ->radios(array('Mr' => 'title', 'Ms' => 'title', 'Mrs' => 'title', 'Miss' => 'title'))
    ->inline();
}}
 <input name="type" type='hidden' value='accommodation'/>
{{ Former::text('first_name', 'first name')
	->class('form-control input-xlarge')
	->maxlength('30')
    ->placeholder('First Name');
}}
{{ Former::text('last_name', 'Last name')
	->class('form-control input-xlarge')
	->maxlength('30')
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
	->maxlength('30')
	->placeholder('Address Line 1');
}}
{{ Former::text('address_line_2', 'Address Line 2')
	->class('form-control input-xxlarge')
	->maxlength('30')
	->placeholder('Address Line 2');
}}
{{ Former::text('suburb', 'Suburb')
	->class('form-control input-large')
	->maxlength('30')
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
{{ Former::number('number_of_people', 'How many people need accommodation? (Includes any children living with you)')
    ->class('form-control input-small')
    ->placeholder('4')
    ->min('0')
    ->max('50')
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
  ->maxlength('254')
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

    <div id="datetimepicker" class=" date timepicker">
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
    <div id="start_timepicker" class="date timepicker">
	{{ Former::text('start_time')
      ->label('Start Time')
      ->placeholder(' hh:mm')
      ->class('form-control input-medium'); 
	}}
    </div>
<!--     <span>to<span> -->
    <div id="end_timepicker" class=" date timepicker">
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
