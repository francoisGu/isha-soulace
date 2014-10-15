@extends('serviceProviders.serviceProviders')

@section('content')

{{ HTML::style('css/plugins/dataTables.bootstrap.css') }}

<div class="panel-heading">
    <h3 class="panel-title">
        My workshops
    </h3>                  
</div>
<div class="panel-body">
    <div class="table-responsive" style="padding:10px;">
        <div class="row">

            <div class="col-lg-6 ">
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('workshops/create') }}">New Workshop</a> -->
             
                <label class="form-inline">Service Type: <select id="selectWorkshop" class="form-control input-sm"><option value=""></option></select></label>
            </div>

        </div>

        <table id="myDatas" class="table table-responsive table-striped table-condensed table-hover display" cellspacing="0" >

            <thead>
                <tr>
                    <th>Workshops</th>
                    <th>Payments state</th>
                    <th>Show</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <tbody>
                
                <tr class="odd gradeX">
                    
                    <td>paid</td>
                    <td>

                    </td>

                    <td>
    
                    </td>

                    <td>

                    </td>

                </tr>
                

                <tr class="odd gradeX">
                    <td>Workshop1</td>
                    <td><a class='btn btn-success'>pay now</a></td>
                    <td>Edit</td>
                    <td>Edit</td>
                </tr>
                <tr class="odd gradeX">
                    <td>Workshop1</td>
                    <td>paid</td>
                    <td>Edit</td>
                    <td>Edit</td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
{{ HTML::script('js/plugins/dataTables/jquery.js') }}
<script>
    $(document).ready(function() {
    $('.list-group-item').removeClass('active');
    $('#reviewPage').addClass('active');
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
@stop
