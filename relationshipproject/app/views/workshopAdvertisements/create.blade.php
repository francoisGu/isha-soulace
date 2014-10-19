@extends ('serviceProviders.serviceProviders')@section('content')<link rel="stylesheet" type="text/css" media="screen"href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">{{ HTML::script('js/plugins/dataTables/jquery.js') }}<script>$('.list-group-item').removeClass('active');$('#myWorkshopsPage').addClass('active');</script><div class="panel-heading">    <h3 class="panel-title">        Create Workshop Advertisement    </h3>                  </div><div class="panel-body">    <div class="table-responsive" style="padding:10px;"> @if ($errors->any())<ul>    {{ implode('', $errors->all('<li style="color:red" class="error">:message</li>')) }}</ul>@endif        {{ Former::open()->route('workshopAdvertisements.store') }}        {{ Former::hidden('workshop_id')->value( $workshop->id ) }}        {{ Former::select('type')->label('Type')->options( array('premium'=>'premium', 'general'=>'general')) }}        <div id="datepicker" class="input-append date datepicker">                    {{ Former::text('start_date')                    ->label('Start Date')                    ->placeholder(' yyyy-mm-dd')                    ->class('form-control input-large')                    ->value(WorkshopAdvertisement::getFourWeeksAgo($workshop->date)) }}        </div>                    {{ Former::text('end_date')                    ->label('End Date')                    ->placeholder(' yyyy-mm-dd')                    ->class('form-control input-large')                    ->value($workshop->date)                    ->readonly() }}        {{--<div id="end_date_picker" class="input-append date datepicker" disabled="disabled">--}}        {{--</div>--}}        {{ Former::checkbox('paynow', 'Pay Now') }}        <div class="controls control-group form-group">            {{ Former::submit('Submit')->class('btn btn-success') }}            <a class="btn btn-success" href="{{ URL::to('/myworkshops') }}">Cancel</a>        </div>        {{ Former::close() }}    </div></div>{{ HTML::script('js/plugins/dataTables/jquery.js') }}<script type="text/javascript" src="http://eonasdan.github.io/bootstrap-datetimepicker/scripts/moment.js"></script><script type="text/javascript"src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script><script type="text/javascript">$('.datepicker').datetimepicker({    format: 'YYYY-MM-DD',            pickTime: false,            pickDate: true,            language: 'en'});</script>@stop