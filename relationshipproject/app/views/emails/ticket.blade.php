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
                        Ticket</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>{{$title}}</strong></p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Personal use</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Unlimited projects</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>27/7 support</li>
                </ul>
            </div>
        </div>         
</div>


