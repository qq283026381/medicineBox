$(document).on('click', function (e) {
    var btn = $('#mb-navbar-btn');
    if (!btn.hasClass('collapsed')) {
        if ($(e.target).closest('nav').length === 0) {
            btn.click();
        }
    }
});
medicineBox.controller('indexCtrl', ['$scope', 'loginService', '$window', 'toaster', function ($scope, loginService, $window, toaster) {
    loginService.checkTime();
    /**
     * 5分钟检查一次登录状态
     */
    setInterval(function () {
        loginService.checkTime();
    }, 300000);
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
    };
    $scope.logout = function () {
        loginService.logout();
        toaster.pop('info', '', '注销成功');
        setTimeout(function () {
            window.location.href = 'login.html';
        }, 500);
    }
}]);