{{ HTML::style('css/plugins/bootstrap.css') }}
{{ HTML::style('css/bootstrap-responsive.css') }}
<style>
.lead { font-size: 33px;margin-bottom:0px; }
</style>

<div class="row">
    <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="text-center">
                        Dear client, this is your Ticket:</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>{{'Ticket Number: '. $ticketNumber}}</strong></p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>{{'Workshop: '. $topic}}</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>{{'Venue: '. $unit.'/'.$street_number.' '.$street_name.' '.$street_type.', '.$suburb.', '.$state}}</li>                    <li class="list-group-item"><i class="icon-ok text-danger"></i>{{'Postcode: '. $postcode}}</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>{{'Date: '. $date}}</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>{{'Time:'. $start_time. '~'. $end_time}}</li>
                </ul>
                <h4 class="text-center">
                        (Attention: Please keep this ticket carefully.)</h4>
            </div>
        </div>         
</div>


