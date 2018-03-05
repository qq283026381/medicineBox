medicineBox.controller('loginCtrl', ['$scope', '$http', 'toaster', '$interval', 'loginService', '$window', function ($scope, $http, toaster, $interval, loginService, $window) {
    //登录信息初始化
    $scope.login = {
        name: '',
        pwd: ''
    };
    //注册信息初始化
    $scope.register = {
        name: '',
        pwd: '',
        pwdRepeat: '',
        email: '',
        phone: '',
        code: '',
        error: {
            name: false,
            pwd: false,
            pwdRepeat: false,
            email: false,
            phone: false,
            code: false,
            correct: false,
            emailFormat: false
        }
    };
    $scope.codeInfo = '获取验证码';
    $scope.codeBtn = false;
    /***
     * 登录验证方法
     */
    $scope.checkLogin = function () {
        $scope.login.pwd = md5($scope.login.pwd);
        $http.post('Login.do', $scope.login).then(function (t) {
            $scope.login.pwd = '';
            if (t.data.token) {
                localStorage.setItem('authorization', t.data.token);
                localStorage.setItem('jti', t.data.jti);
                toaster.pop('success', '恭喜', '登录成功');

                setTimeout(function () {
                    $window.location.href = 'main';
                }, 500);
            } else {
                toaster.pop('error', '抱歉', t.data.data + '或密码填写有误');
            }
        });
    };
    /***
     * 监听确认密码的输入情况
     * 当确认密码和设置密码输入不相同时，弹出错误提示
     * 当两次输入密码相同时，取消错误提示
     */
    var pwdRepeatWatcher = $scope.$watch('register.pwdRepeat', function (newValue) {
        if ($scope.register.pwd !== '')
            if (newValue !== $scope.register.pwd) {
                $scope.register.error.pwdRepeat = true;
                $scope.register.error.correct = true;
            } else {
                $scope.register.error.pwdRepeat = false;
                $scope.register.error.correct = false;
            }
    });
    /***
     * 监听邮箱输入情况
     * 当邮箱格式输入不正确时，弹出错误提示
     * 当邮箱格式输入正确时，取消错误提示
     */
    var emailFormatWatcher = $scope.$watch('register.email', function (newValue) {
        if ($scope.register.email !== '') {
            var pattern = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
            if (!pattern.test(newValue)) {
                $scope.register.error.emailFormat = true;
                $scope.register.error.email = true;
            } else {
                $scope.register.error.emailFormat = false;
                $scope.register.error.email = false;
            }
        }
    });
    /***
     * 注册方法
     * 对用户输入内容进行内容和格式的判断后对用户进行注册
     */
    $scope.checkRegister = function () {
        /***
         * 监听用户是否输入用户名
         * 当用户输入用户名后，取消监听
         */
        var registerNameWatcher = $scope.$watch('register.name', function (name) {
            if (name === '') {
                $scope.register.error.name = true;
                toaster.pop('error', '', '请输入用户名');
            } else {
                $scope.register.error.name = false;
                registerNameWatcher();
                /***
                 * 监听用户是否输入设置密码
                 * 当用户输入设置密码后，取消监听
                 */
                var registerPwdWatcher = $scope.$watch('register.pwd', function (pwd) {
                    if (pwd === '') {
                        $scope.register.error.pwd = true;
                        toaster.pop('error', '', '请输入密码');
                    } else {
                        $scope.register.error.pwd = false;
                        registerPwdWatcher();
                        /***
                         * 监听用户是否输入确认密码
                         * 当用户输入确认密码并且与设置密码相同后，取消监听
                         */
                        var registerPwdRepeatWatcher = $scope.$watch('register.pwdRepeat', function (pwdRepeat) {
                            if (pwdRepeat === '') {
                                $scope.register.error.pwdRepeat = true;
                                toaster.pop('error', '', '请确认密码');
                            } else {
                                if (!$scope.register.error.correct) {
                                    $scope.register.error.pwdRepeat = false;
                                }
                                registerPwdRepeatWatcher();
                                /***
                                 * 监听用户是否输入邮箱
                                 * 当用户输入格式合法的邮箱后，取消监听
                                 */
                                var registerEmailWatcher = $scope.$watch('register.email', function (email) {
                                    if (email === '') {
                                        $scope.register.error.email = true;
                                        toaster.pop('error', '', '请输入邮箱');
                                    } else {
                                        if (!$scope.register.error.emailFormat) {
                                            $scope.register.error.email = false;
                                        }
                                        registerEmailWatcher();
                                        /***
                                         * 监听用户是否输入手机号
                                         * 当用户输入手机号后，取消监听
                                         */
                                        var registerPhoneWatcher = $scope.$watch('register.phone', function (phone) {
                                            if (phone === '') {
                                                $scope.register.error.phone = true;
                                                toaster.pop('error', '', '请输入手机号');
                                            } else {
                                                $scope.register.error.phone = false;
                                                registerPhoneWatcher();
                                                /***
                                                 * 监听用户是否输入验证码
                                                 * 当用户输入验证码后，取消监听
                                                 */
                                                var registerCodeWatcher = $scope.$watch('register.code', function (code) {
                                                    if (code === '') {
                                                        $scope.register.error.code = true;
                                                        toaster.pop('error', '', '请输入验证码');
                                                    } else {
                                                        $scope.register.error.code = false;
                                                        registerCodeWatcher();
                                                        /***
                                                         * 当以上监听器全部取消后，判断两次输入密码是否相同，以及邮箱格式是否合法
                                                         * 若密码相同且邮箱格式合法，则取消对确认密码和设置邮箱的监听，并对用户信息进行注册
                                                         * TODO 需要对密码进行加密处理，尚未完成后台接口，暂滞空
                                                         */
                                                        if (!$scope.register.error.correct && !$scope.register.error.emailFormat) {
                                                            pwdRepeatWatcher();
                                                            emailFormatWatcher();
                                                            console.log($scope.register);
                                                        }
                                                    }
                                                })
                                            }
                                        })
                                    }
                                })
                            }
                        })
                    }
                })
            }
        });
    };
    /***
     * 获取验证码方法
     * @param $event 处理默认事件
     * 点击获取验证码后，在deadline的时间周期内不允许再次点击
     * TODO 尚未完成后台接口，暂滞空
     */
    $scope.getCode = function ($event) {
        $event.preventDefault();
        var deadline = 30;
        $scope.codeBtn = true;
        $scope.codeInfo = deadline + 's后重新获取';
        $interval(function () {
            if (deadline === 1) {
                $scope.codeInfo = '获取验证码';
                $scope.codeBtn = false;
            } else {
                $scope.codeInfo = --deadline + 's后重新获取';
            }
        }, 1000, deadline)
    }
}]);