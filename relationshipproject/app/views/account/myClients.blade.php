  {{ HTML::style('css/plugins/metisMenu/metisMenu.min.css') }}     
  {{ HTML::style('css/plugins/dataTables.bootstrap.css') }}
  {{ HTML::style('css/sb-admin-2.css') }}
  <div class="row-fluid">
    <div class="span3">
      <div class="panel panel-success" style="min-height:200px;">
        <div class="panel-heading">
          <h3 class="panel-title">
            Welcome, XX
          </h3>
        </div>
        <ul class="list-group">
          <a id="profilePage" href="profile" class="list-group-item">Profile</a>
            <a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>
            <a id="myWorkshopsPage" href="workshops" class="list-group-item">My workshops</a>
            <a id="reviewPage" href="review" class="list-group-item">Review the website</a>
            <a id="ClientsPage" href="clients" class="list-group-item active">Clients</a>
        </ul>
      </div>
    </div><!--span3-->
    <div class="span9">
      <div id="step1Form" class="panel panel-success" style="min-height:400px;">
        <div class="panel-heading">
          <h3 class="panel-title">
            Clients
          </h3>                  
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
  {{ HTML::script('js/plugins/dataTables/jquery.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/plugins/dataTables/jquery.dataTables.js') }}
  {{ HTML::script('js/plugins/metisMenu/metisMenu.min.js') }}
  {{ HTML::script('js/sb-admin-2.js') }}
  {{ HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') }}
  {{ HTML::script('js/plugins/dataTables/shCore.js') }}
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

