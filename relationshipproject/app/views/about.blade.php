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
            <li><a href="/">Home</a></li>
            <li class="active"><a href="#about">About</a></li>
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

    <div class="container">
    <script>
    <?php 
        try {
                $geocode = Geocoder::geocode('10 rue Gambetta, Paris, France');
                // The GoogleMapsProvider will return a result
                var_dump($geocode);
            } catch (\Exception $e) {
                // No exception will be thrown here
                echo $e->getMessage();
            }
    ?>
    </script>
        <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h3>About Isha SoulAce</h1>
      </div>
      <p>We are a Not-For-Profit organization that provides support and services to people going through marriage and de facto relationship breakdown. </p>
      <p>We aim to address a social issue (domestic violence) in the society and intends to raise awareness, promote zero tolerance for any kind of domestic violence and also provide support services to the people going through relationship breakdown caused due to domestic violence. We facilitate activities towards supporting people especially women undergoing domestic violence to transform their lives positively, empowering them by creating opportunities for self sustenance.</p>
    </div>


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
