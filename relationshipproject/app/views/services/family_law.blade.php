<!-- {{ Form::open(array('url' => 'services/familylaw')) }} -->
	<h2 class="form-signup-heading">Brief details</h2>
	<p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
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
<!--        <div class="control-group">
          <label class="control-label" for="radios">Identity</label>
          <div class="controls">
            <label class="radio inline" for="radios-0">
              {{ Form::radio('identity', null, array('checked'=>'checked', 'value'=>'Individual')) }}
              Individual
            </label>
            <label class="radio inline" for="radios-1">
              {{ Form::radio('identity', null, array('value'=>'Company')) }}
              Company
            </label>
          </div>
        </div> -->
{{ Former::radio('gender')
    ->radios(array('M' => 'gender', 'F' => 'gender'))
    ->inline()
    ->required();
}}
{{ Former::number('postcode')
    ->placeholder('3000')
    ->required();
}}
{{ Former::radio('Type of service')
    ->radios(array('Separation & Divorce' => 'service', 'Pre-nuptial agreement' => 'service'))
    ->inline()
    ->required();
}}
{{ Former::radio('Are you in a same-sex relationship?')
    ->radios(array('Yes' => 'same-sex', 'No' => 'same-sex'))
    ->inline()
    ->required();
}}
{{ Former::radio('Relationship status')
    ->radios(array('Married' => 'status', 'De facto' => 'status'))
    ->inline()
    ->required();
}}
{{ Former::radio('Are you employed?')
    ->radios(array('Yes' => 'employed', 'No' => 'employed'))
    ->inline();
}}
{{ Former::radio('What is your residency status?')
    ->radios(array('Student Visa' => 'residency-status', '457 Visa' => 'residency-status', 'Permanent Resident' => 'residency-status', 'Citizen' => 'residency-status'))
    ->inline();
}}
{{ Former::radio('Do you have any jointly owned property with your partner?')
    ->radios(array('Yes' => 'property', 'No' => 'property'))
    ->inline();
}}
{{ Former::radio('Do you have any liabilities? e.g. Mortage loan, financial debt, car loan')
    ->radios(array('Yes' => 'liability', 'No' => 'liability'))
    ->inline();
}}
{{ Former::radio('Do you have superannuation?')
    ->radios(array('Yes' => 'superannuation', 'No' => 'superannuation'))
    ->inline();
}}
{{ Former::radio('Do you have a will?')
    ->radios(array('Yes' => 'will', 'No' => 'will'))
    ->inline();
}}
{{ Former::radio('Do you have children?')
    ->radios(array('Yes' => 'children', 'No' => 'children'))
    ->inline();
}}
{{ Former::textarea('State of health')

}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}
