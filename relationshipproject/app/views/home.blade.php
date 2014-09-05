<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://localhost:8000/favicon.ico">

    <title>Off Canvas Template for Bootstrap</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/offcanvas.css') }}

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
            <button type="submit" class="btn btn-success"> Sign in</button>
            <a href="register" class="btn btn-success">Register</a>
          </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Isha SoulAce</h1>
            <p>Helping you find the right service to assist in marriage and de facto relationship breakdowns</p>
          </div>
          
              <!-- Begin page content -->
    
		  <div class="page-header">
			<h3>Find help now</h1>
		  </div>
			<p>Select one of the services below to find a service to get help. If you don't know what you need, select one of the options on the left list below and the right services will be highlighted for you to choose.</p>
			<br>
          
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
			<a href="#" class="list-group-item">Emotional Abuse</a>
            <a href="#" class="list-group-item">Financial Abuse</a>
            <a href="#" class="list-group-item">Physical Abuse</a>
            <a href="#" class="list-group-item">Psychological Abuse</a>
            <a href="#" class="list-group-item">Sexual Abuse</a>
            <!--
            <a href="#" class="list-group-item">
			  <h4 class="list-group-item-heading">Emotional Abuse</h4>
              <p class="list-group-item-text">Examples: name-calling, insults, constant criticism, silent treatment, manipulation to induce guilt</p>
             </a>
            <a href="#" class="list-group-item">
			  <h4 class="list-group-item-heading">Financial Abuse</h4>
			  <p class="list-group-item-text">Examples: withholding money, forcing total control over victims earned income, forbidding employment, justification for all money spent</p>
			 </a>
            <a href="#" class="list-group-item">
			  <h4 class="list-group-item-heading">Physical Abuse</h4>
			  <p class="list-group-item-text">Examples: pinching, slapping, hitting, beating, kicking, arm twisting, punching, stabbing, not giving food to eat, forcing drug/alcohol use</p>
			 </a>
            <a href="#" class="list-group-item">
			  <h4 class="list-group-item-heading">Psychological Abuse</h4>
			  <p class="list-group-item-text">Examples: intimidation, damaging property, stalking, isolating from friends, family</p>
			  </a>
            <a href="#" class="list-group-item">
			  <h4 class="list-group-item-heading">Sexual Abuse</h4>
			  <p class="list-group-item-text">Examples: coercing, marital rape, acquaintance rape, forced sex after physical abuse, forced prostitution</p>
			 </a>
			 -->
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-sm-6 col-lg-4">
            <h4>Family Law</h4>
            <p>Legal services for family matters.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            <br>
<!--             </div><!--/span-->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
            <h4>Accommodation for Domestic Violence Victims</h4>
            <p>Housing and lodgings</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            <br>
<!--             </div><!--/span-->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
            <h4>Fitness & Nutrition</h4>
            <p>Healthy exercise and diets</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            <br>
		  </div><!--/span-->
		  <div class="col-6 col-sm-6 col-lg-4">
            <h4>Mental Wellbeing, Counselling</h4>
            <p>Overcome psychological problems and build self esteem</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            <br>
<!--             </div><!--/span-->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
            <h4>Financial Advice</h4>
            <p>Property settlement, mortage and other financial matters</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            <br>
<!--             </div><!--/span-->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
            <h4>Workshops</h4>
            <p>Build skills for employment</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            <br>
          </div><!--/span-->
        </div><!--/row-->
      </div><!--/span-->

      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="list-group">
          <a href="#" class="list-group-item">
		  <h4 class="list-group-item-heading">Workshop Title</h4>
		  <p class="list-group-item-text">
			Topic:<br>
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
          </a>
          <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Topic:<br>
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
          </a>
          <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Topic:<br>
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
          </a>
          <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Topic:<br>
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
          </a>
          <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Topic:<br>
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
          </a>
          <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Topic:<br>
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
          </a>
        </div>
      </div><!--/span-->
    </div><!--/row-->

    

    <footer>
	  <p class="pull-right"><a href="#">Back to top</a></p>
      <p>&copy; Company 2014</p>
    </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/offcanvas.js') }}
  </body>
</html>
