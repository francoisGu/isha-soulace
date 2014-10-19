@extends('layouts.main')

@section('main')

@if($jump_to=Session::get('jump_to'))
{{ HTML::script('js/plugins/dataTables/jquery.js') }}
<script type="text/javascript">
$(window).load(function(){
    window.location = "{{ '#'. $jump_to }}";
    document.getElementById("{{ $jump_to}}").parentNode.style.backgroundColor = 'rgb(104,184,252)';
});
</script>
@endif
<style>
li.list-group-item {
    height:auto;
    min-height:280px;
    word-wrap: break-word;
}
li.list-group-item.active small {
    color:#fff;
}
.stars {
    margin:20px auto 1px;    
}
</style>
<div class="container-fluid auth">
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
                {{ Form::number('postcode')}}

                {{ Form::label('search', " ", array('style'=>'margin-left: 3%;', 'class'=>'form-inline')) }}
                {{ Former::submit('search', 'Search')->class('btn btn-small btn-success btn-outline') }}

                {{ Form::close() }}
            </div>
            <div style="padding: 50px;">
             <!--list here-->
             <ul class="list-group" >

            @foreach($ads as $ad)
            @if( $workshop = $ad->workshop )

            <li class="list-group-item">
                <a id={{ "workshop" . $workshop->id }}></a>
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

                    @if($workshop->food)
                    <br>
                    <p class="list-group-item-text"><div class="col-md-3"></div><strong class="col-md-9"> Food & Drinks provided</strong></p>
                    @endif
                </div>


                <div class="col-md-3 text-left">
                    <div class="stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <p> Average 4.5 <small> / </small> 5 </p>

                    <div class="left-align control-group">
                        <form method="POST" action="{{URL::route('pay-workshop-post')}}" accept-charset="UTF-8">
                            <input name="workshop_id" type="hidden" value="{{$workshop->id}}">
                            <input name="item" type="hidden" value="workshop">            
                            <label for="client_email">Email: <sup>*</sup></label><input type="email" class="input-large text-left form-control" id="client_email" type="text" name="email">
                            <label for="number">Ticket Number: <sup>*</sup></label><input class="input-large form-control" required="true" id="number" type="number" name="amount" min="1" max={{ $workshop->ticket_number }} value="1">
                            {{ Form::token()}}
                    <br>

                    <input class="btn btn-danger btn-outline btn-lg btn-block" type="submit" value="Register &amp; Pay">

                    
                    </form>
                </div>
                </div>
            </li>

            @endif
            @endforeach

            </ul>

            <div class="pull-right">

            <?php echo $ads->links(); ?>
            </div>

        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
@stop



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

