@extends('serviceProviders.serviceProviders')

@section('content')

{{ HTML::script('js/plugins/dataTables/jquery.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') }}

{{-- HTML::script('http://code.jquery.com/jquery-1.11.1.min.js') --}}
{{-- HTML::script('http://cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js') --}}


{{ HTML::style('css/plugins/dataTables.bootstrap.css') }}
{{-- HTML::style('http://cdn.datatables.net/1.10.3/css/jquery.dataTables.css') --}}

<script>
    $('.list-group-item').removeClass('active');
    $('#myWorkshopsPage').addClass('active');
</script>

<script class="init">
    var main = function() {
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

    };

    $(document).ready(main);
</script>


<div class="panel-heading">
    <h3 class="panel-title">
        My workshops

        <a class="" style="float:right;margin-right:30px;cursor:pointer;" href="{{ URL::to('workshops/create') }}">New Workshop</a>
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

        <table id='myDatas' class="table table-responsive table-striped table-condensed table-hover display" cellspacing="0" >

            <thead>
                <tr>
                    <th>Workshops</th>
                    <th>Type</th>
                    <th>Advertisement state</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $workshops as $workshop )

                <tr class="odd gradeX" >

                    <td style="width:300px;"><a href="{{ URL::to('workshops/' . $workshop->id) }}">{{ $workshop->topic }}</a></td>
                    <td style="width:90px;"> {{ $workshop->class }}</td>

                    @if(! $workshop->workshopAdvertisement )

                    <td><a class='btn btn-success btn-outline' href="{{ URL::to('workshopAdvertisements/create/') }}?workshopid={{ Crypt::encrypt($workshop->id) }}">Create now</a></td>

                    @elseif($workshop->workshopAdvertisement && ! $workshop->workshopAdvertisement->paid )

                        <td><a class='btn btn-success btn-outline' href="#">pay now</a></td>
                    @else
                    <td align='' style='color:green;'>paid</td>
                    @endif

                    {{--<td>
                        <a class="btn btn-small btn-success btn-outline" href="{{ URL::to('workshops/' . $workshop->id) }}">View</a>
                    </td>--}}

                    @if($workshop->workshopAdvertisement && $workshop->workshopAdvertisement->paid)
                    <td style="width:90px;color:green;">
                        Contact admin to edit.
                    </td>
                    <td style='color:red;'>
                        Cannot Delete
                    </td>
                    @else

                    <td>
                        <a class="btn btn-small btn-success btn-outline" href="{{ URL::to('workshops/' . $workshop->id . '/edit') }}">Edit</a>
                    </td>

                    <td>
                        {{ Former::open()->method('DELETE')->class('form-horizontal')->route('workshops.destroy' , $workshop->id) }}
                        {{Former::submit('Delete')->class('btn btn-danger btn-outline')}}
                        {{Former::close()}}
                    </td>
                    @endif

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@stop
