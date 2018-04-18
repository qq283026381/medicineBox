medicineBox.controller('diagnosisCtrl', ['$scope', '$http', 'toaster','loginService', function ($scope, $http, toaster,loginService) {
    loginService.checkTime();
    $scope.diagnosis = {
        input: []
    };
    $scope.result = '暂无';
    /***
     * 获取所有症状的方法
     */
    $http.post('GetAllDiagnosis.do').then(function (t) {
        if (t.data.length > 0) {
            $scope.diagnosis.source = t.data;
        } else {
            toaster.pop('error', '', '获取症状数据失败，请检查网络');
        }
    });
    /***
     * 用户添加症状方法
     * 当用户进行选择的时候，若input列表里没有，则添加，若有，则替换该项
     * @param type
     * @param name
     */
    $scope.inputDiagnosis = function (type, name) {
        var flag = false;
        angular.forEach($scope.diagnosis.input, function (data, index, array) {
            if (data.type === type) {
                if (name === '' || name === null) {
                    array.splice(index, 1);
                } else {
                    array[index].name = name;
                }
                flag = true;
            }
        });
        if (!flag) {
            var temp = {type: type, name: name};
            $scope.diagnosis.input.push(temp);
        }
    };
    /***
     * 症状诊断方法
     */
    $scope.confirm = function () {
        if ($scope.diagnosis.input.length === 0) {
            toaster.pop('warning', '', '请至少选择一种症状');
        } else {
            $http.post('Diagnosis.do', $scope.diagnosis.input).then(function (t) {
                console.log(t.data);
                if (t.data.status === 1) {
                    var max = 0;
                    angular.forEach(t.data.result, function (data) {
                        max = Math.max(max, data);
                    });
                    angular.forEach(t.data.result, function (data, index) {
                        if (max === data) {
                            $scope.result = "有" + (max * 100).toFixed(2) + "%的概率认为是" + index;
                        }
                    });
                } else {
                    toaster.pop('error', '', '诊断失败，请检查网络或输入内容');
                }
            })
        }
    }
}]);