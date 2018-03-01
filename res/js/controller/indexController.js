var login = localStorage.login;
if (login === '' || typeof(login) === 'undefined') {
    alert('请先登录');
    window.location.href = 'login.html'
}
medicineBox.controller('indexCtrl', ['$scope', 'loginService', '$window', function ($scope, loginService, $window) {
    if (($window.location.pathname.split('/')[2]) === 'main' || ($window.location.pathname.split('/')[2]) === '') {
        $scope.currentPage = '';
        sessionStorage.page = '';
    }
    $scope.currentPage = sessionStorage.page ? sessionStorage.page : '';
    $scope.changeNavBar = function (item) {
        console.log(item);
        sessionStorage.page = item;
        $scope.currentPage = item;
        console.log($scope.currentPage);
    }
}]);