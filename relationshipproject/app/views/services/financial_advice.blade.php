
<h2 class="form-signup-heading">Brief details</h2>
  <p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
  <ul>
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
		@endforeach
  </ul>
{{ Former::horizontal_open()
  ->id('financialAdviceForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('GET');
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
{{ Former::text('Country')
	->class('form-control input-large')
	->placeholder('Country');
}}
{{ Former::number('Number of dependants (Includes children from current and previous relationships and any other family members e.g. partner/spouse/grandparents/parents)')
	->class('form-control input-small')
	->placeholder('4')
	->min(0)
	->required();
}}
{{ Former::number('Approximate Personal Income')
	->class('form-control input-small')
	->min(0)
	->required();
}}
{{ Former::number('Approximate Family Income')
	->class('form-control input-small')
	->min(0)
	->required();
}}
{{ Former::number('Approximate day-to-day expenses')
	->class('form-control input-small')
	->min(0)
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
{{ Former::checkbox('Do you have any insurance?')
    ->checkboxes(array('Medical' => 'insurance', 'Total and Permanent Disability' => 'insurance', 'Income Protecttion' => 'insurance', 'Life insurance' => 'insurance'))
    ->inline();
}}
{{ Former::checkbox('Do you have any investments?')
    ->checkboxes(array('Propert' => 'investments', 'Shares' => 'investments', 'Cash Investments' => 'investments'))
    ->inline();
}}
{{ Former::textarea('State of health - Do you have any existing injury?')
	->class('form-control')
	->required();
}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}
