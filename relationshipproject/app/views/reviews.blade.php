<div class="container auth">
  <h1 class="text-center">Leave your reviews & ratings here!<span>Your opinions will surely be helpful to us!</span> </h1>
  <div id="big-form" class="well auth-box">
    {{Former::framework('Nude');}}
    {{Former::open()->method('POST')->url('reviews')->class('')}}
    <!-- Form Name -->
    <legend class="text-center" style="border-bottom:solid 1px;">Ratings & Reviews</legend>
    <!-- Text input-->

    <div class="form-group">
      <label class=" control-label" for="">Form ID*</label>
      {{Former::text('form_id')->placeholder('Type the form-id you received')->class('input-xlarge input-md form-control')->required()}}
    </div>

    <div class="form-group ">
      <label class=" control-label" for="">Ratings*</label>
      <div class="controls">                     
        <div id="custom" style="margin-top:5px;" required='true'></div>
        <input name="ratings" type='hidden' value='8'/>
      </div>
    </div>

      <div class="form-group" >
        <label class=" control-label" for="">Reviews*</label>
        {{Former::textarea('review_content')->placeholder('Leave your reviews here..')->rows(4)->class('input-xxlarge input-md form-control')->required()}}
      </div>

      <div class="form-group controls">
        {{ Form::submit('Submit', array('class'=>'btn btn-success'))}}
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
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/plugins/jquery.raty.min.js') }}
  <script type="text/javascript">
  var url = 'http://localhost:8000/reviews';
  $('div#custom').raty({
    path:"/img",
    number:   10,
    start:8,
    score: 5,
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