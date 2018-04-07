medicineBox.controller('newRecordingCtrl', ['$scope', '$http', 'toaster', function ($scope, $http, toaster) {
    /*var number = sessionStorage.getItem('newRecord');*/
    var number = 1;
    if (!number) {
        alert('非法访问');
        setTimeout(function () {
            location.href = 'main';
        }, 200);
    } else {
        $scope.internal = {
            height: '',
            weight: '',
            BMI: '',
            bloodPressure: '',
            heartRate: '',
            heart: '',
            noise: '',
            liver: '',
            spleen: '',
            lung: '',
            internalSum: '',
            recordingId: number
        };
        $http.post('GetRecording.do', {'recordingId': number}).then(function (t) {
            $scope.status = {
                B_scan: t.data.B_scan !== -1,
                ECG: t.data.ECG !== -1,
                X_ray: t.data.X_ray !== -1,
                biochemical: t.data.biochemical !== -1,
                blood_routine: t.data.blood_routine !== -1,
                bone_density: t.data.bone_density !== -1,
                gender: t.data.gender,
                gynecology: t.data.gynecology !== -1,
                infrared_mammogram: t.data.infrared_mammogram !== -1,
                internal: t.data.internal !== -1,
                ophthalmology: t.data.ophthalmology !== -1,
                surgical: t.data.surgical !== -1,
                urine_routine: t.data.urine_routine !== -1
            };
        });

        $scope.addInternal = function () {
            console.log($scope.internal);
            $http.post('AddInternal.do', $scope.internal).then(function (t) {
                if (t.data.result) {
                    toaster.pop('success', '', '内科记录添加成功');
                    $scope.status.internal = true;
                } else {
                    toaster.pop('error', '', '内科记录添加失败，请检查所填内容');
                }
            })
        };
        sessionStorage.removeItem('newRecord');
    }
}]);