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
    <div class="brand">Isha SoulAce</div>
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
            <li><a href="{{ URL::to('about')}}">About</a></li>
            <li><a href="{{ URL::to('donations')}}">Donate</a></li>
            <li><a href="#sponsor">Sponsor</a></li>
            <li><a href="reviews">Review</a></li>
          </ul>
          @if(!Sentry::check())

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
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    <div id="main-content">
      <div class="container" style="margin-top:30px;">
      

      {{ $content }}
      
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; Company 2014</p>
      </footer>
    </div>
    </div>


  </body>
  <script type="text/javascript">
  </script>
  </html>
