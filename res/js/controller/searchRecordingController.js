medicineBox.controller('searchRecordingCtrl', ['$scope', '$http', 'toaster', '$filter', function ($scope, $http, toaster, $filter) {
    var item = sessionStorage.getItem('searchItem');
    if (!item) {
        setTimeout(function () {
            location.href = 'recording';
        }, 200);
    } else {
        $scope.revise = {
            info: {},
            internal: {},
            surgical: {},
            ophthalmology: {},
            gynecology: {},
            infraredMammogram: {},
            BScan: {},
            boneDensity: {},
            ECG: {},
            XRay: {},
            biochemical: {},
            bloodRoutine: {},
            urineRoutine: {}
        };
        $('#time').pickadate({
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
        var getInternalDetail = function () {
            $http.post('GetInternal.do', {'internal': $scope.info.internal}).then(function (t) {
                if (t.data.result) {
                    $scope.internal = t.data.data;
                } else {
                    toaster.pop('error', '', '内科数据获取失败，请联系管理员');
                }
            })
        };
        var getSurgicalDetail = function () {
            $http.post('GetSurgical.do', {'surgical': $scope.info.surgical}).then(function (t) {
                if (t.data.result) {
                    $scope.surgical = t.data.data;
                } else {
                    toaster.pop('error', '', '外科数据获取失败，请联系管理员');
                }
            })
        };
        var getOphthalmologyDetail = function () {
            $http.post('GetOphthalmology.do', {'ophthalmology': $scope.info.ophthalmology}).then(function (t) {
                if (t.data.result) {
                    $scope.ophthalmology = t.data.data;
                } else {
                    toaster.pop('error', '', '眼科数据获取失败，请联系管理员');
                }
            })
        };
        var getGynecologyDetail = function () {
            $http.post('GetGynecology.do', {'gynecology': $scope.info.gynecology}).then(function (t) {
                if (t.data.result) {
                    $scope.gynecology = t.data.data;
                } else {
                    toaster.pop('error', '', '妇科数据获取失败，请联系管理员');
                }
            })
        };
        var getInfraredMammogramDetail = function () {
            $http.post('GetInfraredMammogram.do', {'infraredMammogram': $scope.info.infrared_mammogram}).then(function (t) {
                if (t.data.result) {
                    $scope.infraredMammogram = t.data.data;
                } else {
                    toaster.pop('error', '', '红外线乳透数据获取失败，请联系管理员');
                }
            })
        };
        var getBScanDetail = function () {
            $http.post('GetBScan.do', {'BScan': $scope.info.B_scan}).then(function (t) {
                if (t.data.result) {
                    $scope.BScan = t.data.data;
                } else {
                    toaster.pop('error', '', 'B超数据获取失败，请联系管理员');
                }
            })
        };
        var getBoneDensityDetail = function () {
            $http.post('GetBoneDensity.do', {'boneDensity': $scope.info.bone_density}).then(function (t) {
                if (t.data.result) {
                    $scope.boneDensity = t.data.data;
                } else {
                    toaster.pop('error', '', '骨密度数据获取失败，请联系管理员');
                }
            })
        };
        var getECGDetail = function () {
            $http.post('GetECG.do', {'ECG': $scope.info.ECG}).then(function (t) {
                if (t.data.result) {
                    $scope.ECG = t.data.data;
                } else {
                    toaster.pop('error', '', '心电图数据获取失败，请联系管理员');
                }
            })
        };
        var getXRayDetail = function () {
            $http.post('GetXRay.do', {'XRay': $scope.info.X_ray}).then(function (t) {
                if (t.data.result) {
                    $scope.XRay = t.data.data;
                } else {
                    toaster.pop('error', '', 'X射线数据获取失败，请联系管理员');
                }
            })
        };
        var getBiochemicalDetail = function () {
            $http.post('GetBiochemical.do', {'biochemical': $scope.info.biochemical}).then(function (t) {
                if (t.data.result) {
                    $scope.biochemical = t.data.data;
                } else {
                    toaster.pop('error', '', '生化检查数据获取失败，请联系管理员');
                }
            })
        };
        var getBloodRoutineDetail = function () {
            $http.post('GetBloodRoutine.do', {'bloodRoutine': $scope.info.blood_routine}).then(function (t) {
                if (t.data.result) {
                    $scope.bloodRoutine = t.data.data;
                } else {
                    toaster.pop('error', '', '血常规数据获取失败，请联系管理员');
                }
            })
        };
        var getUrineRoutineDetail = function () {
            $http.post('GetUrineRoutine.do', {'urineRoutine': $scope.info.urine_routine}).then(function (t) {
                if (t.data.result) {
                    $scope.urineRoutine = t.data.data;
                } else {
                    toaster.pop('error', '', '尿常规数据获取失败，请联系管理员');
                }
            })
        };
        $scope.info = angular.fromJson(item);
        $scope.initInfo = function () {
            $scope.revise.info = {
                name: $scope.info.name,
                gender: $scope.info.gender,
                time: $scope.info.time
            }
        };
        $scope.initInternal = function () {
            $scope.revise.internal = angular.copy($scope.internal);
        };
        $scope.initSurgical = function () {
            $scope.revise.surgical = angular.copy($scope.surgical);
        };
        $scope.initOphthalmology = function () {
            $scope.revise.ophthalmology = angular.copy($scope.ophthalmology);
        };
        $scope.initGynecology = function () {
            $scope.revise.gynecology = angular.copy($scope.gynecology);
        };
        $scope.initInfraredMammogram = function () {
            $scope.revise.infraredMammogram = angular.copy($scope.infraredMammogram);
        };
        $scope.initBScan = function () {
            $scope.revise.BScan = angular.copy($scope.BScan);
        };
        $scope.initBoneDensity = function () {
            $scope.revise.boneDensity = angular.copy($scope.boneDensity);
        };
        $scope.initECG = function () {
            $scope.revise.ECG = angular.copy($scope.ECG);
        };
        $scope.initXRay = function () {
            $scope.revise.XRay = angular.copy($scope.XRay);
        };
        $scope.initBiochemical = function () {
            $scope.revise.biochemical = angular.copy($scope.biochemical);
        };
        $scope.initBloodRoutine = function () {
            $scope.revise.bloodRoutine = angular.copy($scope.bloodRoutine);
        };
        $scope.initUrineRoutine = function () {
            $scope.revise.urineRoutine = angular.copy($scope.urineRoutine);
        };
        getInternalDetail();
        getSurgicalDetail();
        getOphthalmologyDetail();
        if ($scope.info.gender === '女') {
            getGynecologyDetail();
        }
        getInfraredMammogramDetail();
        getBScanDetail();
        getBoneDensityDetail();
        getECGDetail();
        getXRayDetail();
        getBiochemicalDetail();
        getBloodRoutineDetail();
        getUrineRoutineDetail();
    }

    //sessionStorage.removeItem('searchItem');
}]);