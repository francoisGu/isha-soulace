<div class="container auth">
    <h1 class="text-center">Offer your donations here!<span>Thank you for your support!</span> </h1>
    <div id="big-form" class="well auth-box">
      {{Former::framework('Nude');}}
      {{Former::open()->method('POST')->url('')->class('')}}
          <!-- Form Name -->
          <legend class="text-center" style="border-bottom:solid 1px;">Donation Details</legend>
          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="radios">Donation Amount</label>
            <div class='radio'>
            {{ Former::radios('')->radios(array('AUD$100' =>array( 'name'=>'amount','checked'=>'checked')))}}
            </div>
            <div class='radio'>
            {{ Former::radios('')->radios(array( 'AUD$250' => array('name'=>'amount', 'checked'=>'')))}}
            </div>
        </div>
          <legend class="text-center" style="border-bottom:solid 1px;">Personal Details</legend>

          <div class="form-group">
            <label class=" control-label" for="">Email Address*</label>
            {{Former::text('email')->placeholder('Email')->class('input-xlarge input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">First Name*</label>
            {{Former::text('firstname')->placeholder('First Name')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Last Name*</label>
            {{Former::text('lastname')->placeholder('Last Name')->class('input-large input-md form-control')->required()}}
          </div>

          <legend class="text-center" style="border-bottom:solid 1px;">Contact Details</legend>

          <div class="form-group">
            <label class=" control-label" for="">Country*</label>
            {{Former::text('country')->placeholder('Country')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Address*</label>
            {{Former::text('address')->placeholder('Home or Work...')->class('input-xxlarge input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Postcode*</label>
            {{Former::number('postcode')->placeholder('3000')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Phone Number*</label>
            {{Former::number('phonenumber')->placeholder('Home or Work')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Mobile</label>
            {{Former::number('mobile')->placeholder('04...')->class('input-large input-md form-control')}}
          </div>

          <div class="form-group controls">
          {{ Form::submit('Use paypal to Donate', array('class'=>'btn btn-success'))}}
        </div>
        {{ Former::close()}}
    </div>
    <div class="clearfix"></div>
  </div>