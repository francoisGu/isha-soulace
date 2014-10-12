
{{ HTML::style('css/plugins/bootstrap-datetimepicker.min.css') }}
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
            <a id="advertiseWSPage" href="advertise" class="list-group-item active">Advertise a new workshop</a>
            <a id="myWorkshopsPage" href="workshops" class="list-group-item">My workshops</a>
            <a id="reviewPage" href="review" class="list-group-item">Review the website</a>
            <a id="ClientsPage" href="clients" class="list-group-item">Clients</a>
      </ul>
    </div>
  </div><!--span3-->
  <div class="span9">
    <div id="step1Form" class="panel panel-success" style="min-height:100px;">
      <div class="panel-heading">
        <h3 class="panel-title">
          Advertise a new workshop
        </h3>                  
      </div>
      
      <form class="form-horizontal" >
        <fieldset id="forms">
          <!-- Form Name -->
          <legend></legend>
          <!-- title input-->
          <div class="control-group">
            <label class="control-label" for="date">Title</label>
            <div class="controls">
              <input id="title" name="title" type="text" placeholder="workshop name" class="input-xlarge inputHeight form-control">

            </div>
          </div>

          <!-- date input-->
          <div class="control-group">
            <label class="control-label" for="date">Start Time</label>
            <div class="controls">
              <input id="start_time" name="start_time" type="text" class="input-xlarge inputHeight form-control form_start_time" type="text" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">

            </div>
          </div>

          <!-- time input-->
          <div class="control-group">
            <label class="control-label" for="time">End Time</label>
            <div class="controls">
              <input id="end_time" name="end_time" type="text" class="input-xlarge inputHeight form-control form_end_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">

            </div>
          </div>

          <!-- venue input-->
          <div class="control-group">
            <label class="control-label" for="venue">Venue</label>
            <div class="controls">
              <input id="venue" name="venue" type="text" placeholder="detail address" class="input-xlarge inputHeight form-control">

            </div>
          </div>

          <!-- price input-->
          <div class="control-group">
            <label class="control-label" for="price">Price</label>
            <div class="controls">
              <input id="price" name="price" type="text" placeholder="" class="input-medium inputHeight form-control">
            </div>
          </div>
          <!-- number input-->
          <div class="control-group">
            <label class="control-label" for="ticketNumber">Total tickets number</label>
            <div class="controls">
              <input id="ticketNumber" name="ticketNumber" type="text" placeholder="" class="input-medium inputHeight form-control">
            </div>
          </div>
          <!-- Select Basic -->
          <div class="control-group">
            <label class="control-label" for="selectbasic">Type of workshop</label>
            <div class="controls">
              <select id="selectbasic" name="selectbasic" class="input-large inputHeight form-control">
                <option>Fitness &amp; Nutrition</option>
                <option>Accommodation</option>
              </select>
            </div>
          </div>

          <!-- Multiple Radios (inline) -->
          <div class="control-group">
            <label class="control-label" for="radios">Food/Drinks Provided</label>
            <div class="controls">
              <label class="radio inline" for="radios-0">
                <input type="radio" name="radios" id="radios-0" value="Yes" checked="checked">
                Yes
              </label>
              <label class="radio inline" for="radios-1">
                <input type="radio" name="radios" id="radios-1" value="No">
                No
              </label>
            </div>
          </div>

          <!-- Textarea -->
          <div class="control-group">
            <label class="control-label" for="briefDescription">Brief Description</label>
            <div class="controls">                     
              <textarea id="briefDescription" class="inputHeight form-control input-xxlarge" name="briefDescription"></textarea>
            </div>
          </div>
          <!-- Button -->
          <div style="margin-bottom:30px;float:right;" class="span6">
            <a id="submit" class="btn btn-success btn-outline" onclick="submitForm()">Pay now</a>
            <a id="cancel" style="margin-left:30px;" class="btn btn-warning btn-outline" onclick="cancelForm()">Pay Later</a>
          </div>
        </fieldset>
      </form>

      

      <form class="form-horizontal" >
        <fieldset id="forms2" style="display:none;">
          <!-- Multiple Radios -->
          <div class="control-group">
            <label class="control-label" for="type">Advertisement Type</label>
            <div class="controls">
              <label class="radio inline" for="type-0">
                <input type="radio" name="type" id="type-0" value="Premium" checked="checked">
                Premium
              </label>
              <label class="radio inline" for="type-1">
                <input type="radio" name="type" id="type-1" value="General">
                General
              </label>
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="item">Item</label>
            <div class="controls">
              <label class="" for="item" style="padding-top:5px;">workshop Advertisement</label>
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="adPrice">Advertisement Prcie</label>
            <div class="controls">
              <label class="" for="adPrice" style="padding-top:5px;">AUD$250</label>
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="adDate">Advertisement Date</label>
            <div class="controls">
              <input id="adDate" name="adDate" type="text" placeholder="" class="input-xxlarge inputHeight form-control">
            </div>
          </div>
          <!-- Multiple Radios -->
          <div class="control-group">
            <label class="control-label" for="method">Method</label>
            <div class="controls">
              <label class="radio inline" for="paypal">
                <input type="radio" name="method" id="paypal" value="Paypal" checked="checked">
                Paypal
              </label>
              <label class="radio inline" for="creditCard">
                <input type="radio" name="method" id="creditCard" value="Credit card">
                Credit card
              </label>
            </div>
          </div>
          <!-- Button -->
          <div style="margin-left:200px; margin-bottom:30px;">
            <a id="pay" class="btn btn-success btn-outline" onclick="">Pay</a>
          </div>
        </fieldset>
      </form>
      
    </div>
  </div>
</div>
{{ HTML::script('js/plugins/dataTables/jquery.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.min.js') }}
<script type="text/javascript">
$('.form_start_time').datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
$('.form_end_time').datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
</script>
<script type="text/javascript">

function submitForm() {
  document.getElementById("forms2").style.display = "";
}
function cancelForm() {

}
function inputChange() {
  document.getElementById("forms").disabled = "";
  document.getElementById("submit").style.display = "";
  document.getElementById("cancel").style.display = "";
  document.getElementById("edit").style.display = "none";
}
</script>
