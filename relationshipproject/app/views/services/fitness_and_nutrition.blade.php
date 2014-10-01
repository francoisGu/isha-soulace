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
    ->placeholder(' kgs')
    ->min('1')
    ->required();
}}
{{ Former::radio('Height Unit')
	->radios(array(' cm' => array('name' => 'unit', 'checked' => 'checked'), ' feet and inches' => array('name' => 'unit', 'checked' => '')))
	->onchange('change()')
	->inline()
	->required();
}}
{{ Former::group('Height')->required(); }}
<div class="controls">
  <div id='cm_part'>
  {{ Former::number('cm')
	->class('form-control input-medium')
	->min('1')
	->placeholder('176 cm')
	->required();
  }}
  </div>
  <div id='feet_and_inches_part' style='display:none'>
  {{ Former::number('feet')
	->class('form-control input-medium')
	->min('1')
	->placeholder('5 feet')
	->required();
  }}
  {{ Former::number('inch')
	->class('form-control input-medium')
	->min('0')
	->placeholder('20 inches')
	->required();
  }}
  </div>
</div>
{{ Former::closeGroup() }}
{{ Former::checkbox('Fitness Goal')
	->checkboxes(array('Weight loss/gain' => 'goal', 'Recovery from injury' => 'goal', 'Nutrition/Diet' => 'goal', 'Other reason' => 'goal'))
	->inline()
	->required();
}}
{{ Former::textarea('Do you have any injury/illness - e.g. diabetes?')
	->class('form-control')
	->maxlength('2500')
	->required();
}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}
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