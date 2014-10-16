@extends('layouts.main')

@section('main')
<div class="row-fluid">
  <div class="span3">
    <div class="panel panel-success" style="min-height:200px;">
      <div class="panel-heading">
        <h3 class="panel-title">
            Welcome, {{ Sentry::getUser()->first_name }}
        </h3>
      </div>
      <ul class="list-group">

          <a id="profilePage" href="{{ URL::to('serviceProviders/' . Sentry::getUser()->id) }}" class="list-group-item active">Profile</a>

          <!--<a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>-->

            <a id="myWorkshopsPage" href="{{ URL::to('/myworkshops/') }}" class="list-group-item">My workshops</a>
            <a id="reviewPage" href="{{ URL::to('reviews/website') }}" class="list-group-item">Review the website</a>
            <a id="clientsPage" href="{{ URL::to('/myclients/') }}" class="list-group-item">Clients</a>
      </ul>
    </div>
  </div><!--span3-->
  <div class="span9">
    <div id="step1Form" class="panel panel-success" style="min-height:100px;">
      
      @yield('content')

    </div>
  </div>
</div>

@stop
