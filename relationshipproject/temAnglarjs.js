<!--
	NEW COMMENT FORM =============================================== -->
	<!--<form ng-submit="submitWorkshop()"> <!-- ng-submit will disable the default form action and use our function -->

		<!-- AUTHOR -->
		<div class="form-group">
			<input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="Name">
		</div>

		<!-- COMMENT TEXT -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="comment" ng-model="commentData.text" placeholder="Say what you have to say">
		</div>
		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</div>
	</form>

	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE COMMENTS =============================================== -->
	<!-- hide these comments if the loading variable is true -->
	<div class="workshop" ng-hide="loading" ng-repeat="workshop in workshops">
        <h3>workshop #<% workshop.id %> <small>by <% workshop.topic %> </h3>
            <p><% workshop.descrition %></p>

		<p><a href="#" ng-click="deleteWorkshop(workshop.id)" class="text-muted">Delete</a></p>
	</div>

    -->
