<!-- Begin page content -->
<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
<!-- Workshop Advertisments -->
  <div class="col-sm-3 col-sm-push-9"><div class="list-group">
	  <a href="#" class="list-group-item">
	    <h4 class="list-group-item-heading">Workshop Title</h4>
	    <p class="list-group-item-text">
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			RSVPs<br>
			Food & Drinks:<br></p>
	  </a>
	  <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			RSVPs:<br>
			Food & Drinks:<br></p>
	  </a>
	  <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Workshop Title</h4>
			<p class="list-group-item-text">
			Date:<br>
			Time:<br>
			Venue:<br>
			Price:<br>
			RSVPs<br>
			Food & Drinks:<br></p>
	  </a>
	</div>
  </div>
<!--   Types of services & Domestic Violence -->
  <div class="col-sm-9 col-sm-pull-3">
    <!--<div class="page-header" id="services">
	  <h3>Find help for domestic violence!</h1>
	</div>
	<p>What problems are you facing? Find out which services you need and contact them.</p>--> 
<!-- 	Types of Domestic Violence -->
	<div class="col-sm-8 col-sm-push-4">
	    <div class="col-4 col-sm-4">
      <h4>Emotional Abuse</h4>
      <p>name-calling, insults, constant criticism, silent treatment</p>
      <p><a id="emotional" class="btn btn-default" onclick="showEmotional()" role="button">I need help in...</a></p>
    </div><!--/span-->
    <div class="col-4 col-sm-4"> 
      <h4>Financial Abuse</h4>
      <p>withholding money, forcing total control over victims earned income, forbidding employment</p>
      <p><a id="financial" class="btn btn-default" role="button">I need help in...</a></p>
		</div><!--/span-->
		<div class="col-4 col-sm-4">
      <h4>Physical Abuse</h4>
      <p>slapping, hitting, beating, kicking, arm twisting, punching, stabbing</p>
      <p><a id="physical" class="btn btn-default" role="button">I need help in...</a></p>
		</div><!--/span-->
		<div class="col-4 col-sm-5">
      <h4>Psychological Abuse</h4>
      <p>intimidation, damaging property, stalking, isolating from friends and family</p>
      <p><a id="psychological" class="btn btn-default" role="button">I need help in...</a></p>
    </div><!--/span-->
		<div class="col-4 col-sm-5">
      <h4>Sexual Abuse</h4>
      <p>marital rape, forced sex after physical abuse, forced prostitution</p>
      <p><a id="sexual" class="btn btn-default" role="button">I need help in...</a></p>
    </div><!--/span--><!--
		<div class="active col-6 col-sm-6 col-sm-3">
      <h4>CONTACT HELP</h4>
      <p>Police</p>
    </div><!--/span-->
	</div>

<!-- 	Types of Services -->
	<div class="col-sm-4 col-sm-pull-8">
	  <div class="list-group">
		<a id="family_law" href="services/familylaw" class="list-group-item">Family Law</a>
		<a id="accommodation" href="services/accommodation" class="list-group-item">Accommodation</a>
		<a id="fitness" href="services/fitnessandnutition" class="list-group-item">Fitness & Nutrition</a>
		<a id="mental_wellbeing" href="services/mentalwellbeing" class="list-group-item">Mental Wellbeing, Counselling</a>
		<a id="financial_advice" href="services/financialadvice" class="list-group-item">Financial Advice</a>
		<a href="#" class="list-group-item">Workshops</a>
<!-- 		Domestic Violence Help Contact Numbers -->
		<a class="list-group-item">
		  <strong>CONTACT HELP</strong>
		  <br>
		  Police 000
		  <br>
		  Australia 24/7 Support 
		  <br>
		  1800 RESPECT 
		  <br>
		  1800 737 732
		</a>
	  </div>
	</div>
<!-- 	Private Browsing Instructions -->
	<h4>Private Browsing</h4>
	<p>
	  It is important that you remain safe and do not put yourself at risk of harm.
	  You may not want anyone including your partner to know you have visited this website, either for safety, privacy or other reasons.
	  One way is to remove traces on your browser. Click "Learn how" below for detailed instructions.
	</p>
	<p><a class="btn btn-default" href="privatebrowsing" role="button">Learn how</a></p>
  </div>
</div>
<hr>

<!-- Controls the highlight effect for relevant services for specific types of domestic violence -->
<script>
// Highlights emotional and psychological services
  function showEmotional() {
	$("a#emotional").toggleClass("active");
	$("a#family_law").toggleClass("active");
	$("a#fitness").toggleClass("active");
	$("a#mental_wellbeing").toggleClass("active");
  }
</script>