medicineBox.controller('efficacyCtrl', ['$scope', '$http','loginService', function ($scope, $http,loginService) {
    loginService.checkTime();
    $http.post('GetAllEfficacy.do').then(function (t) {
        console.log(t.data);
        $scope.efficacy = t.data;
        $http.post('GetEfficacyImg.do', {'id': $scope.efficacy.id[0][0][0]}).then(function (data) {
            $scope.efficacyImg = data.data.data;
        });
    });

    $scope.getImg = function (id) {
        $http.post('GetEfficacyImg.do', {'id': id}).then(function (data) {
            $scope.efficacyImg = data.data.data;
        });
    };
    $scope.active = {
        usage: 0,
        type: 0,
        name: 0
    };
    $scope.changeUsage = function (index) {
        $scope.active.usage = index;
        $scope.active.type = 0;
        $scope.active.name = 0;
    };
    $scope.changeType = function (index) {
        $scope.active.type = index;
        $scope.active.name = 0;
    };
    $scope.changeName = function (index) {
        $scope.active.name = index;
    }

}]);