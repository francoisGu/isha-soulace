
<div class="row-fluid">
  <div class="span3">
    <div class="panel panel-success" style="min-height:200px;">
      <div class="panel-heading">
        <h3 class="panel-title">
          Welcome, XX
        </h3>
      </div>
      <ul class="list-group">
        <a id="profilePage" href="profile" class="list-group-item active">Profile</a>
            <a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>
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
          Profile<a id="edit" style="float:right;margin-right:30px;cursor:pointer;" onclick="inputChange()">Edit</a>
        </h3>                  
      </div>

      <form class="form-horizontal" >
        <fieldset id="forms" disabled="disabled">
          <!-- Form Name -->
          <legend></legend>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="email">Email Address</label>
            <div class="controls">
              <input id="email" name="email" type="text" placeholder="Save as username" class="input-xlarge inputHeight form-control">

            </div>
          </div>

          <!-- Password input-->
          <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              <input id="password" name="password" type="password" placeholder="At least 6 characters" class="input-xlarge inputHeight form-control">

            </div>
          </div>

          <!-- Password input-->
          <div class="control-group">
            <label class="control-label" for="passwordConfirm">Confirm Password</label>
            <div class="controls">
              <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="" class="input-xlarge inputHeight form-control">

            </div>
          </div>

          <!-- Multiple Radios -->
          <div class="control-group">
            <label class="control-label" for="radios">Identity</label>
            <div class="controls">
              <label class="radio" for="radios-0">
                <input type="radio" name="radios" id="radios-0" value="Individual" checked="checked">
                Individual
              </label>
              <label class="radio" for="radios-1">
                <input type="radio" name="radios" id="radios-1" value="Company">
                Company
              </label>
            </div>
          </div>

          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="firstName">First Name</label>
            <div class="controls">
              <input id="firstName" name="firstName" type="text" placeholder="" class="input-medium inputHeight form-control">

            </div>
          </div>

          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="lastName">Last Name</label>
            <div class="controls">
              <input id="lastName" name="lastName" type="text" placeholder="" class="input-medium inputHeight form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="companyName">Company Name</label>
            <div class="controls">
              <input id="companyName" name="companyName" type="text" placeholder="" class="input-xlarge inputHeight form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="ACN">ACN</label>
            <div class="controls">
              <input id="ACN" name="ACN" type="text" placeholder="" class="input-medium inputHeight form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="ABN">ABN</label>
            <div class="controls">
              <input id="ABN" name="ABN" type="text" placeholder="" class="input-large inputHeight form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="address">Address</label>
            <div class="controls">
              <input id="address" name="address" type="text" placeholder="Street...Suburb...State...Postcode" class="input-xxlarge inputHeight form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="phone">Phone Number</label>
            <div class="controls">
              <input id="phone" name="phone" type="text" placeholder="" class="input-medium inputHeight form-control">
            </div>
          </div>
          <!-- Appended Input-->
          <div class="control-group">
            <label class="control-label" for="mobile">Mobile Phone</label>
            <div class="controls">
              <div class="input-append">
                <input id="mobile" name="mobile" class="input-medium inputHeight form-control" placeholder="" type="text">
                <span class="add-on" style="margin-left:-7px;">Opt.</span>
              </div>
            </div>
          </div>
          <!-- Multiple Radios -->
          <div class="control-group">
            <label class="control-label" for="modeRadio">Mode</label>
            <div class="controls">
              <label class="radio" for="modeRadio-0">
                <input type="radio" name="modeRadio" id="modeRadio-0" value="Hourly" checked="checked">
                Hourly
              </label>
              <label class="radio" for="modeRadio-1">
                <input type="radio" name="modeRadio" id="modeRadio-1" value="Session">
                Session
              </label>
            </div>
          </div>
        </fieldset>
      </form>
      <!-- Button -->
      <div style="margin-left:100px; margin-bottom:30px;">
        <a id="submit" style="display:none;" class="btn btn-success btn-outline" onclick="submitForm()">Submit</a>
        <a id="cancel" style="display:none;" class="btn btn-warning btn-outline" onclick="cancelForm()">Cancel</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function submitForm() {
  document.getElementById("forms").disabled = "disabled";
  document.getElementById("submit").style.display = "none";
  document.getElementById("cancel").style.display = "none";
  document.getElementById("edit").style.display = "";
}
function cancelForm() {
  document.getElementById("forms").disabled = "disabled";
  document.getElementById("submit").style.display = "none";
  document.getElementById("cancel").style.display = "none";
  document.getElementById("edit").style.display = "";
}
function inputChange() {
  document.getElementById("forms").disabled = "";
  document.getElementById("submit").style.display = "";
  document.getElementById("cancel").style.display = "";
  document.getElementById("edit").style.display = "none";
}
</script>
