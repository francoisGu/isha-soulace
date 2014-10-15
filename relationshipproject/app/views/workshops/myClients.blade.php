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
        var select =$('#select').on('change',function() {
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
        My Clients - {{ $service->topic }}

        <a class="" id="back" style="float:right;margin-right:30px;cursor:pointer;" href="{{ URL::to('/workshops/'.$service->id) }}">Back</a>
    </h3>                  
</div>
<div class="panel-body">
    <div class="table-responsive" style="padding:10px;">
        <div class="row">

            <div class="col-lg-6 ">
             
                <label class="form-inline">Service Type: <select id="select" class="form-control input-sm"><option value=""></option></select></label>
            </div>
            <!--
            <div class="col-lg-6 ">
                {{ Form::open(array('method' => 'POST', 'url' => URL::current() . '?TYPE='. Crypt::encrypt(get_class($service)).'&id='. Crypt::encrypt($service->id))) }}

                {{ Form::label('content', ' ', array('style'=>'margin-left: 3%;', 'class'=>'form-inline')) }}
                {{ Form::text('content', null,array('placeholder' => 'Email/Ticket No.')) }}

                {{ Form::label('search', " ", array('style'=>'margin-left: 3%;', 'class'=>'form-inline')) }}
                {{ Former::submit('search', 'Search')->class('btn btn-small btn-success btn-outline') }}

                {{ Form::close() }}
            </div>
            -->

        </div>

            @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li style="color:red" class="error">:message</li>')) }}
            </ul>
            @endif


        <table id="myDatas" class="table table-responsive table-striped table-condensed table-hover display" cellspacing="0" style="width:100%">

            <thead>
                <tr>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Ticket</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $clients as $client )
                <tr class="odd gradeX" >
                    <td class="col-md-2" style="width:300px;">{{ $client->email }}</td>

                    <td class="col-md-2" style="width:80px;"> {{ Ticket::where('client_id', $client->id)->where('workshop_id', $service->id)->pluck('class') }}</td>
                    @if( $client->workshops )
                    <td class="col-md-8" style="width:200px;"> {{ Ticket::where('client_id', $client->id)->where('workshop_id', $service->id)->pluck('ticketNumber') }}</td>
                    @else
                        <td class="col-md-6">No</td>
                    @endif
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@stop

