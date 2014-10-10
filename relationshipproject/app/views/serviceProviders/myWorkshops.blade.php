@extends('serviceProviders.serviceProviders')

@section('content')

{{ HTML::script('js/plugins/dataTables/jquery.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') }}
{{ HTML::script('js/plugins/dataTables/shCore.js') }}


{{ HTML::style('css/plugins/dataTables.bootstrap.css') }}

<script>
    $('.list-group-item').removeClass('active');
    $('#myWorkshopsPage').addClass('active');
</script>

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


<div class="panel-heading">
    <h3 class="panel-title">
        My workshops
    </h3>                  
</div>
<div class="panel-body">
    <div class="table-responsive" style="padding:10px;">
        <div class="row">

            <div class="col-lg-6 ">
                <a class="btn btn-small btn-success" href="{{ URL::to('workshops/create') }}">Create New Workshop</a>
             
                <label class="form-inline">Service Type: <select id="selectWorkshop" class="form-control input-sm"><option value=""></option></select></label>
            </div>

        </div>

        <table id="myDatas" class="table table-striped table-bordered table-hover display" cellspacing="0" >

            <thead>
                <tr>
                    <th>Workshops</th>
                    <th>Payments state</th>
                    <th>Show</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $workshops as $key => $value )
                <tr class="odd gradeX">
                    <td>{{ $value->topic }}</td>
                    <td>paid</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('workshops/' . $value->id) }}">Show</a>
                    </td>

                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('workshops/' . $value->id . '/edit') }}">Edit</a>
                    </td>

                    <td>
                        {{ Former::open()->method('DELETE')->class('form-horizontal')->route('workshops.destroy' , $value->id) }}
                        {{Former::submit('Delete')->class('btn btn-danger')}}
                        {{Former::close()}}
                    </td>

                </tr>
                @endforeach

                <tr class="odd gradeX">
                    <td>Workshop1</td>
                    <td><a class='btn btn-success'>pay now</a></td>
                    <td>Edit</td>
                </tr>
                <tr class="odd gradeX">
                    <td>Workshop1</td>
                    <td>paid</td>
                    <td>Edit</td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
@stop
