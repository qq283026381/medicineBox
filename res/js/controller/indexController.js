var login = localStorage.login;
if (login === '' || typeof(login) === 'undefined') {
    alert('请先登录');
    window.location.href = 'login.html'
}
$(document).on('click', function (e) {
    var btn = $('#mb-navbar-btn');
    if (!btn.hasClass('collapsed')) {
        if ($(e.target).closest('nav').length === 0) {
            btn.click();
        }
    }
});
medicineBox.controller('indexCtrl', ['$scope', 'loginService', '$window', function ($scope, loginService, $window) {
    if (($window.location.pathname.split('/')[2]) === 'main' || ($window.location.pathname.split('/')[2]) === '') {
        $scope.currentPage = '';
        sessionStorage.page = '';
    }
    $scope.currentPage = sessionStorage.page ? sessionStorage.page : '';
    $scope.changeNavBar = function (item) {
        sessionStorage.page = item;
        $scope.currentPage = item;
        if ($(window).width() <= 768) {
            $('#mb-navbar-btn').click();
        }
    }
}]);