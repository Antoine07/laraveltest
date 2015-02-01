'use strict';
var app = angular.module('myApp', ['ngRoute']);

// routing
app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/apero/', {
            controller: 'postsController',
            templateUrl: '/assets/templates/home.html'
        })
        .when('/apero/:id', {
            controller: 'itemController',
            templateUrl: '/assets/templates/item.html'
        });
}]);

app.factory('loaderService', ['$http', function ($http) {
    return {
        getAll: function () {
            //return $http.get('http://www.filltext.com/?rows=10&delay=5&fname={firstName}&lname={lastName}&pretty=true');
            return $http.get('http://laraveltest.local/api/posts');
        },
        getOne: function (id) {
            return $http.get('http://laraveltest.local/api/posts/'+id);
        }
    };

}]);

app.controller('postsController', ['$scope', 'loaderService', function ($scope, loaderService) {

    $scope.loading = true;

    loaderService.getAll().success(function (data, status) {
        $scope.posts = data.posts;
        //console.log($scope.posts);
        $scope.loading = false;
    });

}]);

app.controller('itemController', 'loadService' ['$scope', 'loaderService', function ($scope) {

    loaderService.getOne(2).success(function (data, status) {
        $scope.post = data.post;
        //console.log($scope.post);
    });

}]);

//app.directive('decoratePost', function () {
//    return {
//        templateUrl: 'assets/templates/directive/decorator.html',
//        restrict: 'E'
//    }
//});



