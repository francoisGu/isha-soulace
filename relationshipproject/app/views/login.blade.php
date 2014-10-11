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
            <li class="active"><a href="/">Home</a></li>
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
            <button type="submit" class="btn btn-success">Register</button>
          </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    
    <div id="main-content">
      <div class="container" style="margin-top:30px;">
        <div class="row-fluid">
          <div class="span6">
            <div id="step1Form" class="panel panel-success" style="min-height:200px;">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Log in</h3>
                </div>
                <form class="form-horizontal">
                  <fieldset>

                    <!-- Form Name -->
                    <legend></legend>

                    <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="username">Username</label>
                      <div class="controls">
                        <input id="username" name="username" type="text" placeholder="email" class="input-xlarge form-control">

                      </div>
                    </div>

                    <!-- Password input-->
                    <div class="control-group">
                      <label class="control-label" for="password">Password</label>
                      <div class="controls">
                        <input id="password" name="password" type="password" placeholder="password" class="input-xlarge form-control">
                        <p class="help-block">Forget password?</p>
                      </div>
                    </div>
                    

                  </fieldset>
                </form>
                <div class="control-group" style="margin-left:100px;">
                      <label class="control-label" for="submit"></label>
                      <div class="controls">
                        <button class="btn btn-success" onclick="">Login</button>
                      </div>
                    </div>
              </div>
            </div><!--span12-->
          </div>
        </div>
      </div>

    </body>

    </html>
