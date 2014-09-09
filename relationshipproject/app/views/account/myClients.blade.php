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
  <!-- MetisMenu CSS -->
  <link href="/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link href="/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a id="reviewPage" href="review" class="list-group-item">Review the website</a>
                <a id="ClientsPage" href="myClients" class="list-group-item active">Clients</a>
            </ul>
        </div>
    </div><!--span3-->
    <div class="span9">
      <div id="step1Form" class="panel panel-success" style="min-height:400px;">
        <div class="panel-heading">
          <h3 class="panel-title">
            Clients</h3>                  
        </div>
        <div class="panel-body">
            <div class="table-responsive" style="padding:10px;">
              <div class="row">

                <div class="col-lg-6 ">
                    <label class="form-inline">Service Type: <select id="selectWorkshop" class="form-control input-sm"><option value=""></option></select></label>
                </div>

            </div>

            <table id="myDatas" class="table table-striped table-bordered table-hover display" cellspacing="0" >
                <thead>
                    <tr>
                        <th>Clients</th>
                        <th>Service Type</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="odd gradeX">
                        <td>Trident</td>
                        <td>Internet Explorer 4.0</td>
                        <td align="center"><a class="btn btn-success btn-outline btn-sm">Pay for details</a></td>
                    </tr>
                    <tr class="even gradeC">
                        <td>Trident</td>
                        <td>Internet Explorer 5.0</td>
                        <td align="center"><a class="btn btn-success btn-outline btn-sm">Pay for details</a></td>
                    </tr>
                    <tr class="odd gradeA">
                        <td>Trident</td>
                        <td>Internet Explorer 5.5</td>
                        <td align="center"><a class="btn btn-success btn-outline btn-sm">Pay for details</a></td>
                    </tr>
                    <tr class="even gradeA">
                        <td>Trident</td>
                        <td>Internet Explorer 6</td>
                        <td align="center"><a class="btn btn-success btn-outline btn-sm">Pay for details</a></td>
                    </tr>
                    <tr class="odd gradeA">
                        <td>Trident</td>
                        <td>Internet Explorer 7</td>
                        <td align="center"><a class="btn btn-success btn-outline btn-sm">Pay for details</a></td>
                    </tr>
                    <tr class="even gradeA">
                        <td>Trident</td>
                        <td>AOL browser (AOL desktop)</td>
                        <td align="center"><a class="btn btn-success btn-outline btn-sm">Pay for details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
<script src="/js/plugins/dataTables/jquery.dataTables.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/js/sb-admin-2.js"></script>
<script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="/js/plugins/dataTables/shCore.js"></script>
<script class="init">
$(document).ready(function() {
    var table = $('#myDatas').DataTable();
    var select =$('#selectWorkshop').on('change',function() {
        var val = $(this).val();
        table.column(1)
        .search( val ? '^'+$(this).val()+'$' : val, true, false )
        .draw();
    });

    table.column(1).data().unique().sort().each( function (d,j) {
        select.append( '<option value="'+d+'">'+d+'</option>' )
    } );

});
</script>

<script type="text/javascript">
</script>
</html>
