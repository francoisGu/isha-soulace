<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>index</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  {{ HTML::style('css/plugins/bootstrap.css') }}     
  {{ HTML::style('css/offcanvas.css') }}
  {{ HTML::style('css/bootstrap-responsive.css') }}
  
<!--[if IE]>
<style type="text/css">
    .single-page .detail-post .detail-main .kp-dropcap:first-letter {
        padding:5px 10px 0 10px;
    }
</style>
<![endif]-->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="all" />
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    
  </head>
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Isha SoulAce</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="about">About</a></li>
            <li><a href="#donate">Donate</a></li>
            <li><a href="#sponsor">Sponsor</a></li>
            <li><a href="#review">Review</a></li>
          </ul>

          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <a href="register" class="btn btn-success">Register</a>
          </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    <div id="main-content">
      <div class="container" style="margin-top:30px;">
        <div class="row-fluid">
          <div class="span3">
            <div class="panel panel-success" style="min-height:200px;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Welcome, XX</h3>
                </div>
                <ul class="list-group">
                    <a href="account/profile" class="list-group-item active">Profile</a>
                    <a href="#" class="list-group-item">Advertise a new workshop</a>
                    <a href="#" class="list-group-item">My workshops</a>
                    <a href="#" class="list-group-item">Review the website</a>
                    <a href="#" class="list-group-item">Clients</a>
                </ul>
            </div>
            </div><!--span3-->
            <div class="span9">
              <div id="step1Form" class="panel panel-success" style="min-height:100px;">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    Profile<a id="edit" style="float:right;margin-right:30px;cursor:pointer;" onclick="inputChange()">Edit</a></h3>                  
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
                  <a id="submit" style="display:none;" class="btn btn-success btn-outline">Submit</a>
            <a id="cancel" style="display:none;" class="btn btn-warning btn-outline">Cancel</a>
          </div>
                </div>
                </div>
              </div>
              <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; Company 2014</p>
          </footer>
            </div>
          </div>
          

    </body>
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
    </html>
