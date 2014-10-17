@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Register</title>
@stop


@section('main')
<style type="text/css">
.auth .auth-box{
  background-color: white;
  max-width:660px;
  margin:0 auto;
  border:1px solid rgba(255, 255, 255, 0.4);;
  margin-top:40px;
  -webkit-box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  -moz-box-shadow:    0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  box-shadow:         0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
</style>
<div class="container auth">
    <h3 class="text-center">Support us with donations!  <span>Thank you!</span> </h3>
    <div id="big-form" class="well auth-box">
      {{Former::framework('Nude');}}
      {{Former::open()->method('POST')->url('pay-donation-post')->class('')}}
          <!-- Form Name -->
          <legend class="text-center" style="border-bottom:solid 1px;">Donation Details</legend>
          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="radios">Donation Amount</label>
            <div class='radio'>
            {{ Former::radios('')->radios(array('AUD$100' =>array( 'name'=>'amount','checked'=>'checked', 'value'=>100)))}}
            </div>
            <div class='radio'>
            {{ Former::radios('')->radios(array( 'AUD$250' => array('name'=>'amount', 'checked'=>'', 'value'=>200)))}}
            </div>
            <div class='radio'>
            {{ Former::radios('')->radios(array( 'Other' => array('name'=>'amount', 'checked'=>'','value'=>0)))}}
            {{Former::number('other_amount')->placeholder('No less than AUD$10')->class('input-large input-md form-control')->min(10)}}
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
          {{ Form::submit('Use paypal to Donate', array('class'=>'btn btn-danger btn-outline'))}}
        </div>
        {{ Former::close()}}
    </div>
    <div class="clearfix"></div>
  </div>