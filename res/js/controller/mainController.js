medicineBox.controller('mainCtrl', ['$scope', 'toaster', '$interval','loginService', function ($scope, toaster, $interval,loginService) {
    loginService.checkTime();
}]);