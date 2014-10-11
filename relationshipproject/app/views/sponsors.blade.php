{{ HTML::style('css/plugins/bootstrap-datetimepicker.min.css') }}
<div class="container auth">
    <h1 class="text-center"><span>Sponsor us</span> </h1>
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
            {{Former::text('birthday')->placeholder('Birthday')->class('input-large input-md form-control form_birthday')}}
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
            {{Former::text('contact_date')->class('input-large input-md form-control form_birthday')->required()}}
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
            {{ Former::text('contact_start')->class('input-medium input-md form_contact_start')}}
            <span>to<span>
            {{ Former::text('contact_end')->class('input-medium input-md form_contact_end')}}
            </div>
            <div id="datetimepicker3" class="input-append">
    <input data-format="hh:mm:ss" type="text"></input>
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>

  </div>

          <div class="form-group controls">
          {{ Form::submit('Sponsor us', array('class'=>'btn btn-success'))}}
        </div>
        {{ Former::close()}}
    </div>
    <div class="clearfix"></div>
  </div>
  {{ HTML::script('js/plugins/dataTables/jquery.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.min.js') }}
<script type="text/javascript">
$(function () {
$('.form_birthday').datetimepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left",
        minView: 2,
    });
$('#contact_start').datetimepicker({
        pickDate:false,

    });
$('.form_contact_end').datetimepicker({
        format: "hh:ii",
        autoclose: true,
        startView: 1,
        minView: 0,
        maxView: 1,
    });
 $('#datetimepicker3').datetimepicker({
      pickDate: false
    });
});
</script>