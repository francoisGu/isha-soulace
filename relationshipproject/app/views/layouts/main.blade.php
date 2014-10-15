<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://localhost:8000/favicon.ico">
    <style type="text/css">
body {
  background:url('http://static.tumblr.com/f06e99f57f07d88f2fe1e1c044dbfacd/fxwkji2/JDDmqz238/tumblr_static_yellow_background.jpg');
  background-size:100% 100%;
  background-attachment: fixed; 
  background-repeat:no-repeat;
}
</style>
    <div class='title'>
        @yield('title', '<title>Isha SoulAce</title>')
    </div>
<!--     {{ HTML::style('css/bootstrap.min.css') }} -->
    {{ HTML::style('css/plugins/bootstrap.css') }}
    {{ HTML::style('css/offcanvas.css') }}
    {{ HTML::style('css/bootstrap-responsive.css') }}

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
          <!-- <a class="navbar-brand" href="/"><img alt="Logo" src="images/logo/Isha SoulAce_Red-Font-pic-only.png"> Isha SoulAce</a> -->
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="/">Home</a></li>
            <li><a href=" {{ URL::to('about') }}">About</a></li>-->
            {{ HTML::smartNavMenu('home', 'Home') }}
            {{ HTML::smartNavMenu('about', 'About') }}
			<li {{ HTML::startSmartDropdown('services') }} ><!-- <li class="active" class="dropdown" > -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
				<li><a href="{{ URL::to('services/familylaw') }}">Family Law</a></li>
				<li><a href="{{ URL::to('services/accommodation') }}">Accommodation</a></li>
				<li><a href="{{ URL::to('services/fitnessandnutrition') }}">Fitness & Nutrition</a></li>
				<li><a href="{{ URL::to('services/mentalwellbeing') }}">Mental Wellbeing, Counselling</a></li>
				<li><a href="{{ URL::to('services/financialadvice') }}">Financial Advice</a></li>
				<li><a href="#review">Workshops</a></li>
              </ul>
            </li>
            <li><a href="#donate">Donate</a></li>
            <li><a href="#sponsor">Sponsor</a></li>
            <li {{ HTML::startSmartDropdown('reviews') }} ><!-- <li class="active" class="dropdown" > -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Review<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
				<li><a href="{{ URL::to('reviews/website') }}">Review our website</a></li>
				<li><a href="{{ URL::to('reviews/services') }}">Review services</a></li>
				<li><a href="{{ URL::to('reviews/workshops') }}">Review workshops</a></li>
              </ul>
            </li>
            <!-- Manage active state for pages -->
          </ul>

            <div class="form-group">
                @if(!Sentry::check())
                <form class="navbar-form navbar-right" action = "{{ action('UsersController@getActivation') }}" method="get">
                    <input type="submit" value="Activate" class="btn btn-success"/>
                </form>

                <form class="navbar-form navbar-right" action = "{{ action('UsersController@getRegister') }}" method="get">
                    <input type="submit" value="Register" class="btn btn-success"/>
                </form>

                <form class="navbar-form navbar-right" action = "{{ action('UsersController@getLogin') }}" method="get">
                    <input type="submit" value="Sign in" class="btn btn-success"/>
                </form>

                @else
                <form class="navbar-form navbar-right" action = "{{ action('UsersController@getLogout') }}" method="get">
                    <input type="submit" value="Sign out" class="btn btn-success"/>
                </form>

                @endif
        </div>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div><!--/row-->

    
	<div class="container">
        <!--@if(Session::has('message'))
			<p class="alert">{{ Session::get('message') }}</p>
		@endif
        -->

        @yield('main')

    <footer>
	  <p class="pull-right"><a href="#">Back to top</a></p>
      <p>Copyright &copy; 2014 Isha SoulAce (ABN 34 397 589 509). All rights reserved.</p>
    </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
    {{ HTML::script('js/plugins/dataTables/jquery.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') }}
{{ HTML::script('js/plugins/dataTables/shCore.js') }}

    {{ HTML::script('js/offcanvas.js') }}
</html>

