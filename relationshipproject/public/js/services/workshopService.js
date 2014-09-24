	// public/js/services/commentService.js
angular.module('workshopService', [])

	.factory('Workshop', function($http) {

		return {
			// get all the comments
			get : function() {
				return $http.get('/api/workshops/');
			},

			// save a comment (pass in comment data)
			save : function(workshopData) {
				return $http({
					method: 'POST',
					url: '/api/comments',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(workshopData)
				});
			},

			// destroy a comment
			destroy : function(id) {
				return $http.delete('/api/workshops/' + id);
			}
		}

	});
	
