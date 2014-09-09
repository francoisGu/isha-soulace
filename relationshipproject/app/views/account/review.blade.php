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
                  <a id="profilePage" href="profile" class="list-group-item">Profile</a>
                  <a id="advertiseWSPage" href="advertiseWS" class="list-group-item">Advertise a new workshop</a>
                  <a id="myWorkshopsPage" href="myWorkshops" class="list-group-item">My workshops</a>
                  <a id="reviewPage" href="review" class="list-group-item active">Review the website</a>
                  <a id="ClientsPage" href="myClients" class="list-group-item">Clients</a>
                </ul>
              </div>
            </div><!--span3-->
            <div class="span9">
              <div id="step1Form" class="panel panel-success" style="min-height:400px;">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    Rating and Review</h3>                  
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
            <footer>
              <p class="pull-right"><a href="#">Back to top</a></p>
              <p>&copy; Company 2014</p>
            </footer>
          </div>
        </div>
      </body>
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
      </html>
