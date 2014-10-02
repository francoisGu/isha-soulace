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
              <li class="active">{{HTML::link('/', 'Home')}}</li>
              <li>{{HTML::link('/about', 'About')}}</li>
            <li><a href="#donate">Donate</a></li>
            <li><a href="#sponsor">Sponsor</a></li>
            <li><a href="#review">Review</a></li>
          </ul>

            <div class="form-group">
                <ul class="navbar-form navbar-right">
                @if(!Sentry::check())
                <!-- <li>{{ HTML::link('users/login', 'Sign in') }}</li> -->
                <!-- <li>{{ HTML::link('users/register', 'Register') }}</li> -->
                <!-- <li>{{ HTML::link('users/activation', 'Activate') }}</li> -->
                <!--<form class="navbar-form navbar-right" action = "{{ 
                        action('UsersController@postActivate') }}" 
                        method="GET">
                    <input type="submit" value="Activate" class="btn 
                            btn-success"/>
                </form>

                <form class="navbar-form navbar-right" action = "{{ 
                        action('UsersController@postCreate') }}" method="GET">
                    <input type="submit" value="Register" class="btn 
                            btn-success"/>
                </form>

                <form class="navbar-form navbar-right" action = "{{ 
                        action('UsersController@postLogin') }}" method="GET">
                    <input type="submit" value="Sign in" class="btn 
                            btn-success"/>
                </form>
                -->
                {{Form::open(array('action' => 'UsersController@getActivation'))}}
                    {{Form::submit('Activate', array('class' = > 'btn btn-primary btn-blcok btn-success'))}}
                {{Form::close()}}

                {{Form::open(array('action' => 'UsersController@getRegister'))}}
                    {{Form::submit('Register', array('class' = > 'btn btn-primary btn-blcok btn-success'))}}
                {{Form::close()}}

                {{Form::open(array('action' => 'UsersController@getLogin'))}}
                    {{Form::submit('Sign in', array('class' = > 'btn btn-primary btn-blcok btn-success'))}}
                {{Form::close()}}



                @else
                <!--                <form class="navbar-form navbar-right" action = "{{ action('UsersController@getLogout') }}" method="GET">
                    <input type="submit" value="Sign out" class="btn btn-success"/>
                </form>
                -->

                {{Form::open(array('action' => 'UsersController@getLogout'))}}
                    {{Form::submit('Sign out', array('class' = > 'btn btn-primary btn-blcok btn-success'))}}
                {{Form::close()}}


                <!-- <li>{{ HTML::link('users/logout', 'Sign out') }}</li> -->
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
