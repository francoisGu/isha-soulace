@extends('layouts.main')

@section('main')
<div class="row-fluid">
  <div class="span3">
    <div class="panel panel-success" style="min-height:200px;">
      <div class="panel-heading">
        <h3 class="panel-title">
            Welcome,
        </h3>
      </div>
      <ul class="list-group">

          

            <a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>

            
            <a id="reviewPage" href="review" class="list-group-item">Review the website</a>
            <a id="clientsPage" href="clients" class="list-group-item">Clients</a>
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
