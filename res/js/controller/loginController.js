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
            emailFormat: false,
            phoneFormat: false,
            nameFormat: false
        }
    };
    $scope.forget = {
        phone: '',
        code: '',
        pwd: '',
        pwdRepeat: '',
        error: {
            phone: false,
            code: false,
            correct: false,
            pwdRepeat: false,
            pwd: false,
            phoneFormat: false
        }
    };
    $scope.codeInfo = '获取验证码';
    $scope.codeBtn = false;
    loginService.checkLoginStatus();
    /***
     * 登录验证方法
     */
    $scope.checkLogin = function () {
        if ($scope.login.name === '' || angular.isUndefined($scope.login.name)) {
            toaster.pop('error', '抱歉', '请输入用户名');
        } else if ($scope.login.pwd === '' || angular.isUndefined($scope.login.pwd)) {
            toaster.pop('error', '抱歉', '请输入密码');
        } else {
            $scope.login.pwd = md5($scope.login.pwd);
            $http.post('Login.do', $scope.login).then(function (t) {
                $scope.login.pwd = '';
                if (loginService.getCookie('mbs')) {
                    toaster.pop('success', '', '登录成功');
                    setTimeout(function () {
                        $window.location.href = 'main';
                    }, 1000);
                } else {
                    toaster.pop('error', '抱歉', t.data.data + '或密码填写有误');
                }

            });
        }
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
     * 监听手机号输入情况
     * 当手机号位数输入有误时，弹出错误提示
     * 当手机号位数为11位时，取消错误提示
     */
    var phoneFormatWatcher = $scope.$watch('register.phone', function (newValue) {
        if ($scope.register.phone !== '') {
            if (newValue.length !== 11) {
                $scope.register.error.phoneFormat = true;
                $scope.register.error.phone = true;
            } else {
                $scope.register.error.phoneFormat = false;
                $scope.register.error.phone = false;
            }
        }
    });
    /***
     * 监听用户名输入情况
     * 当用户名位数输入有误或者输入符号时，弹出错误提示
     * 当用户名输入位数为3-18位且不含符号时，取消错误提示
     */
    var nameFormatWatcher = $scope.$watch('register.name', function (newValue) {
        var pattern = new RegExp('^[a-zA-Z0-9]{3,18}$');
        if ($scope.register.name !== '') {
            if (newValue.length < 3 || newValue.length > 18 || !pattern.test(newValue)) {
                $scope.register.error.nameFormat = true;
                $scope.register.error.name = true;
            } else {
                $scope.register.error.nameFormat = false;
                $scope.register.error.name = false;
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
                if (!$scope.register.error.nameFormat) {
                    $scope.register.error.name = false;
                }
                registerNameWatcher();
            }
        });
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
            }
        });
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
            }
        });
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
            }
        });
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
            }
        });
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
            }
        });
        /***
         * 当以上监听器全部取消后，判断两次输入密码是否相同、邮箱格式是否合法以及手机号格式输入是否合法
         * 若密码相同、邮箱格式合法且手机号输入合法，则取消对确认密码、设置邮箱和手机号输入的监听，并对用户信息进行注册
         */
        if (!$scope.register.error.correct &&
            !$scope.register.error.emailFormat &&
            !$scope.register.error.phoneFormat &&
            !$scope.register.error.nameFormat) {
            pwdRepeatWatcher();
            emailFormatWatcher();
            phoneFormatWatcher();
            nameFormatWatcher();
            $scope.register.pwd = md5($scope.register.pwd);
            $scope.register.pwdRepeat = md5($scope.register.pwdRepeat);
            console.log($scope.register);
            $http.post('Register.do', $scope.register).then(function (t) {
                if (t.data.result) {
                    toaster.pop('success', '', '注册成功,1s后跳转');
                    setTimeout(function () {
                        $http.post('Login.do', {
                            'name': $scope.register.name,
                            'pwd': $scope.register.pwd
                        }).then(function (t) {
                            if (t.data.result)
                                $window.location.href = 'main';
                        });
                    }, 1000)
                } else {
                    toaster.pop('error', '注册失败', t.data.data);
                }
            })
        }
    };
    /***
     * 获取验证码方法
     * @param $event 处理默认事件
     * 对手机号输入进行判断，若未输入11位手机号则弹出错误提示
     * 点击获取验证码后，在deadline的时间周期内不允许再次点击
     */
    $scope.getCode = function ($event) {
        $event.preventDefault();
        if ($scope.register.phone !== '' && !angular.isUndefined($scope.register.phone)) {
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
            }, 1000, deadline);
            $http.post('SendMessage.do', {'method': 'register', 'phone': $scope.register.phone}).then(function (t) {
                if (!t.data.result) {
                    toaster.pop('error', '', '获取验证码失败');
                }
            })
        } else {
            $scope.register.error.phone = true;
            toaster.pop('error', '', '请先输入手机号');
        }
    };
    /***
     * 初始化登录信息方法
     */
    $scope.initRegister = function () {
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
                emailFormat: false,
                phoneFormat: false
            }
        };
    };
    /***
     * 初始化忘记密码信息
     */
    $scope.initForget = function () {
        console.log($scope.forget);
        $scope.forget = {
            phone: '',
            code: '',
            pwd: '',
            pwdRepeat: '',
            error: {
                phone: false,
                code: false,
                correct: false,
                pwdRepeat: false,
                pwd: false,
                phoneFormat: false
            }
        };
    };
    $scope.getForgetCode = function ($event) {
        $event.preventDefault();
        if ($scope.forget.phone !== '' && !angular.isUndefined($scope.forget.phone)) {
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
            }, 1000, deadline);
            $http.post('CheckUser.do', {'phone': $scope.forget.phone}).then(function (t) {
                if (t.data.result) {
                    $http.post('SendMessage.do', {'method': 'forget', 'phone': $scope.forget.phone}).then(function (t) {
                        if (!t.data.result) {
                            toaster.pop('error', '', '获取验证码失败');
                        }
                    })
                } else {
                    toaster.pop('error', '', '无此用户');
                }
            });

        } else {
            $scope.forget.error.phone = true;
            toaster.pop('error', '', '请先输入手机号');
        }
    };
    /***
     * 监听用户输入忘记密码的手机号是否合法
     */
    var phoneForgetFormatWatcher = $scope.$watch('forget.phone', function (newValue) {
        if ($scope.forget.phone !== '') {
            if (newValue.length !== 11) {
                $scope.forget.error.phoneFormat = true;
                $scope.forget.error.phone = true;
            } else {
                $scope.forget.error.phoneFormat = false;
                $scope.forget.error.phone = false;
            }
        }
    });
    /***
     * 监听用户输入忘记密码中的密码和确认密码是否一致
     */
    var pwdRepeatForgetWatcher = $scope.$watch('forget.pwdRepeat', function (newValue) {
        if ($scope.forget.pwd !== '')
            if (newValue !== $scope.forget.pwd) {
                $scope.forget.error.pwdRepeat = true;
                $scope.forget.error.correct = true;
            } else {
                $scope.forget.error.pwdRepeat = false;
                $scope.forget.error.correct = false;
            }
    });
    $scope.checkForget = function () {
        /***
         * 监听用户是否输入忘记密码的手机号
         * 当用户输入手机号后，取消监听
         */
        var registerForgetPhoneWatcher = $scope.$watch('forget.phone', function (phone) {
            if (phone === '') {
                $scope.forget.error.phone = true;
                toaster.pop('error', '', '请输入手机号');
            } else {
                $scope.forget.error.phone = false;
                registerForgetPhoneWatcher();
            }
        });
        /***
         * 监听用户是否输入忘记密码的验证码
         * 当用户输入验证码后，取消监听
         */
        var registerForgetCodeWatcher = $scope.$watch('forget.code', function (code) {
            if (code === '') {
                $scope.forget.error.code = true;
                toaster.pop('error', '', '请输入验证码');
            } else {
                $scope.forget.error.code = false;
                registerForgetCodeWatcher();
            }
        });
        /***
         * 监听用户是否输入设置密码
         * 当用户输入设置密码后，取消监听
         */
        var registerForgetPwdWatcher = $scope.$watch('forget.pwd', function (pwd) {
            if (pwd === '') {
                $scope.forget.error.pwd = true;
                toaster.pop('error', '', '请输入密码');
            } else {
                $scope.forget.error.pwd = false;
                registerForgetPwdWatcher();
            }
        });
        /***
         * 监听用户是否输入确认密码
         * 当用户输入确认密码后，取消监听
         */
        var registerForgetPwdRepeatWatcher = $scope.$watch('forget.pwdRepeat', function (pwdRepeat) {
            if (pwdRepeat === '') {
                $scope.forget.error.pwdRepeat = true;
                toaster.pop('error', '', '请确认密码');
            } else {
                if (!$scope.forget.error.correct) {
                    $scope.forget.error.pwdRepeat = false;
                }
                registerForgetPwdRepeatWatcher();
            }
        });
        if (!$scope.forget.error.phone &&
            !$scope.forget.error.pwd &&
            !$scope.forget.error.pwdRepeat &&
            !$scope.forget.error.code &&
            !$scope.forget.error.correct &&
            !$scope.forget.error.phoneFormat) {
            phoneForgetFormatWatcher();
            pwdRepeatForgetWatcher();
            $scope.forget.pwd = md5($scope.forget.pwd);
            $scope.forget.pwdRepeat = md5($scope.forget.pwdRepeat);
            $http.post('Forget.do', $scope.forget).then(function (t) {
                if (t.data.result) {
                    toaster.pop('success', '', '修改密码成功');
                    $('#forget').modal('hide');
                } else {
                    toaster.pop('error', '', '修改密码失败');
                }
            })
        }
    }
}]);