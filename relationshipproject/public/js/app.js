var workshopApp = angular.module('workshopApp', ['workshopCtrl',
        'workshopService'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
