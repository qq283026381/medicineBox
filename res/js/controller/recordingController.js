medicineBox.controller('recordingCtrl', ['$scope', '$http', '$filter', 'toaster', function ($scope, $http, $filter, toaster) {
    $scope.add = {
        name: '',
        gender: '',
        time: ''
    };
    $scope.error = {
        name: false,
        gender: false,
        time: false
    };
    $scope.initAdd = function () {
        $scope.add = {
            name: '',
            gender: '',
            time: ''
        };
        $scope.error = {
            add: {
                name: false,
                gender: false,
                time: false
            }
        };
    };
    $('#addTime').pickadate({
        format: 'yyyy-mm-dd',
        onSet: function (thisSet) {
            if (typeof thisSet.select === 'undefined') {
                $scope.add.time = '';
            } else {
                $scope.add.time = $filter('date')(thisSet.select, 'yyyy-MM-dd');
                console.log($scope.add.time);
            }
        }
    });
    var getRecordings = function () {
        $http.post('GetAllRecordings.do').then(function (t) {
            $scope.recordings = t.data;
        })
    };
    getRecordings();
    $scope.submit = function () {
        $scope.error.name = false;
        $scope.error.gender = false;
        $scope.error.time = false;
        if ($scope.add.name === '') {
            $scope.error.name = true;
            toaster.pop('error', '', '请输入姓名');
        }
        if ($scope.add.gender === '') {
            $scope.error.gender = true;
            toaster.pop('error', '', '请输入性别');
        }
        if ($scope.add.time === '') {
            $scope.error.time = true;
            toaster.pop('error', '', '请输入体检日期');
        }
        if (!$scope.error.name && !$scope.error.gender && !$scope.error.time) {
            $http.post('AddRecording.do', $scope.add).then(function (t) {
                if (t.data.result) {
                    toaster.pop('success', '', '请完善此次体检记录');
                    sessionStorage.setItem('newRecord', t.data.number);
                    setTimeout(function () {
                        var a = document.createElement('a');
                        a.href = 'recording/new';
                        a.click();
                    }, 2000);
                } else {
                    toaster.pop('warning', '', '添加失败，请检查网络或者输入内容');
                }
            })
        }
    };
    $scope.setSearchItem = function (item) {
        sessionStorage.setItem('searchItem', angular.toJson(item));
    };
    $scope.deleteRecording=function (index,id) {
        var affirmance = confirm('确定删除序号为' + index + '的体检记录吗？');
        if (affirmance) {
            $http.post('DeleteRecording.do',{'id':id}).then(function (t) {
                if(t.data.data){
                    toaster.pop('success','','删除成功');
                    getRecordings();
                }else{
                    toaster.pop('error','','删除失败，请检查网络');
                }
            })
        }
    };
}]);