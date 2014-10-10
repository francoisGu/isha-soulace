  {{ HTML::style('css/plugins/dataTables.tableTools.css') }} 
  {{ HTML::style('css/plugins/dataTables.bootstrap.css') }}
  <div class="row-fluid">
    <div class="span3">
      <div class="panel panel-success" style="min-height:200px;">
        <div class="panel-heading">
          <h3 class="panel-title">
            Welcome, <?php echo $user->first_name ?>
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
              <tbody id="datas">
                @foreach ($clients as $client)
                <tr class="odd gradeX">
                <td> {{ $client->name }} </td>
                <td>Law</td>
                <td>view</td>
               </tr>
                @endforeach
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
  {{ HTML::script('js/plugins/dataTables/dataTables.tableTools.min.js') }}
  {{ HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') }}

  <script class="init">

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


  </script>

