
@extends('layouts.main')

@section('title')
<title>Isha SoulAce - Home</title>
@stop

@section('main')

<!-- Begin page content -->
<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->

<!--<figure align='middle'>
  {{ HTML::image('images/logo/Isha SoulAce_Red-Font.png', '',array('style' => 'height:100px')) }}
</figure>-->
<style>
.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
z-index: 2;
color: #555;
background-color: #c9302c;
border-color: white;
color: white;
}
</style>
<div class="row-fluid">
<!--   Types of services & Domestic Violence -->
  <div class="span9"><!--class="col-sm-9 col-sm-pull-3"  style="z-index:0;">-->
  
<!-- 	Types of Services -->
	<div class="span4"><!--"col-sm-4 col-sm-pull-8">-->
	  <div class="list-group">
		<a id="family_law" href="services/familylaw" class="list-group-item">Family Law</a>
		<a id="accommodation" href="services/accommodation" class="list-group-item">Accommodation</a>
		<a id="fitness" href="services/fitnessandnutrition" class="list-group-item">Fitness & Nutrition</a>
		<a id="mental_wellbeing" href="services/mentalwellbeing" class="list-group-item">Mental Wellbeing, Counselling</a>
		<a id="financial_advice" href="services/financialadvice" class="list-group-item">Financial Advice</a>
		<a id="mentors" href="services/mentors" class="list-group-item">Support Networks & Mentors</a>
        <a href="{{ URL::to('/workshoplist') }}" class="list-group-item">Workshops</a>
<!-- 		Domestic Violence Help Contact Numbers -->
		<a id="help" class="list-group-item">
		  <strong>Australia 24/7 Support Telephone Line</strong>
		  <br>
		  1800 RESPECT 
		  <br>
		  1800 737 732
		</a>
	  </div>
	</div>
<!-- 	Types of Domestic Violence -->
	<div class="span8"><!--"col-sm-8 col-sm-push-4" >-->
	  <div class="span4">
      <h4>Psychological Abuse</h4>
<!--       <p>name-calling, insults, constant criticism, silent treatment</p> -->
	  <figure>
		{{ HTML::image('img/psychological.png', '',array('style' => 'height:80px')) }}
	  </figure>
      <a id="emotional" class="btn btn-danger" style="margin-top:10px" onclick="showEmotional()" role="button">Seek help</a>
    </div><!--/span-->
    <div class="span4"> 
      <h4>Financial Abuse</h4>
<!--       <p>withholding money, forcing total control over victims earned income, forbidding employment</p> -->
	  <figure>
		{{ HTML::image('img/financial.png', '',array('style' => 'height:80px')) }}
	  </figure>
      <p><a id="financial" class="btn btn-danger" style="margin-top:10px" onclick="showFinancial()" role="button">Seek help</a></p>
	</div><!--/span-->
	<div class="span4">
      <h4>Sexual Abuse</h4>
<!--       <p>slapping, hitting, beating, kicking, arm twisting, punching, stabbing</p> -->
	  <figure>
		{{ HTML::image('img/sexual.png', '',array('style' => 'height:80px')) }}
	  </figure>
      <p><a id="physical" class="btn btn-danger" style="margin-top:10px" onclick="showPhysical()" role="button">Seek help</a></p>
	</div><!--/span-->
	<div class="span12 panel panel-danger"><!--well auth-box">-->
	  <div class="panel-heading text-center"><h5><strong>IF YOU ARE IN IMMEDIATE DANGER AND UNSAFE</strong></h5></div>
	  <div class="panel-body text-center"><strong>CALL POLICE NOW - "000"</strong></div>
	</div>
	<div class="span5">
      <h4>Emotional Abuse</h4>
<!--       <p>intimidation, damaging property, stalking, isolating from friends and family</p> -->
	  <figure>
		{{ HTML::image('img/emotional.png', '',array('style' => 'height:80px')) }}
	  </figure>
      <p><a id="psychological" class="btn btn-danger" style="margin-top:10px" onclick="showPsychological()" role="button">Seek help</a></p>
    </div><!--/span-->
	<div class="span5">
      <h4>Physical Abuse</h4>
<!--       <p>marital rape, forced sex after physical abuse, forced prostitution</p> -->
	  <figure>
		{{ HTML::image('img/physical.png', '',array('style' => 'height:80px')) }}
	  </figure>
      <p><a id="sexual" class="btn btn-danger" style="margin-top:10px" onclick="showSexual()" role="button">Seek help</a></p>
    </div><!--/span--><!--
		<div class="active col-6 col-sm-6 col-sm-3">
      <h4>CONTACT HELP</h4>
      <p>Police</p>
    </div><!--/span-->
	</div>

<!-- 	Private Browsing Instructions -->
	<div class="col-sm-12"> 
	<h4>Private Browsing</h4>
	<p>
	  It is important that you remain safe and do not put yourself at risk of harm.
	  You may not want anyone including your partner to know you have visited this website, either for safety, privacy or other reasons.
	  One way is to remove traces on your browser. Click "Learn how" below for detailed instructions.
	</p>
	<p><a class="btn btn-default" href="privatebrowsing" role="button">Learn how</a></p>
	</div>
  </div>
  
  <!-- Workshop Advertisments -->
  <div class="span3"><!--"col-sm-3 col-sm-push-9">-->
  <div class="list-group">
	  <a href="#" class="list-group-item">
	    <h4 class="list-group-item-heading">Workshop Title  <span class="label label-danger pull-right">Featured</span></h4>
	    <p class="list-group-item-text">
			Date & Time:  <span class="label label-warning pull-right">Top Rated</span><br>
			Venue:<br>
			Price:<br>
			RSVPs<br>
			Food & Drinks Provided<br></p>
	  </a>
	  <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			RSVPs:<br></p>
	  </a>
	  <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Date & Time:<br>
			Venue:<br>
			Price:<br>
			RSVPs<br></p>
	  </a>
	  <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Date & Time: <br>
			Venue:<br>
			Price:<br>
			RSVPs<br></p>
	  </a>
	</div>
  </div>
</div>


<!-- Controls the highlight effect for relevant services for specific types of domestic violence -->
<script>
// Toggles services for different types of domestic violence
  function toggleEmotional() {
	$("a#family_law").toggleClass("active");
	$("a#fitness").toggleClass("active");
	$("a#mental_wellbeing").toggleClass("active");
  }
  function togglePsychological() {
	$("a#family_law").toggleClass("active");
	$("a#fitness").toggleClass("active");
	$("a#mental_wellbeing").toggleClass("active");
	$("a#help").toggleClass("active");
  }
  function togglePhysicalAndSexual() {
	$("a#family_law").toggleClass("active");
	$("a#accommodation").toggleClass("active");
	$("a#help").toggleClass("active");
  }
  
  function toggleFinancial() {
	$("a#family_law").toggleClass("active");
	$("a#financial_advice").toggleClass("active");
  }
// Highlights emotional services
  function showEmotional() {
	if ($("a#physical").hasClass("active")) {
	  showPhysical();
	} else if ($("a#financial").hasClass("active")) {
	  showFinancial();
	} else if ($("a#psychological").hasClass("active")) {
	  showPsychological();
	} else if ($("a#sexual").hasClass("active")) {
	  showSexual();
	} 
	$("a#emotional").toggleClass("active");
	toggleEmotional();
  }
  
  function showFinancial() {
	if ($("a#physical").hasClass("active")) {
	  showPhysical();
	} else if ($("a#emotional").hasClass("active")) {
	  showEmotional();
	} else if ($("a#psychological").hasClass("active")) {
	  showPsychological();
	} else if ($("a#sexual").hasClass("active")) {
	  showSexual();
	}
	$("a#financial").toggleClass("active");
	toggleFinancial();
	
  }
  function showPsychological() {
	if ($("a#physical").hasClass("active")) {
	  showPhysical();
	} else if ($("a#financial").hasClass("active")) {
	  showFinancial();
	} else if ($("a#emotional").hasClass("active")) {
	  showEmotional();
	} else if ($("a#sexual").hasClass("active")) {
	  showSexual();
	}
	$("a#psychological").toggleClass("active");
	togglePsychological();
}
  
  function showPhysical() {
	if ($("a#emotional").hasClass("active")) {
	  showEmotional();
	} else if ($("a#financial").hasClass("active")) {
	  showFinancial();
	} else if ($("a#psychological").hasClass("active")) {
	  showPsychological();
	} else if ($("a#sexual").hasClass("active")) {
	  showSexual();
	}
	$("a#physical").toggleClass("active");
	togglePhysicalAndSexual();
  }
  
  function showSexual() {
	if ($("a#physical").hasClass("active")) {
	  showPhysical();
	} else if ($("a#financial").hasClass("active")) {
	  showFinancial();
	} else if ($("a#psychological").hasClass("active")) {
	  showPsychological();
	} else if ($("a#emotional").hasClass("active")) {
	  showEmotional();
	}
	$("a#sexual").toggleClass("active");
	togglePhysicalAndSexual();
  }
</script>

<hr>

@stop
