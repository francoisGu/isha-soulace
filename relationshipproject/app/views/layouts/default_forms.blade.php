<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://localhost:8000/favicon.ico">

    <title>{{ $title }}</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/plugins/bootstrap.css') }}  <!--Problem with columns-->
    {{ HTML::style('css/offcanvas.css') }}
    {{ HTML::style('css/bootstrap-responsive.css') }} <!--Problem which mobile navbar-->
<!--     {{ HTML::style('css/list.css') }} -->
  <style>
	.logo-space{
	  background-color:white;
	  padding-bottom:20px;
	}
	.main-white-space{
	  background-color:white;
	  padding-top:20px;
	}
	.main-gold-space{
	  background-color:gold;
/* 	  background-color:rgb(255, 255, 110); */
/* 	  background:url(http://www.hdesktops.com/wp-content/uploads/2013/08/yellow-parchment-paper-texture.jpg); */
	}
	.page-header {
	  padding-bottom: 9px;
	  margin: 40px 0 20px;
	  border-bottom: 1px solid #000;
	}
	.hr-black {
	  margin-top: 20px;
	  margin-bottom: 10px;
	  border: 0;
	  border-top: 1px solid #000;
	}
  </style>

  </head>
<!--  <figure align='middle'>
  {{ HTML::image('images/logo/Isha SoulAce_Red-Font.png', '',array('style' => 'height:100px')) }}
</figure>-->
<!--   <body style="padding-top: 25px;"> -->
  <body class="main-gold-space">
<!--	<div class="logo-space">
	<figure align="middle">
	  <a href="/">
		{{ HTML::image('images/logo/Isha SoulAce_Red-Font.png', '',array('style' => 'height:100px')) }}
	  </a>
	</figure>
	</div>-->
<!-- 	<div class="main-gold-space"> -->
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
        <div class="collapse navbar-collapse" >
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="/">Home</a></li>
            <li><a href=" {{ URL::to('about') }}">About</a></li>-->
            {{ HTML::smartNavMenu('home', 'Home') }}
            {{ HTML::smartNavMenu('about', 'About') }}
			<li {{ HTML::startSmartDropdown('services') }} ><!-- <li class="active" class="dropdown" > -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" style="z-index:10">
				<li><a href="{{ URL::to('services/familylaw') }}">Family Law</a></li>
				<li><a href="{{ URL::to('services/accommodation') }}">Accommodation</a></li>
				<li><a href="{{ URL::to('services/fitnessandnutrition') }}">Fitness & Nutrition</a></li>
				<li><a href="{{ URL::to('services/mentalwellbeing') }}">Mental Wellbeing, Counselling</a></li>
				<li><a href="{{ URL::to('services/financialadvice') }}">Financial Advice</a></li>
				<li><a href="#workshops">Workshops</a></li>
              </ul>
            </li>
            <li><a href="#donate">Donate</a></li>
            <li><a href="#sponsor">Sponsor</a></li>
            <li {{ HTML::startSmartDropdown('reviews') }} ><!-- <li class="active" class="dropdown" > -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Review<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" style="z-index:10">
				<li><a href="{{ URL::to('reviews/website') }}">Review our website</a></li>
				<li><a href="{{ URL::to('reviews/services') }}">Review services</a></li>
				<li><a href="{{ URL::to('reviews/workshops') }}">Review workshops</a></li>
              </ul>
            </li>
            <!-- Manage active state for pages -->
          </ul>

          <div class="form-group">
                @if(!Sentry::check())
                <!--<form class="navbar-form navbar-right" action = "{{ action('UsersController@getActivation') }}" method="get">
                    <input type="submit" value="Activate" class="btn btn-success"/>
                </form>-->

                <form class="navbar-form navbar-right" action = "{{ action('UsersController@getRegister') }}" method="get">
                    <input type="submit" value="Register" class="btn btn-success"/>
<!--                 </form> -->

<!--                 <form class="navbar-form navbar-right" action = "{{ action('UsersController@getLogin') }}" method="get"> -->
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

    
	<div class="container">
	   	@if(Session::has('message'))
			<p class="alert">{{ Session::get('message') }}</p>
		@endif

	   	{{ $content }}
	<div class="hr-black"></div>
    <footer>
	  <p class="pull-right"><a href="#">Back to top</a></p>
      <p>Copyright &copy; 2014 Isha SoulAce (ABN 34 397 589 509). All rights reserved.</p>
    </footer>

    </div><!--/.container-->
    </div>

  {{ HTML::script('js/plugins/dataTables/jquery.js') }}
<!-- {{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.js') }}
{{ HTML::script('js/plugins/dataTables/bootstrap-datetimepicker.min.js') }} --><!--
<script type="text/javascript"
        src="http://eonasdan.github.io/bootstrap-datetimepicker/scripts/bootstrap.min.js">
</script>-->
<script type="text/javascript" src="http://eonasdan.github.io/bootstrap-datetimepicker/scripts/moment.js">
</script>
<script type="text/javascript"
        src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js">
</script>
<script type="text/javascript">
$('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            pickTime: false,
            pickDate: true,
            language: 'en'
    });
$('.timepicker').datetimepicker({
            format: 'hh:mm',
            pickTime: true,
            pickDate: false,
            pickSeconds: false,
            language: 'en'
    });

</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/offcanvas.js') }}
    
    
  </body>
</html>
