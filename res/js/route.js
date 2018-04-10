medicineBox.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
    $locationProvider.html5Mode(true);
    $locationProvider.hashPrefix('');
    $routeProvider
        .when('/main', {
            templateUrl: 'main.page',
            controller: 'mainCtrl'
        })
        .when('/manage', {
            templateUrl: 'manage.page',
            controller: 'manageCtrl'
        })
        .when('/diagnosis', {
            templateUrl: 'diagnosis.page',
            controller: 'diagnosisCtrl'
        })
        .when('/efficacy', {
            templateUrl: 'efficacy.page'
        })
        .when('/recording', {
            templateUrl: 'recording.page',
            controller: 'recordingCtrl'
        })
        .when('/recording/new', {
            templateUrl: 'new.page',
            controller: 'newRecordingCtrl'
        })
        .when('/recording/search', {
            templateUrl: 'search.page',
            controller: 'searchRecordingCtrl'
        })
        .when('/diet', {
            templateUrl: 'diet.page'
        })
        .when('/exercise', {
            templateUrl: 'exercise.page'
        })
        .otherwise({
            redirectTo: '/main'
        })
}]);