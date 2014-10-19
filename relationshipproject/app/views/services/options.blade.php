<!-- Begin page content -->
<div class="page-header">
	<h3>Choose an expert</h3>
</div>
      <p>Select one of the following experts to contact. The form you just completed will be sent to them.</p>
<div class="container">
  <div class="row">
    <div style="padding: 10px;">
      <div class="list-group span8" >

          @if(count($serviceProviders) == 0 )

          <p class="list-group-item-text"> <strong style="color:red;"> Sorry! No service providers found. </strong></p>
          @else
          @foreach($serviceProviders as $sp)

        <a href="#" class="list-group-item col-md-12">
          <div class="col-md-9">
              @if( $sp->identity )
              <h4 class="list-group-item-heading"> <strong> Company Name: </strong>{{ $sp->companyName }} </h4>
              @else
              <h4 class="list-group-item-heading"> <strong> Name: </strong>{{ $sp->first_name . ' ' . $sp->last_name }} </h4>
              @endif
              @if($sp->mode)
              <p class="list-group-item-text"> <strong> Price </strong>{{ $sp->price . ' per Session'}}</p>
              @else
              <p class="list-group-item-text"> <strong> Price </strong>{{ $sp->price . ' per Hour'}}</p>
              @endif

              <p class="list-group-item-text"> <strong> Negotiable: </strong>{{ $sp->negotiable? 'Yes': 'No'; }} </p>
          </div>
          <div class="col-md-3 text-center">
            <div class="stars">
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
            </div>
            <p> Average 4 <small> / </small> 5 </p>
			<button type="button" class="btn btn-danger btn-block"> Send Form</button>
          </div>
        </a>

        @endforeach
        @endif

      </div>
      <!-- Workshop Advertisments -->
  <div class="span3"><!--"col-sm-3 col-sm-push-9">-->
  <div class="list-group">

    @foreach( WorkshopAdvertisement::getAdvertisements(3, 'general') as $ad)

    @if($ad->workshop)

    <a href="{{ URL::to('workshoplist/' . $ad->workshop->id) }}" class="list-group-item">
          <h4 class="list-group-item-heading"> {{ $ad->workshop->topic }} </h4>
	    <p class="list-group-item-text">
            <strong>Date & Time:</strong> <br/>{{ $ad->workshop->date . ' ' . $ad->workshop->start_time . ' - ' . $ad->workshop->end_time }} <br>
            <strong>Venue:</strong> {{ Map::getVenue($ad->workshop) }}<br>
            <strong>Price:</strong>{{ ' AU$'. $ad->workshop->price }}<br>
            <strong>RSVPs:</strong>{{ $ad->workshop->ticket_number }}<br>
            @if($ad->workshop->food)
            <br/>
            <strong>Food & Drinks Provided</strong><br>
            @endif
        </p>
	  </a>
    @endif

    @endforeach
	</div>
  </div>
    </div>
  </div>
</div>
