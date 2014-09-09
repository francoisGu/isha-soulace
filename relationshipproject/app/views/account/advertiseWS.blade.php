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
  {{ HTML::style('css/plugins/bootstrap-datetimepicker.min.css') }}
  

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
        <a id="profilePage" href="profile" class="list-group-item">Profile</a>
        <a id="advertiseWSPage" href="advertiseWS" class="list-group-item active">Advertise a new workshop</a>
        <a id="myWorkshopsPage" href="myWorkshops" class="list-group-item">My workshops</a>
        <a id="reviewPage" href="review" class="list-group-item">Review the website</a>
        <a id="ClientsPage" href="myClients" class="list-group-item">Clients</a>
      </ul>
    </div>
  </div><!--span3-->
            <div class="span9">
              <div id="step1Form" class="panel panel-success" style="min-height:100px;">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    Advertise a new workshop</h3>                  
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
                        <label class="control-label" for="date">Date</label>
                        <div class="controls">
                          <input id="date" name="date" type="text" class="input-xlarge inputHeight form-control form_date" type="text" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">

                        </div>
                      </div>

                      <!-- time input-->
                      <div class="control-group">
                        <label class="control-label" for="time">Time</label>
                        <div class="controls">
                          <input id="time" name="time" type="text" class="input-xlarge inputHeight form-control form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">

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
            <footer>
              <p class="pull-right"><a href="#">Back to top</a></p>
              <p>&copy; Company 2014</p>
            </footer>
          </div>
        </div>


      </body>
      {{ HTML::script('js/plugins/dataTables/jquery.js') }}
      {{ HTML::script('js/bootstrap.min.js') }}
      {{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.js') }}
      {{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.min.js') }}
      <script type="text/javascript">
      $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
      });
      $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
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
      </html>
