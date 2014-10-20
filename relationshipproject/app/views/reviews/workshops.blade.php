@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Review Service</title>
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
  <h3 class="text-center">Review our workshops</h3>
  <p class="text-center">Tell us what you think about the workshops you attended so organisers can improve!</p>
  <div id="big-form" class="well auth-box">
    {{Former::framework('Nude');}}
    {{Former::open()->method('POST')->class('')}}
    <!-- Form Name -->

    <div class="form-group">
      <label class=" control-label" for="">Ticket Number*</label>
      {{Former::text('ticketNumber')->placeholder('Enter the Ticket ID you received')->class('input-xlarge input-md form-control')->required()}}
    </div>

    <div class="form-group ">
      <label class=" control-label" for="">Ratings*</label>
      <div class="controls">                     
        <div id="custom" style="margin-top:5px;" required='true'></div>
      </div>
    </div>

      <div class="form-group" >
        <label class=" control-label" for="">Reviews*</label>
        {{Former::textarea('review')->placeholder('Leave your review here...')->rows(4)->class('input-xxlarge input-md form-control')->required()}}
      </div>

      <div class="form-group controls">
        {{ Form::submit('Submit', array('class'=>'btn btn-danger btn-outline'))}}
      </div>
      {{ Former::close()}}
      @if(Session::has('message'))
      <p style="color:red;">{{ Session::get('message') }}</p>
      <!-- <a id='viewDetails' class='btn btn-warning' onclick="show()">view my ratings & reviews</a> -->
      <div id='details' style='display:none;'>
        <div class="form-group ">
      <label class=" control-label" for=""><p>Rating: </p> </label>
      </div>
      <div class="form-group" >
        <label class=" control-label" for="">Reviews</label>
        <p></p>
      </div>
    </div>
      @endif
    </div>
    <div class="clearfix"></div>

  </div>
  {{ HTML::script('js/jquery-1.8.3.min.js') }}
  {{ HTML::script('js/plugins/jquery.raty.min.js') }}
  <script type="text/javascript">
  $('div#custom').raty({
          path:"/project/relationshipproject/public/img",
    number: 5,
    start: 3,
    score: 3,
    onClick: function(score){
      saveScore(score);
    } 
  });

  function saveScore(score) {
    document.getElementsByName('ratings').value = score;
  }
  function show() {
    document.getElementById('details').style.display = '';
  }
  </script>
@stop
