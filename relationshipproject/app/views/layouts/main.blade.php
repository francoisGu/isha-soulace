<!DOCTYPE html>
<html lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Isha SoulAce</title>

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
            <li><a href="/about">About</a></li>
            <li><a href="#donate">Donate</a></li>
            <li><a href="#sponsor">Sponsor</a></li>
            <li><a href="#review">Review</a></li>
          </ul>

            <div class="form-group">
                <ul class="navbar-form navbar-right">
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

	<div class="container">
	   	@if(Session::has('message'))
			<p class="alert">{{ Session::get('message') }}</p>
		@endif

	   	{{ $content }}
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script 
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/offcanvas.js') }}

  	</body>
</html>
