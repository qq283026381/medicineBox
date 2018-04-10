medicineBox.controller('newRecordingCtrl', ['$scope', '$http', 'toaster', function ($scope, $http, toaster) {
    var number = sessionStorage.getItem('newRecord');
    if (!number) {
        setTimeout(function () {
            location.href = 'recording';
        }, 200);
    } else {
        $scope.error = {
            internal: {
                height: false,
                weight: false,
                BMI: false,
                bloodPressure: false,
                heartRate: false,
                heart: false,
                noise: false,
                liver: false,
                spleen: false,
                lung: false,
                internalSum: false
            },
            surgical: {
                skin: false,
                thyroid: false,
                lymphNode: false,
                spin: false,
                limbJoint: false,
                surgicalSum: false
            },
            ophthalmology: {
                conjunctiva: false,
                fundus: false,
                iris: false,
                cornea: false,
                lens: false,
                ophthalmologySum: false
            },
            gynecology: {
                vulva: false,
                vaginal: false,
                vaginalSecretion: false,
                cervix: false,
                palace: false,
                leftAttachment: false,
                rightAttachment: false,
                gynecologySum: false
            },
            infraredMammogram: {
                leftBreast: false,
                rightBreast: false,
                infraredMammogramSum: false
            },
            BScan: {
                BScan: false,
                BScanSum: false
            },
            boneDensity: {
                boneDensitySum: false
            },
            ECG: {
                ECG: false,
                ECGSum: false
            },
            XRay: {
                XRay: false,
                XRaySum: false
            },
            biochemical: {
                protein: false,
                albumin: false,
                globulin: false,
                AG: false,
                TBIL: false,
                DBIL: false,
                IBIL: false,
                ALT: false,
                AST: false,
                BUN: false,
                CRE: false,
                UA: false,
                TG: false,
                CHO: false,
                HDLC: false,
                LDLC: false,
                GLU: false,
                ALP: false,
                biochemicalSum: false
            },
            bloodRoutine: {
                WBC: false,
                RBC: false,
                HGB: false,
                HCT: false,
                PLT: false,
                MCV: false,
                MCH: false,
                MCHC: false,
                MPV: false,
                PDW: false,
                'LY%': false,
                'MO%': false,
                'GR%': false,
                LY: false,
                MO: false,
                GR: false,
                bloodRoutineSum: false
            },
            urineRoutine: {
                LEU: false,
                KET: false,
                URO: false,
                BIL: false,
                SG: false,
                BLD: false,
                PRO: false,
                CLU: false,
                NIT: false,
                PH: false,
                urineRoutineSum: false
            }
        };
        $scope.internal = {
            height: '',
            weight: '',
            BMI: '',
            bloodPressure: '',
            heartRate: '齐',
            heart: '正常',
            noise: '无',
            liver: '未触及',
            spleen: '未触及',
            lung: '未触及',
            internalSum: '未见明显异常',
            recordingId: number
        };
        $scope.surgical = {
            skin: '未见异常',
            thyroid: '未见异常',
            lymphNode: '未见异常',
            spin: '未见异常',
            limbJoint: '未见异常',
            surgicalSum: '未见明显异常',
            recordingId: number
        };
        $scope.ophthalmology = {
            conjunctiva: '未见异常',
            fundus: '未见异常',
            iris: '未见异常',
            cornea: '未见异常',
            lens: '未见异常',
            ophthalmologySum: '未见明显异常',
            recordingId: number
        };
        $scope.gynecology = {
            vulva: '未见异常',
            vaginal: '未见异常',
            vaginalSecretion: '正常',
            cervix: '正常',
            palace: '正常',
            leftAttachment: '未见异常',
            rightAttachment: '未见异常',
            gynecologySum: '未见明显异常',
            recordingId: number
        };
        $scope.infraredMammogram = {
            leftBreast: '未见明显异常',
            rightBreast: '未见明显异常',
            infraredMammogramSum: '双侧乳腺未见明显异常',
            recordingId: number
        };
        $scope.BScan = {
            BScan: '未见明显异常',
            BScanSum: '未见明显异常',
            recordingId: number
        };
        $scope.boneDensity = {
            boneDensitySum: '未见明显异常',
            recordingId: number
        };
        $scope.ECG = {
            ECG: '未见明显异常',
            ECGSum: '心电图正常范围',
            recordingId: number
        };
        $scope.XRay = {
            XRay: '胸部透视两肺野，心脏及横膈无异常改变',
            XRaySum: '未见明显异常',
            recordingId: number
        };
        $scope.biochemical = {
            protein: '',
            albumin: '',
            globulin: '',
            AG: '',
            TBIL: '',
            DBIL: '',
            IBIL: '',
            ALT: '',
            AST: '',
            BUN: '',
            CRE: '',
            UA: '',
            TG: '',
            CHO: '',
            HDLC: '',
            LDLC: '',
            GLU: '',
            ALP: '',
            biochemicalSum: '未见明显异常',
            recordingId: number
        };
        $scope.bloodRoutine = {
            WBC: '',
            RBC: '',
            HGB: '',
            HCT: '',
            PLT: '',
            MCV: '',
            MCH: '',
            MCHC: '',
            MPV: '',
            PDW: '',
            LY1: '',
            MO1: '',
            GR1: '',
            LY: '',
            MO: '',
            GR: '',
            bloodRoutineSum: '未见明显异常',
            recordingId: number
        };
        $scope.urineRoutine = {
            LEU: '-',
            KET: '-',
            URO: '+-',
            BIL: '-',
            SG: '',
            BLD: '-',
            PRO: '-',
            CLU: '-',
            NIT: '-',
            PH: '',
            urineRoutineSum: '未见明显异常',
            recordingId: number
        };
        var getRecording = function () {
            $http.post('GetRecording.do', {'recordingId': number}).then(function (t) {
                if (t.data.result) {
                    $scope.status = {
                        BScan: t.data.data.B_scan !== -1,
                        ECG: t.data.data.ECG !== -1,
                        XRay: t.data.data.X_ray !== -1,
                        biochemical: t.data.data.biochemical !== -1,
                        bloodRoutine: t.data.data.blood_routine !== -1,
                        boneDensity: t.data.data.bone_density !== -1,
                        gender: t.data.data.gender,
                        gynecology: t.data.data.gynecology !== -1,
                        infraredMammogram: t.data.data.infrared_mammogram !== -1,
                        internal: t.data.data.internal !== -1,
                        ophthalmology: t.data.data.ophthalmology !== -1,
                        surgical: t.data.data.surgical !== -1,
                        urineRoutine: t.data.data.urine_routine !== -1
                    };
                    $scope.info = {
                        name: t.data.data.name,
                        time: t.data.data.time
                    };
                } else {
                    toaster.pop('获取体检记录失败，请联系管理员');
                }
            });
        }
        getRecording();

        // TODO 对表格输入部分的限制


        /***
         * 添加内科记录方法
         */
        $scope.addInternal = function () {
            clearError($scope.error.internal);
            checkItem($scope.internal, $scope.error.internal);
            if (checkError($scope.error.internal)) {
                console.log($scope.internal);
                $http.post('AddInternal.do', $scope.internal).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '内科记录添加成功');
                        getRecording();
                    } else {
                        toaster.pop('error', '', '内科记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善内科表格');
            }
        };
        /***
         * 添加外科记录方法
         */
        $scope.addSurgical = function () {
            clearError($scope.error.surgical);
            checkItem($scope.surgical, $scope.error.surgical);
            if (checkError($scope.error.surgical)) {
                console.log($scope.surgical);
                $http.post('AddSurgical.do', $scope.surgical).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '外科记录添加成功');
                        getRecording();
                    } else {
                        toaster.pop('error', '', '外科记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善外科表格');
            }
        };
        /***
         * 添加眼科记录方法
         */
        $scope.addOphthalmology = function () {
            clearError($scope.error.ophthalmology);
            checkItem($scope.ophthalmology, $scope.error.ophthalmology);
            if (checkError($scope.error.ophthalmology)) {
                console.log($scope.ophthalmology);
                $http.post('AddOphthalmology.do', $scope.ophthalmology).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '眼科记录添加成功');
                        getRecording();
                    } else {
                        toaster.pop('error', '', '眼科记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善眼科表格');
            }
        };
        /***
         * 添加妇科记录方法
         */
        $scope.addGynecology = function () {
            clearError($scope.error.gynecology);
            checkItem($scope.gynecology, $scope.error.gynecology);
            if (checkError($scope.error.gynecology)) {
                console.log($scope.gynecology);
                $http.post('AddGynecology.do', $scope.gynecology).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '妇科记录添加成功');
                        setTimeout(function () {
                            getRecording()
                        }, 500);
                    } else {
                        toaster.pop('error', '', '妇科记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善妇科表格');
            }
        };
        /***
         * 添加红外线乳透记录方法
         */
        $scope.addInfraredMammogram = function () {
            clearError($scope.error.infraredMammogram);
            checkItem($scope.infraredMammogram, $scope.error.infraredMammogram);
            if (checkError($scope.error.infraredMammogram)) {
                console.log($scope.infraredMammogram);
                $http.post('AddInfraredMammogram.do', $scope.infraredMammogram).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '红外线乳透记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500)
                    } else {
                        toaster.pop('warning', '', '红外线乳透记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善红外线乳透表格');
            }
        };
        /***
         * 添加B超记录方法
         */
        $scope.addBScan = function () {
            clearError($scope.error.BScan);
            checkItem($scope.BScan, $scope.error.BScan);
            if (checkError($scope.error.BScan)) {
                console.log($scope.BScan);
                $http.post('AddBScan.do', $scope.BScan).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', 'B超记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500);
                    } else {
                        toaster.pop('warning', '', 'B超记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善B超表格');
            }
        };
        /***
         * 添加骨密度记录方法
         */
        $scope.addBoneDensity = function () {
            clearError($scope.error.boneDensity);
            checkItem($scope.boneDensity, $scope.error.boneDensity);
            if (checkError($scope.error.boneDensity)) {
                console.log($scope.boneDensity);
                $http.post('AddBoneDensity.do', $scope.boneDensity).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '骨密度记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500);
                    } else {
                        toaster.pop('warning', '', '骨密度记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善骨密度表格');
            }
        };
        /***
         * 添加心电图记录方法
         */
        $scope.addECG = function () {
            clearError($scope.error.ECG);
            checkItem($scope.ECG, $scope.error.ECG);
            if (checkError($scope.error.ECG)) {
                console.log($scope.ECG);
                $http.post('AddECG.do', $scope.ECG).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '心电图记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500);
                    } else {
                        toaster.pop('warning', '', '心电图记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善心电图表格');
            }
        };
        /***
         * 添加X射线记录方法
         */
        $scope.addXRay = function () {
            clearError($scope.error.XRay);
            checkItem($scope.XRay, $scope.error.XRay);
            if (checkError($scope.error.XRay)) {
                console.log($scope.XRay);
                $http.post('AddXRay.do', $scope.XRay).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', 'X射线记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500);
                    } else {
                        toaster.pop('warning', '', 'X射线添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善X射线表格');
            }
        };
        /***
         * 添加生化检查记录方法
         */
        $scope.addBiochemical = function () {
            clearError($scope.error.biochemical);
            checkItem($scope.biochemical, $scope.error.biochemical);
            if (checkError($scope.error.biochemical)) {
                console.log($scope.biochemical);
                $http.post('AddBiochemical.do', $scope.biochemical).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '生化检查记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500);
                    } else {
                        toaster.pop('warning', '', '生化检查记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善生化检查表格');
            }
        };
        /***
         * 添加血常规记录方法
         */
        $scope.addBloodRoutine = function () {
            clearError($scope.error.bloodRoutine);
            checkItem($scope.bloodRoutine, $scope.error.bloodRoutine);
            if (checkError($scope.error.bloodRoutine)) {
                console.log($scope.bloodRoutine);
                $http.post('AddBloodRoutine.do', $scope.bloodRoutine).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '血常规记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500);
                    } else {
                        toaster.pop('warning', '', '血常规记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善血常规表格');
            }
        };
        /***
         * 添加尿常规记录方法
         */
        $scope.addUrineRoutine = function () {
            clearError($scope.error.urineRoutine);
            checkItem($scope.urineRoutine, $scope.error.urineRoutine);
            if (checkError($scope.error.urineRoutine)) {
                console.log($scope.urineRoutine);
                $http.post('AddUrineRoutine.do', $scope.urineRoutine).then(function (t) {
                    if (t.data.result) {
                        toaster.pop('success', '', '尿常规记录添加成功');
                        setTimeout(function () {
                            getRecording();
                        }, 500);
                    } else {
                        toaster.pop('warning', '', '尿常规记录添加失败，请检查所填内容');
                    }
                })
            } else {
                toaster.pop('error', '', '请完善尿常规表格');
            }
        };
        var clearError = function (item) {
            angular.forEach(item, function (value, key, obj) {
                obj[key] = false;
            })
        };
        var checkItem = function (item, error) {
            angular.forEach(item, function (value, key) {
                if (value === '') {
                    angular.forEach(error, function (value2, key2, obj2) {
                        obj2[key] = true;
                    })
                }
            })
        };
        var checkError = function (error) {
            var flag = true;
            angular.forEach(error, function (value) {
                if (value) {
                    flag = false;
                }
            });
            return flag;
        };
        $scope.checkStatus = function () {
            var flag = true;
            angular.forEach($scope.status, function (value) {
                if (!value) {
                    flag = false;
                }
            });
            return flag;
        };
        sessionStorage.removeItem('newRecord');
    }
}]);