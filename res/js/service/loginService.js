medicineBox.service('loginService', ['$cookies', '$http', function ($cookies, $http) {
    this.getCookie = function (item) {
        return $cookies.get(item);
    };
    this.checkTime = function () {
        $http.post('ValidateTime.do').then(function (t) {
            if (t.data.result !== 'true') {
                alert('登录失效，请重新登陆');
                window.location.href = 'login.html';
            }
        })
    };
    this.checkLoginStatus = function () {
        $http.post('ValidateTime.do').then(function (t) {
            if (t.data.result === 'true') {
                window.location.href = 'main';
            }else{
                logout();
            }
        })
    };
    this.logout = function () {
        $http.post('Logout.do');
    }
}]);