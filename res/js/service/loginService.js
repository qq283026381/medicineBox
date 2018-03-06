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
            },
            error: function (jqXHR) {
                console.log(jqXHR);
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
            },
            error: function (jqXHR) {
                console.log(jqXHR);
            }
        });
    }
}]);