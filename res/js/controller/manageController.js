medicineBox.controller('manageCtrl', ['$scope', '$http', '$filter', 'toaster', function ($scope, $http, $filter, toaster) {
    /***
     * 编辑药品模态框中日期的插件配置
     */
    $('#editDate').pickadate({
        format: 'yyyy-mm-dd',
        onSet: function (thisSet) {
            if (typeof thisSet.select === 'undefined') {
                $scope.editItem.productionDate = '';
            } else {
                $scope.editItem.productionDate = $filter('date')(thisSet.select, 'yyyy-MM-dd');
            }
        }
    });
    /***
     * 添加药品模态框中日期的插件配置
     */
    $('#addDate').pickadate({
        format: 'yyyy-mm-dd',
        onSet: function (thisSet) {
            if (typeof thisSet.select === 'undefined') {
                $scope.addItem.productionDate = '';
            } else {
                $scope.addItem.productionDate = $filter('date')(thisSet.select, 'yyyy-MM-dd');
            }
        }
    });
    /***
     * 添加药品模态框中的服药时间的插件配置
     */
    $('#addTime').pickatime({
        format: 'HH:i',
        interval: 60,
        clear: '',
        onSet: function () {
            var value = $('.picker__input--active').val();
            if (value !== '' || value !== null)
                $scope.$apply(function () {
                    if ($scope.addItem.time.indexOf(value) === -1) {
                        $scope.addItem.time.push(value);
                    } else {
                        toaster.pop('warning', '', '时间选择重复');
                    }
                });
            $('.picker__input--active').val('');
        }
    });
    $('#editTime').pickatime({
        format: 'HH:i',
        interval: 60,
        clear: '',
        onSet: function () {
            var value = $('.picker__input--active').val();
            if (value !== '' || value !== null)
                $scope.$apply(function () {
                    if ($scope.editItem.time.indexOf(value) === -1) {
                        $scope.editItem.time.push(value);
                    } else {
                        toaster.pop('warning', '', '时间选择重复');
                    }
                });
            $('.picker__input--active').val('');
        }
    });
    /***
     * 获取所有药品方法
     */
    var getMedicine = function () {
        $http.post('GetMedicine.do').then(function (t) {
            $scope.medicine = t.data;
            angular.forEach($scope.medicine, function (value, index, arr) {
                var date = new Date();
                var current = formatDate(date.getFullYear(), date.getMonth() + 1, date.getDate());
                arr[index].status = compareDate(value.deadline, current);
            });
        })
    };
    /***
     * 时间格式化
     * @param year
     * @param month
     * @param day
     * @returns {string}
     */
    var formatDate = function (year, month, day) {
        if (month > 0 && month < 10) {
            month = '0' + month;
        }
        if (day > 0 && day < 10) {
            day = '0' + day;
        }
        return year + '-' + month + '-' + day;
    };
    /***
     * 比较两个时间
     * @param target
     * @param current
     * @returns {string}
     */
    var compareDate = function (target, current) {
        var targetArr = target.split('-');
        var currentArr = current.split('-');
        if (targetArr[0] < currentArr[0]) {
            return 'expired';
        } else if (targetArr[0] === currentArr[0]) {
            if (targetArr[1] <= currentArr[1]) {
                return 'expired';
            } else if (parseInt(targetArr[1]) === parseInt(currentArr[1])+ 1) {
                return 'warning';
            } else {
                return 'normal';
            }
        } else {
            return 'normal';
        }
    };
    /***
     * 载入时初始化已有药品
     */
    getMedicine();
    $scope.medicine = [];
    $scope.error = {
        add: {
            name: false,
            date: false,
            validity: false,
            number: false,
            time: false
        },
        edit: {
            name: false,
            date: false,
            validity: false,
            number: false,
            time: false
        }
    };
    /***
     * 初始化新增药品项的方法
     */
    $scope.initAddItem = function () {
        $scope.addItem = {
            name: '',
            productionDate: '',
            validity: '',
            number: '',
            time: []
        };
        $scope.error = {
            add: {
                name: false,
                date: false,
                validity: false,
                number: false,
                time: false
            }
        };
        $('.picker__input').val('');
    };
    /***
     * 添加药品方法
     * 对输入项进行判断和监听，合法后进行添加
     */
    $scope.addMedicine = function () {
        if ($scope.addItem.name === '') {
            $scope.error.add.name = true;
            toaster.pop('error', '', '请输入药品名称');
            var addNameWatcher = $scope.$watch('addItem.name', function (newValue) {
                if (newValue !== '') {
                    $scope.error.add.name = false;
                    addNameWatcher();
                }
            })
        }
        if ($scope.addItem.productionDate === '') {
            $scope.error.add.date = true;
            toaster.pop('error', '', '请输入生产日期');
            var addDateWatcher = $scope.$watch('addItem.productionDate', function (newValue) {
                if (newValue !== '') {
                    $scope.error.add.date = false;
                    addDateWatcher();
                }
            })
        }
        if ($scope.addItem.validity === '') {
            $scope.error.add.validity = true;
            toaster.pop('error', '', '请输入有效期');
            var addValidityWatcher = $scope.$watch('addItem.validity', function (newValue) {
                if (newValue !== '') {
                    $scope.error.add.validity = false;
                    addValidityWatcher();
                }
            })
        }
        if ($scope.addItem.number === '') {
            $scope.error.add.number = true;
            toaster.pop('error', '', '请输入药品编号');
            var addNumberWatcher = $scope.$watch('addItem.number', function (newValue) {
                if (newValue !== '') {
                    $scope.error.add.number = false;
                    addNumberWatcher();
                }
            })
        }
        if ($scope.addItem.time.length === 0) {
            $scope.error.add.time = true;
            toaster.pop('error', '', '请输入服药时间');
            var addTimeWatcher = $scope.$watch('addItem.time', function (newValue) {
                if (newValue.length > 0) {
                    $scope.error.add.time = false;
                    addTimeWatcher();
                }
            }, true)
        }
        if (!$scope.error.add.name && !$scope.error.add.date && !$scope.error.add.validity && !$scope.error.add.number && !$scope.error.add.time) {
            $http.post('AddMedicine.do', $scope.addItem).then(function (t) {
                if (t.data.result) {
                    toaster.pop('success', '', '药品 ' + $scope.addItem.name + ' 添加成功');
                    setTimeout(function () {
                        $('.mb-add-modal').click();
                    }, 500);
                    getMedicine();
                } else {
                    toaster.pop('error', '', '添加失败，请检查网络或输入内容');
                }
            })
        }
    };
    /***
     * 删除添加药品的已选服药时间
     * @param index
     */
    $scope.deleteAddTime = function (index) {
        $scope.addItem.time.splice(index, 1);
    };
    /***
     * 删除编辑药品的已选服药时间
     */
    $scope.deleteEditTime = function (index) {
        console.log(index);
        $scope.editItem.time.splice(index, 1);
    };
    /***
     * 通过序号查找要编辑的药品项
     * @param index
     */
    $scope.setEditItem = function (index) {
        $scope.editItem = angular.copy($scope.medicine[index]);
    };
    /***
     * 通过序号查找要查看的药品项
     * @param index
     */
    $scope.setSearchItem = function (index) {
        $scope.searchItem = angular.copy($scope.medicine[index]);
    };
    /***
     * 编辑药品信息方法
     * 对输入项进行合法性验证后对药品进行修改
     */
    $scope.updateMedicine = function () {
        if ($scope.editItem.name === '') {
            $scope.error.edit.name = true;
            toaster.pop('error', '', '请输入药品名称');
            var addNameWatcher = $scope.$watch('editItem.name', function (newValue) {
                if (newValue !== '') {
                    $scope.error.edit.name = false;
                    addNameWatcher();
                }
            })
        }
        if ($scope.editItem.productionDate === '') {
            $scope.error.edit.date = true;
            toaster.pop('error', '', '请输入生产日期');
            var addDateWatcher = $scope.$watch('editItem.productionDate', function (newValue) {
                if (newValue !== '') {
                    $scope.error.edit.date = false;
                    addDateWatcher();
                }
            })
        }
        if ($scope.editItem.validity === null || angular.equals({}, $scope.editItem.validity)) {
            $scope.error.edit.validity = true;
            toaster.pop('error', '', '请输入有效期');
            var addValidityWatcher = $scope.$watch('editItem.validity', function (newValue) {
                if (newValue !== null && angular.equals({}, newValue)) {
                    $scope.error.edit.validity = false;
                    addValidityWatcher();
                }
            })
        }
        if ($scope.editItem.number === null || angular.equals({}, $scope.editItem.number)) {
            $scope.error.edit.number = true;
            toaster.pop('error', '', '请输入药品编号');
            var addNumberWatcher = $scope.$watch('editItem.number', function (newValue) {
                if (newValue !== null && angular.equals({}, newValue)) {
                    $scope.error.edit.number = false;
                    addNumberWatcher();
                }
            })
        }
        if ($scope.editItem.time.length === 0) {
            $scope.error.edit.time = true;
            toaster.pop('error', '', '请输入服药时间');
            var addTimeWatcher = $scope.$watch('editItem.time', function (newValue) {
                if (newValue.length > 0) {
                    $scope.error.edit.time = false;
                    addTimeWatcher();
                }
            }, true)
        }
        if (!$scope.error.edit.name &&
            !$scope.error.edit.date &&
            !$scope.error.edit.validity &&
            !$scope.error.edit.number &&
            !$scope.error.edit.time) {
            $http.post('UpdateMedicine.do', $scope.editItem).then(function (t) {
                console.log(t);
                if (t.data.result) {
                    toaster.pop('success', '', '修改成功');
                    setTimeout(function () {
                        $('.mb-edit-modal').click();
                    }, 500);
                    getMedicine();
                } else {
                    toaster.pop('error', '', '修改失败，请检查网络或输入内容');
                }
            })
        }
    };
    /***
     * 删除药品方法
     * 通过药品ID，将药品记录删除
     * @param index
     */
    $scope.deleteMedicine = function (index) {
        var affirmance = confirm('确定删除序号为' + index + '的药品记录吗？');
        if (affirmance) {
            var id = $scope.medicine[index].id;
            $http.post('DeleteMedicine.do', {'id': id}).then(function (t) {
                if (t.data.result) {
                    toaster.pop('success', '', '删除成功');
                    getMedicine();
                } else {
                    toaster.pop('error', '', '删除失败，请检查网络');
                }
            })
        }
    };
}]);