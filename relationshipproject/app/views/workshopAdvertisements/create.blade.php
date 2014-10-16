@extends ('serviceProviders.serviceProviders')@section('content')<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">    <link rel="stylesheet" type="text/css" media="screen"            href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">            {{ HTML::script('js/bootstrap.min.js') }}            {{ HTML::script('js/plugins/dataTables/jquery.js') }}            {{ HTML::style('css/plugins/dataTables.bootstrap.css') }}            <script>                $('.list-group-item').removeClass('active');                $('#myWorkshopsPage').addClass('active');            </script>            @if ($errors->any())            <ul>                {{ implode('', $errors->all('<li style="color:red" class="error">:message</li>')) }}            </ul>            @endif            <div class="panel-heading">                <h3 class="panel-title">                    Create Workshop Advertisement                </h3>                              </div>            <div class="panel-body">                <div class="table-responsive" style="padding:10px;">                    {{ Former::open()->route('workshopAdvertisements.store') }}                    {{ Former::hidden('workshop_id')->value( $workshop->id ) }}                    {{ Former::select('type')->label('Type')->options( array('premium'=>'premium', 'general'=>'general')) }}                    <div id="start_date_picker" class="input-append date datepicker">                        {{ Former::text('start_date')->readonly()                        ->label('Start Date')                        ->value( WorkshopAdvertisement::getFourWeeksAgo($workshop->date) )                        ->append('<i data-date-icon="icon-calendar"></i>') }}                    </div>                    {{--<div id="end_date_picker" class="input-append date datepicker" disabled="disabled">--}}                        {{ Former::text('end_date')->readonly()                        ->label('End Date')                        ->value( $workshop->date )                        ->append('<i data-date-icon="icon-calendar"></i>') }}                        {{--</div>--}}                        {{ Former::checkbox('paynow', 'Pay Now') }}                    <div class="controls control-group form-group">                        {{ Former::submit('Submit')->class('btn btn-success') }}                        <a class="btn btn-success" href="{{ URL::to('/myworkshops') }}">Cancel</a>                    </div>                    {{ Former::close() }}                </div>            </div>            <script type="text/javascript"                    src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">            </script>             <script type="text/javascript"                    src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">            </script>            <script type="text/javascript"                    src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">            </script>            <script type="text/javascript"                    src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">            </script>            <script type="text/javascript">                $('.datepicker').datetimepicker({                        format: 'yyyy-MM-dd',                        pickTime: false,                        pickDate: true,                        language: 'en',                        showToday: true,                        minDate: new Date()                });            </script>            @stop