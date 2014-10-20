@extends ('serviceProviders.serviceProviders')@section('content')<link rel="stylesheet" type="text/css" media="screen"{{ HTML::script('js/plugins/dataTables/jquery.js') }}{{ HTML::style('css/plugins/dataTables.bootstrap.css') }}<script>$('.list-group-item').removeClass('active');$('#myWorkshopsPage').addClass('active');</script><div class="panel-heading">    <h3 class="panel-title">        View Workshop Details        <a id="edit" style="float:right;margin-right:30px;cursor:pointer;" href="{{ URL::to('/workshops/'.$workshop->id . '/edit') }}">Edit</a>        <a id="back" style="float:right;margin-right:30px;cursor:pointer;" href="{{ URL::to('/myworkshops/') }}">Back</a>    </h3>                  </div><div class="panel-body">    <div class="" style="padding:10px;">            @if ($errors->any())            <ul>                {{ implode('', $errors->all('<li style="color:red" class="error">:message</li>')) }}            </ul>            @endif            {{ Former::open()->populate($workshop)->method('GET') }}        <fieldset id="forms" disabled="disabled">            {{ Former::text('topic')->label('Topic')->class('input-large inputHeight form-control') }}            {{ Former::text('unit')->label('Unit')->class('input-large inputHeight form-control') }}            {{ Former::text('street_number')->label('Street Number')->class('input-large inputHeight form-control') }}            {{ Former::text('street_name')->label('Street Name')->class('input-large inputHeight form-control') }}            {{ Former::text('street_type')->label('Street Type')->class('input-large inputHeight form-control') }}            {{ Former::text('suburb')->label('Suburb/City')->class('input-large inputHeight form-control') }}            {{ Former::text('state')->label('State')->class('input-large inputHeight form-control') }}            {{ Former::number('postcode')->label('Postcode')->class('input-medium inputHeight form-control') }}            {{ Former::textarea( 'description' )->label('Description')->class('input-large inputHeight form-control')->style('width: 210px; height: 100px;')}}                {{ Former::text('date')->label('Date')->placeholder(' yyyy-mm-dd')->id('datepicker') }}                {{ Former::text('start_time')->label('Start Time')->placeholder(' hh:mm')->id('timepicker1') }}                {{ Former::text('end_time')->label('End Time')->placeholder(' hh:mm')->id('timepicker2') }}            {{ Former::text('total_ticket_number')->label('Total Ticket Number')->class('input-sm inputHeight form-control') }}               {{ Former::text('ticket_number')->label('Left Ticket Number')->class('input-sm inputHeight form-control')}}            {{ Former::text('price')->label('Price')->class('input-sm inputHeight form-control') }}               <div class="controls control-group form-group" >                {{ Former::submit('Submit')->class('btn btn-success')->id('submit')->style('display:none;') }}                {{ Former::button('Cancel')->class('btn btn-success')->id('cancel')->style('display:none;')->onclick('cancelForm()') }}                {{-- <a id="cancel" class="button button-success" style="display:none;" href="{{ URL::to('/myworkshops/') }}">Cancel</a> --}}            </div>        </fieldset>        {{ Former::close() }}    </div></div>@stop