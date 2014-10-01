@extends('layouts.main')

@section('main')
<div class="row-fluid">
  <div class="span3">
    <div class="panel panel-success" style="min-height:200px;">
      <div class="panel-heading">
        <h3 class="panel-title">
            Welcome, {{ Sentry::getUser()->firstName }}
        </h3>
      </div>
      <ul class="list-group">

          <a id="profilePage" href="{{ URL::to('serviceProviders/' . Sentry::getUser()->id) }}" class="list-group-item active">Profile</a>

            <a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>

            <a id="myWorkshopsPage" href="{{ URL::to('/myworkshops/') }}" class="list-group-item">My workshops</a>
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

<script type="text/javascript">

function submitForm() {
  document.getElementById("forms").disabled = "disabled";
  document.getElementById("submit").style.display = "none";
  document.getElementById("cancel").style.display = "none";
  document.getElementById("edit").style.display = "";
}
function cancelForm() {
  window.location.reload();
}
function inputChange() {
  document.getElementById("forms").disabled = "";
  document.getElementById("submit").style.display = "";
  document.getElementById("cancel").style.display = "";
  document.getElementById("edit").style.display = "none";
}
</script>

@stop
