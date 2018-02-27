medicineBox.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
    $locationProvider.html5Mode(true);
    $locationProvider.hashPrefix('');
    $routeProvider
        .when('/main', {
            templateUrl: 'main.page',
            controller:'mainCtrl'
        })
        .otherwise({
            redirectTo: '/main'
        })
}]);