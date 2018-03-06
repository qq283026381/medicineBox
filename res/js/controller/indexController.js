var token = localStorage.getItem('authorization')||'';
var jti = localStorage.getItem('jti')||'';
$.ajax({
    url: 'ValidateTime.do',
    method: 'post',
    async: false,
    data: {
        'token': token,
        'jti': jti
    },
    dataType: 'json',
    success: function (data) {
        if (data.result !== 'true') {
            alert('登录失效，请重新登陆');
            window.location.href = 'login.html';
        }
    },
    error: function (jqXHR) {
        console.log(jqXHR);
    }
});
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