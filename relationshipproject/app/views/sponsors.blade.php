@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Sponsors</title>
@stop
<!-- <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" media="screen"
            href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">
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
{{ HTML::style('css/plugins/bootstrap-datetimepicker.min.css') }}

<div class="container auth">
    <h3 class="text-center"><span>Sponsor us</span> </h3>
    <div id="big-form" class="well auth-box">
      {{Former::framework('Nude');}}
      {{Former::open()->method('POST')->url('')->class('')}}
          <!-- Form Name -->
          <legend class="text-center" style="border-bottom:solid 1px;">Personal Details</legend>

          
          <div class="form-group">
            <label class=" control-label" for="">Title*</label>
            {{Former::select('title')->class('input-large input-md form-control')->required()->options(array(
    1  => 'Ms.',
    2  => 'Miss',
    3 => 'Mr.',
    4 => 'Mrs.'
));}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">First Name*</label>
            {{Former::text('firstname')->placeholder('First Name')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Last Name*</label>
            {{Former::text('lastname')->placeholder('Last Name')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Date of birth</label>
            <div id="datetimepicker" class="input-append date datepicker">
                    {{ Former::text('date')
                    ->label('Date')
                    ->placeholder(' yyyy-mm-dd')
                    ->class('form-control input-medium') }}
                </div>
          </div>

          <legend class="text-center" style="border-bottom:solid 1px;">Contact Details</legend>

          <div class="form-group">
            <label class=" control-label" for="">Email Address*</label>
            {{Former::text('email')->placeholder('Email')->class('input-xlarge input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Country*</label>
            {{Former::text('country')->placeholder('Country')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Address*</label>
            {{Former::text('address_home')->placeholder('Home...')->class('input-xxlarge input-md form-control')->required()}}
            {{Former::text('address_work')->placeholder('Work...')->class('input-xxlarge input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Suburb*</label>
            {{Former::text('suburb')->placeholder('Suburb')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Postcode*</label>
            {{Former::number('postcode')->placeholder('3000')->class('input-medium input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Phone Number*</label>
            {{Former::number('phonenumber')->placeholder('Home or Work')->class('input-large input-md form-control')->required()}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Mobile</label>
            {{Former::number('mobile')->placeholder('04...')->class('input-large input-md form-control')}}
          </div>

          <div class="form-group">
            <label class=" control-label" for="">Date of Contact*</label>
            <div id="datepicker" class="input-append date timepicker">
                    {{ Former::text('birthday')
                    ->label('birthday')
                    ->placeholder(' yyyy-mm-dd')
                    ->class('form-control input-large') }}
                </div>
          </div>

          <div class="form-group">
            <label class=" control-label" for="radios">Select - a time slot*</label>
            <div class='radio'>
            {{ Former::radios('')->radios(array('9am to 1pm' =>array( 'name'=>'contact_time','checked'=>'checked')))}}
            </div>
            <div class='radio'>
            {{ Former::radios('')->radios(array('1pm to 5pm' =>array( 'name'=>'contact_time','checked'=>'')))}}
            </div>
            <div class='radio'>
            {{ Former::radios('')->radios(array( 'Others(choose a suitable time)' => array('name'=>'contact_time', 'checked'=>'')))}}
            <div id="start_timepicker" class="input-append date timepicker">
                    {{ Former::text('start_time')
                    ->label('Start Time')
                    ->placeholder(' hh:mm')
                    ->class('form-control input-medium') }}
                </div>
               <span>to<span>
                <div id="end_timepicker" class="input-append date timepicker">
                    {{ Former::text('end_time')
                    ->label('End Time')
                    ->placeholder(' hh:mm')
                    ->class('form-control input-medium') }}
                </div>
            </div>
            

          <div class="form-group controls">
          {{ Form::submit('Sponsor us', array('class'=>'btn btn-success'))}}
        </div>
        {{ Former::close()}}
    </div>
    <div class="clearfix"></div>
  </div>
  {{ HTML::script('js/plugins/dataTables/jquery.js') }}
<!-- {{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.min.js') }} -->
<script type="text/javascript"
        src="http://eonasdan.github.io/bootstrap-datetimepicker/scripts/bootstrap.min.js">
</script>
<script type="text/javascript" src="http://eonasdan.github.io/bootstrap-datetimepicker/scripts/moment.js">
</script>
<script type="text/javascript"
        src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js">
</script>
<script type="text/javascript">
$('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            pickTime: false,
            pickDate: true,
            language: 'en'
    });
$('.timepicker').datetimepicker({
            format: 'HH:mm',
            pickTime: true,
            pickDate: false,
            pickSeconds: false,
            language: 'en'
    });

</script>