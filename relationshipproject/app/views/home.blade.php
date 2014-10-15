@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Home</title>
@stop

@section('main')

<!-- Begin page content -->
<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
<!-- Workshop Advertisments -->
  <div class="col-md-3 col-md-push-9"><div class="list-group">
	  <a href="#" class="list-group-item">
	    <h4 class="list-group-item-heading">Workshop Title</h4>
	    <p class="list-group-item-text">
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
	  </a>
	  <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
	  </a>
	  <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			Tickets left:<br>
			Food & Drinks:<br></p>
	  </a>
	</div>
  </div>
<!--   Types of services & Domestic Violence -->
  <div class="col-md-9 col-md-pull-3">
    <!--<div class="page-header" id="services">
	  <h3>Find help for domestic violence!</h1>
	</div>
	<p>What problems are you facing? Find out which services you need and contact them.</p>--> 
<!-- 	Types of Domestic Violence -->
	<div class="col-md-8 col-md-push-4">
	    <div class="col-6 col-sm-6 col-lg-3">
      <h4>Emotional Abuse</h4>
      <p>Legal services for family matters.</p>
      <p><a class="btn btn-default" href="services/familylaw" role="button">Consult &raquo;</a></p>
    </div><!--/span-->
    <div class="col-6 col-sm-6 col-lg-3"> 
      <h4>Financial Abuse</h4>
      <p>Housing and lodgings</p>
      <p><a class="btn btn-default" href="services/accommodation" role="button">Consult &raquo;</a></p>
		</div><!--/span-->
		<div class="col-6 col-sm-6 col-lg-3">
      <h4>Physical Abuse</h4>
      <p>Healthy exercise and diets</p>
      <p><a class="btn btn-default" href="services/fitnessandnutrition" role="button">Consult &raquo;</a></p>
		</div><!--/span-->
		<div class="col-6 col-sm-6 col-lg-3">
      <h4>Psychological Abuse</h4>
      <p>Overcome psychological problems and build self esteem</p>
      <p><a class="btn btn-default" href="services/mentalwellbeing" role="button">Consult &raquo;</a></p>
    </div><!--/span-->
		<div class="col-6 col-sm-6 col-lg-3">
      <h4>Sexual Abuse</h4>
      <p>Property settlement, mortage and other financial matters</p>
      <p><a class="btn btn-default" href="services/financialadvice" role="button">Consult &raquo;</a></p>
    </div><!--/span-->
		<div class="col-6 col-sm-6 col-lg-3">
      <h4>HELP</h4>
      <p>Build skills for employment</p>
      <p><a class="btn btn-default" href="#" role="button">Consult &raquo;</a></p>
    </div><!--/span-->
	</div>
<!-- 	Types of Services -->
	<div class="col-md-4 col-md-pull-8">
	  <div class="list-group">
		<a href="services/familylaw" class="list-group-item">Family Law &raquo;</a>
		<a href="services/accommodation" class="list-group-item">Accommodation &raquo;</a>
		<a href="services/fitnessandnutition" class="list-group-item">Fitness & Nutrition &raquo;</a>
		<a href="services/mentalwellbeing" class="list-group-item">Mental Wellbeing, Counselling &raquo;</a>
		<a href="services/financialadvice" class="list-group-item">Financial Advice &raquo;</a>
		<a href="#" class="list-group-item">Workshops &raquo;</a>
	  </div>
	</div>
  </div>
</div>
<hr>

@stop
