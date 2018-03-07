medicineBox.service('loginService', [function () {
    this.checkTime = function () {
        var token = localStorage.getItem('authorization') || '';
        var jti = localStorage.getItem('jti') || '';
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
            }
        });
    };
    this.checkLoginStatus = function () {
        var token = localStorage.getItem('authorization') || '';
        var jti = localStorage.getItem('jti') || '';
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
                if (data.result === 'true') {
                    window.location.href = 'main';
                }
            }
        });
    };
    this.logout = function () {
        localStorage.removeItem('authorization');
        localStorage.removeItem('jti');
    }
}]);