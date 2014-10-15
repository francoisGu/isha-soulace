@extends('layouts.main')

@section('main')

{{ HTML::style('css/list.css') }}
<div class="container auth">
    <h1 class="text-center"><span>Here is the list of workshops you may need.</span> </h1>
    <div id="big-form" class="well auth-box">

            <ul>
                @foreach($errors->all() as $error)
                <li style="color:red; margin-left: 50px;">{{ $error }}</li>
                @endforeach
            </ul>


        <div class="row">
            <div class="col-md-12 " > 
                <!-- options for service type-->                            
                {{ Form::open(array('method' => 'POST', 'url' => '/workshoplist')) }}

                {{ Form::label('type', 'Workshop Type: ', array('style'=>'margin-left: 5%;', 'class'=>'form-inline')) }}
                {{ Form::select('type', array_merge($types, array(' ' => ' ')), ' ') }}

                {{ Form::label('postcode', 'Postcode: ', array('style'=>'margin-left: 3%;', 'class'=>'form-inline')) }}
                {{ Form::text('postcode') }}

                {{ Form::label('search', " ", array('style'=>'margin-left: 3%;', 'class'=>'form-inline')) }}
                {{ Former::submit('search', 'Search')->class('btn btn-small btn-success btn-outline') }}

                {{ Form::close() }}
            </div>
            <div style="padding: 50px;">
             <!--list here-->
             <div class="list-group" >

            @foreach($workshops as $workshop)

              <a href="#" class="list-group-item">
                <div class="col-md-9">
                    <h4 class="list-group-item-heading"> {{ $workshop->topic }} </h4>
                    <p class="list-group-item-text"> <strong class="col-md-3">Service Provider: </strong>
                        @if( $workshop->serviceProvider->identity )
                
                            <div class="col-md-9">
                            {{ $workshop->serviceProvider->companyName }}
                            </div>
                        @else

                            <div class="col-md-9">
                            {{ $workshop->serviceProvider->first_name . ' ' . $workshop->serviceProvider->last_name }}
                            </div>

                        @endif
                        
                    </p>
                    <p class="list-group-item-text"><strong class="col-md-3">Type: </strong><div class="col-md-9"> {{ $workshop->class }} </div></p>
                    <p class="list-group-item-text"><strong class="col-md-3">Descritption: </strong><div class="col-md-9"> {{ $workshop->description }} </div></p>
                    <p class="list-group-item-text"><strong class="col-md-3">Date: </strong><div class="col-md-9"> {{ $workshop->date }} </div></p>
                    <p class="list-group-item-text"><strong class="col-md-3">Start Time: </strong><div class="col-md-9"> {{ $workshop->start_time }} </div></p>
                    <p class="list-group-item-text"><strong class="col-md-3">End Time: </strong><div class="col-md-9"> {{ $workshop->end_time }} </div></p>
                    <p class="list-group-item-text"><strong class="col-md-3">Venue: </strong><div class="col-md-9"> {{ $workshop->unit.'/'.$workshop->street_number.' '.$workshop->street_name. ' ' . $workshop->street_type.', '.$workshop->suburb.', '. $workshop->state.', '. $workshop->postcode }} </div></p>
                    <p class="list-group-item-text"><strong class="col-md-3">Price: </strong><div class="col-md-9">AU$ {{ $workshop->price }} </div></p>
                    <p class="list-group-item-text"><strong class="col-md-3">Ticket Left: </strong><div class="col-md-9"> {{ $workshop->ticket_number }} </div></p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <p> Average 4.5 <small> / </small> 5 </p>
                    <button id='pay' type="button" class="btn btn-default btn-lg btn-block" href="#">Register & Pay</button>
                </div>
            </a>

            @endforeach

        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
@stop



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/offcanvas.js') }}

