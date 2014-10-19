<div class="text-center">
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
{{ Former::horizontal_open()
  ->id('fitnessForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST');
}}
{{ Former::radio('title', 'Title')
    ->radios(array('Mr' => 'title', 'Ms' => 'title', 'Mrs' => 'title', 'Miss' => 'title'))
    ->inline();
}}
  <input name="type" type='hidden' value='Fitness & Nutrition'/>
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
	; 
}}
{{ Former::text('country', 'Country')
	->class('form-control input-large')
	->value('Australia')
	->readonly();
}}
{{ Former::number('weight','weight')
	->class('form-control input-small')
    ->placeholder(' kgs')
    ->min('20')
    ->max('200')
    ->required();
}}
{{ Former::radio('unit','Height Unit')
	->radios(array(' cm' => array('name' => 'unit', 'checked' => 'checked'), ' feet and inches' => array('name' => 'unit', 'checked' => '')))
	->onchange('change()')
	->inline();
}}
{{ Former::group('Height<sup>*</sup>') }}
<div class="controls">
  <div id='cm_part' style='display:'>
  {{ Former::number('cm','cm')
	->id('cm_form')
	->class('form-control input-medium')
	->min('1')
	->max('300')
	->placeholder('176 cm');
  }}
  </div>
  <div id='feet_and_inches_part' style='display:none'>
  {{ Former::number('feet','feet')
	->id('feet_form')
	->class('form-control input-medium')
	->min('1')
	->max('10')
	->placeholder('5 feet');
  }}
  {{ Former::number('inch','inch')
	->id('inch_form')
	->class('form-control input-medium')
	->min('0')
	->max('11')
	->placeholder('10 inches');
  }}
  </div>
</div>
{{ Former::closeGroup() }}
{{ Former::radio('goal','Fitness Goal')
	->radios(array('Weight loss/gain' => 'goal', 'Recovery from injury' => 'goal', 'Nutrition/Diet' => 'goal', 'Other reason' => 'goal'))
	->inline()
	->required();
}}
{{ Former::textarea('injury','Do you have any injury/illness - e.g. diabetes?')
	->class('form-control')
	->maxlength('2500')
	->required();
}}
<br>
<h3>   Your Contact details</h3>
<br>
{{Former::radio('contact_mode','contact_mode')
  ->label('Preferred mode of contact')
  ->radios(array('Email' => 'contact_mode', 'Phone' => 'contact_mode'))
  ->inline()
  ->required();
}}
{{Former::email('email','email')
  ->label('Email Address')
  ->class('form-control input-large')
  ->maxlength('254')
  ->required();
}}
{{Former::number('phonenumber','Phone number')
	->placeholder('Home or Work')
	->min('10000000')
	->max('999999999')
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
 <script>
   function change() {
 	var radio = document.getElementsByName('unit');
 	if (radio[0].checked) {
 	  document.getElementById('cm_part').style.display = '';
 	  document.getElementById('feet_and_inches_part').style.display = 'none';
 	} else if (radio[1].checked) {
 	  document.getElementById('cm_part').style.display = 'none';
 	  document.getElementById('feet_and_inches_part').style.display = '';	  
 	}
   }
 </script>
