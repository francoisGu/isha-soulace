
<div class="row-fluid">
  <div class="span3">
    <div class="panel panel-success" style="min-height:200px;">
      <div class="panel-heading">
        <h3 class="panel-title">
          Welcome, XX
        </h3>
      </div>
      <ul class="list-group">
        <a id="profilePage" href="profile" class="list-group-item">Profile</a>
            <a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>
            <a id="myWorkshopsPage" href="workshops" class="list-group-item">My workshops</a>
            <a id="reviewPage" href="review" class="list-group-item active">Review the website</a>
            <a id="ClientsPage" href="clients" class="list-group-item">Clients</a>
      </ul>
    </div>
  </div><!--span3-->
  <div class="span9">
    <div id="step1Form" class="panel panel-success" style="min-height:400px;">
      <div class="panel-heading">
        <h3 class="panel-title">
          Rating and Review
        </h3>                  
      </div>
      
      <form class="form-horizontal" >
        <fieldset id="forms">
          <legend></legend>
          <!--rating-->
          <div class="control-group">
            <label class="control-label" for="rating">Rating:</label>
            <div class="controls">                     
              <div id="custom" data-rating="5" style="margin-top:5px;"></div>
              <div id="result"></div>
            </div>
          </div>
          <!-- Textarea -->
          <div class="control-group">
            <label class="control-label" for="review">Review:</label>
            <div class="controls">                     
              <textarea id="review" style="height:100px;" class="form-control input-xxlarge" name="review"></textarea>
            </div>
          </div>
        </fieldset>
        <div style="margin-bottom:30px;float:right;" class="span6">
          <a id="submit" class="btn btn-success btn-outline" onclick="submitForm()">Submit</a>
          <a id="cancel" class="btn btn-warning btn-outline" onclick="cancelForm()">Cancel</a>
        </div>
      </form>
      <!-- Button -->
      
    </div>
  </div>
</div>
{{ HTML::script('js/jquery-1.8.3.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/jquery.raty.min.js') }}
<script type="text/javascript">
$('#result').hide();
$('div#custom').raty({
  path:"/img",
  number:   10,
  score: 5,
  onClick: function(score){
    saveScore(score);
  } 
});
var result;
function saveScore(score) {
  result = score;
}
function submitForm() {
 // alert(result);
}
function cancelForm() {

}
</script>

