	// public/js/controllers/mainCtrl.js
angular.module('workshopCtrl', [])

	// inject the Comment service into our controller
	.controller('workshopController', function($scope, $http, Workshop) {
		// object to hold all the data for the new comment form
		$scope.workshopData = {};

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		// get all the comments first and bind it to the $scope.comments object
		// use the function we created in our service
		// GET ALL COMMENTS ====================================================
		Workshop.get()
			.success(function(data) {
				$scope.workshops = data;
				$scope.loading = false;
			});

		// function to handle submitting the form
		// SAVE A COMMENT ======================================================
		$scope.submitWorkshop = function() {
			$scope.loading = true;

			// save the comment. pass in comment data from the form
			// use the function we created in our service
			Workshop.save($scope.workshopData)
				.success(function(data) {

					// if successful, we'll need to refresh the comment list
					Workshop.get()
						.success(function(getData) {
							$scope.workshops = getData;
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});
		};

		// function to handle deleting a comment
		// DELETE A COMMENT ====================================================
		$scope.deleteWorkshop = function(id) {
			$scope.loading = true; 

			// use the function we created in our service
			Workshop.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the comment list
					Comment.get()
						.success(function(getData) {
							$scope.workshops = getData;
							$scope.loading = false;
						});

				});
		};

	});
	
