<div class="container auth">
  <h4 class="text-center">Review our Services</h4>
  <p class="text-center">Tell us what you think about the services providers you contacted so service providers can improve!</p>
  <div id="big-form" class="well auth-box">
    {{Former::framework('Nude');}}
    {{Former::open()->method('POST')->url('reviews/services')->class('')}}
    <!-- Form Name -->

    <div class="form-group">
      <label class=" control-label" for="">Form ID*</label>
      {{Former::text('form_id')->placeholder('Enter the Form ID you received')->class('input-xlarge input-md form-control')->required()}}
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
        {{Former::textarea('review_content')->maxlength('2500')->placeholder('Leave your review here...')->rows(4)->class('input-xxlarge input-md form-control')->required()}}
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
  {{ HTML::script('js/bootstrap.min.js') }}