
      <div class="container" style="margin-top:30px;">
        <div class="row-fluid">
          <div class="span3">
            <div class="panel panel-success" style="min-height:200px;">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Registration Steps</h3>
                </div>
                <div class="panel-body">
                  <ul>
                    <li>
                      <a id="step1" href="#" style="color:red">Step 1: Fill in a form</a>
                    </li>
                    <li>
                      <a id="step2" href="#">Step 2: Wait for approval</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div><!--span3-->
            <div class="span9">
              <div id="step1Form" class="panel panel-success" style="min-height:100px;">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    Step 1: Fill in a form</h3>
                  </div>
                  <form class="form-horizontal">
                    <fieldset>

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
                        <label class="control-label" for="password_confirmation">Confirm Password</label>
                        <div class="controls">
                          <input id="passwordConfirm" name="password_confirmation" type="password" placeholder="" class="input-xlarge inputHeight form-control">
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
                        <label class="control-label" for="firstname">First Name</label>
                        <div class="controls">
                          <input id="firstName" name="firstname" type="text" placeholder="" class="input-medium inputHeight form-control">

                        </div>
                      </div>
                      <!-- Text input-->
                      <div class="control-group">
                        <label class="control-label" for="lastname">Last Name</label>
                        <div class="controls">
                          <input id="lastName" name="lastname" type="text" placeholder="" class="input-medium inputHeight form-control">
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
                  <form>
                  <div class="control-group">
                    <label class="control-label" for="submit"></label>
                    <div class="controls">
                      <button class="btn btn-success" name="Register" onclick="submitForm()" style="margin-left: 100px;">Submit</button>
                    </div>
                  </div>
                </form>
                </div>
                <div id="step2Form" class="panel panel-success" style="min-height:200px;display:none;">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Step 2: Wait for approval</h3>
                    </div>
                    <div class="panel-body">
                      <p style="font-size:14px;">You have registered successfully. What you should do next is to wait for the approval of Admin. Once your account have been approved, an e-mail will be sent. After confirming the email, you can use this account regularly. Thank you. </p>
                    </div>                        
                  </div>
                </div>
              </div>
    <script type="text/javascript">
    function submitForm() {
      document.getElementById("step1").style.color = "black";
      document.getElementById("step2").style.color = "red";
      document.getElementById("step1Form").style.display = "none";
      document.getElementById("step2Form").style.display = "";
      return;
    }
    </script>
