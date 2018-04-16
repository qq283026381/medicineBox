medicineBox.controller('searchRecordingCtrl', ['$scope', '$http', 'toaster', '$filter', function ($scope, $http, toaster, $filter) {
    var id = sessionStorage.getItem('searchItem');
    if (!id) {
        setTimeout(function () {
            location.href = 'recording';
        }, 200);
    } else {
        $http.post('GetRecording.do', {'recordingId': id}).then(function (response) {
            if (response.data.result) {
                var item = response.data.data;
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
                console.log($scope.revise.info);
                $scope.add = {
                    internal: {
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
                        recordingId: item.id
                    },
                    surgical: {
                        skin: '未见异常',
                        thyroid: '未见异常',
                        lymphNode: '未见异常',
                        spin: '未见异常',
                        limbJoint: '未见异常',
                        surgicalSum: '未见明显异常',
                        recordingId: item.id
                    },
                    ophthalmology: {
                        conjunctiva: '未见异常',
                        fundus: '未见异常',
                        iris: '未见异常',
                        cornea: '未见异常',
                        lens: '未见异常',
                        ophthalmologySum: '未见明显异常',
                        recordingId: item.id
                    },
                    gynecology: {
                        vulva: '未见异常',
                        vaginal: '未见异常',
                        vaginalSecretion: '正常',
                        cervix: '正常',
                        palace: '正常',
                        leftAttachment: '未见异常',
                        rightAttachment: '未见异常',
                        gynecologySum: '未见明显异常',
                        recordingId: item.id
                    },
                    infraredMammogram: {
                        leftBreast: '未见明显异常',
                        rightBreast: '未见明显异常',
                        infraredMammogramSum: '双侧乳腺未见明显异常',
                        recordingId: item.id
                    },
                    BScan: {
                        BScan: '未见明显异常',
                        BScanSum: '未见明显异常',
                        recordingId: item.id
                    },
                    boneDensity: {
                        boneDensitySum: '未见明显异常',
                        recordingId: item.id
                    },
                    ECG: {
                        ECG: '未见明显异常',
                        ECGSum: '心电图正常范围',
                        recordingId: item.id
                    },
                    XRay: {
                        XRay: '胸部透视两肺野，心脏及横膈无异常改变',
                        XRaySum: '未见明显异常',
                        recordingId: item.id
                    },
                    biochemical: {
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
                        recordingId: item.id
                    },
                    bloodRoutine: {
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
                        recordingId: item.id
                    },
                    urineRoutine: {
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
                        recordingId: item.id
                    }
                };
                $scope.error = {
                    add: {
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
                    },
                    revise: {
                        info: {
                            name: false,
                            gender: false,
                            time: false
                        },
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
                    }
                };
                $scope.standard = {
                    biochemical: {
                        protein: '65.00---85.00',
                        albumin: '35.00---55.00',
                        TBIL: '3.42---20.50',
                        DBIL: '0---6.84',
                        ALT: '0---50.00',
                        AST: '0---40.00',
                        BUN: '1.70---8.30',
                        CRE: '44---133',
                        UA: '89---357',
                        TG: '0---1.71',
                        CHO: '0---5.17',
                        HDLC: '1.2---1.68',
                        LDLC: '0---3.12',
                        GLU: '3.89---6.11',
                        ALP: '40.00---140.00'
                    },
                    bloodRoutine: {
                        WBC: '3.5--9.5',
                        RBC: '3.50---5.50',
                        HGB: '110---160',
                        HCT: '34.0---48.0',
                        PLT: '100---300',
                        MCV: '80---100',
                        MCH: '27.0---32',
                        MCHC: '320---360',
                        MPV: '6.0---10.0',
                        PDW: '10---20.5',
                        LY1: '20.0---40.0',
                        MO1: '0.0---9.0',
                        GR1: '50.0---70.0',
                        LY: '0.8---4.00',
                        MO: '0.12---1.00',
                        GR: '2.04---7.60'
                    },
                    urineRoutine: {
                        LEU: '-',
                        KET: '-',
                        URO: '+-',
                        BIL: '-',
                        SG: '1.005---1.030',
                        BLD: '-',
                        PRO: '-',
                        GLU: '-',
                        NIT: '-',
                        PH: '4.5---8.0'
                    }
                };
                var checkRange = function (item, min, max) {
                    var data = parseFloat(item);
                    if (data < min) {
                        return '↓';
                    } else if (data > max) {
                        return '↑'
                    } else {
                        return '';
                    }
                };
                $scope.tips = {
                    biochemical: {},
                    bloodRoutine: {},
                    urineRoutine: {}
                };
                //TODO 对添加体检记录的合法性判断
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
                    if ($scope.info.internal !== -1)
                        $http.post('GetInternal.do', {'internal': $scope.info.internal}).then(function (t) {
                            if (t.data.result) {
                                $scope.internal = t.data.data;
                            } else {
                                toaster.pop('error', '', '内科数据获取失败，请联系管理员');
                            }
                        })
                };
                var getSurgicalDetail = function () {
                    if ($scope.info.surgical !== -1)
                        $http.post('GetSurgical.do', {'surgical': $scope.info.surgical}).then(function (t) {
                            if (t.data.result) {
                                $scope.surgical = t.data.data;
                            } else {
                                toaster.pop('error', '', '外科数据获取失败，请联系管理员');
                            }
                        })
                };
                var getOphthalmologyDetail = function () {
                    if ($scope.info.ophthalmology !== -1)
                        $http.post('GetOphthalmology.do', {'ophthalmology': $scope.info.ophthalmology}).then(function (t) {
                            if (t.data.result) {
                                $scope.ophthalmology = t.data.data;
                            } else {
                                toaster.pop('error', '', '眼科数据获取失败，请联系管理员');
                            }
                        })
                };
                var getGynecologyDetail = function () {
                    if ($scope.info.gynecology !== -1)
                        $http.post('GetGynecology.do', {'gynecology': $scope.info.gynecology}).then(function (t) {
                            if (t.data.result) {
                                $scope.gynecology = t.data.data;
                            } else {
                                toaster.pop('error', '', '妇科数据获取失败，请联系管理员');
                            }
                        })
                };
                var getInfraredMammogramDetail = function () {
                    if ($scope.info.infrared_mammogram !== -1)
                        $http.post('GetInfraredMammogram.do', {'infraredMammogram': $scope.info.infrared_mammogram}).then(function (t) {
                            if (t.data.result) {
                                $scope.infraredMammogram = t.data.data;
                            } else {
                                toaster.pop('error', '', '红外线乳透数据获取失败，请联系管理员');
                            }
                        })
                };
                var getBScanDetail = function () {
                    if ($scope.info.B_scan !== -1)
                        $http.post('GetBScan.do', {'BScan': $scope.info.B_scan}).then(function (t) {
                            if (t.data.result) {
                                $scope.BScan = t.data.data;
                            } else {
                                toaster.pop('error', '', 'B超数据获取失败，请联系管理员');
                            }
                        })
                };
                var getBoneDensityDetail = function () {
                    if ($scope.info.bone_density !== -1)
                        $http.post('GetBoneDensity.do', {'boneDensity': $scope.info.bone_density}).then(function (t) {
                            if (t.data.result) {
                                $scope.boneDensity = t.data.data;
                            } else {
                                toaster.pop('error', '', '骨密度数据获取失败，请联系管理员');
                            }
                        })
                };
                var getECGDetail = function () {
                    if ($scope.info.ECG !== -1)
                        $http.post('GetECG.do', {'ECG': $scope.info.ECG}).then(function (t) {
                            if (t.data.result) {
                                $scope.ECG = t.data.data;
                            } else {
                                toaster.pop('error', '', '心电图数据获取失败，请联系管理员');
                            }
                        })
                };
                var getXRayDetail = function () {
                    if ($scope.info.X_ray !== -1)
                        $http.post('GetXRay.do', {'XRay': $scope.info.X_ray}).then(function (t) {
                            if (t.data.result) {
                                $scope.XRay = t.data.data;
                            } else {
                                toaster.pop('error', '', 'X射线数据获取失败，请联系管理员');
                            }
                        })
                };
                var getBiochemicalDetail = function () {
                    if ($scope.info.biochemical !== -1)
                        $http.post('GetBiochemical.do', {'biochemical': $scope.info.biochemical}).then(function (t) {
                            if (t.data.result) {
                                $scope.biochemical = t.data.data;
                                $scope.tips.biochemical = {
                                    protein: checkRange($scope.biochemical.protein, 65, 85),
                                    albumin: checkRange($scope.biochemical.albumin, 35, 55),
                                    TBIL: checkRange($scope.biochemical.TBIL, 3.42, 20.5),
                                    DBIL: checkRange($scope.biochemical.DBIL, 0, 6.84),
                                    ALT: checkRange($scope.biochemical.ALT, 0, 50),
                                    AST: checkRange($scope.biochemical.AST, 0, 40),
                                    BUN: checkRange($scope.biochemical.BUN, 1.7, 8.3),
                                    CRE: checkRange($scope.biochemical.CRE, 44, 133),
                                    UA: checkRange($scope.biochemical.UA, 89, 357),
                                    TG: checkRange($scope.biochemical.TG, 0, 1.71),
                                    CHO: checkRange($scope.biochemical.CHO, 0, 5.17),
                                    HDLC: checkRange($scope.biochemical.HDLC, 1.2, 1.68),
                                    LDLC: checkRange($scope.biochemical.LDLC, 0, 3.12),
                                    GLU: checkRange($scope.biochemical.GLU, 3.89, 6.11),
                                    ALP: checkRange($scope.biochemical.ALP, 40, 140)
                                }
                            } else {
                                toaster.pop('error', '', '生化检查数据获取失败，请联系管理员');
                            }
                        })
                };
                var getBloodRoutineDetail = function () {
                    if ($scope.info.blood_routine !== -1)
                        $http.post('GetBloodRoutine.do', {'bloodRoutine': $scope.info.blood_routine}).then(function (t) {
                            if (t.data.result) {
                                $scope.bloodRoutine = t.data.data;
                                $scope.tips.bloodRoutine = {
                                    WBC: checkRange($scope.bloodRoutine.WBC, 3.5, 9.5),
                                    RBC: checkRange($scope.bloodRoutine.RBC, 3.5, 5.5),
                                    HGB: checkRange($scope.bloodRoutine.HGB, 110, 160),
                                    HCT: checkRange($scope.bloodRoutine.HCT, 34, 48),
                                    PLT: checkRange($scope.bloodRoutine.PLT, 100, 300),
                                    MCV: checkRange($scope.bloodRoutine.MCV, 80, 100),
                                    MCH: checkRange($scope.bloodRoutine.MCH, 27, 32),
                                    MCHC: checkRange($scope.bloodRoutine.MCHC, 320, 360),
                                    MPV: checkRange($scope.bloodRoutine.MPV, 6, 10),
                                    PDW: checkRange($scope.bloodRoutine.PDW, 10, 20.5),
                                    LY1: checkRange($scope.bloodRoutine.LY1, 20, 40),
                                    MO1: checkRange($scope.bloodRoutine.MO1, 0, 9),
                                    GR1: checkRange($scope.bloodRoutine.GR1, 50, 70),
                                    LY: checkRange($scope.bloodRoutine.LY, 0.8, 4),
                                    MO: checkRange($scope.bloodRoutine.MO, 0.12, 1),
                                    GR: checkRange($scope.bloodRoutine.GR, 2.04, 7.6)
                                }
                            } else {
                                toaster.pop('error', '', '血常规数据获取失败，请联系管理员');
                            }
                        })
                };
                var getUrineRoutineDetail = function () {
                    if ($scope.info.urine_routine !== -1)
                        $http.post('GetUrineRoutine.do', {'urineRoutine': $scope.info.urine_routine}).then(function (t) {
                            if (t.data.result) {
                                $scope.urineRoutine = t.data.data;
                                $scope.tips.urineRoutine = {
                                    LEU: $scope.urineRoutine.LEU === $scope.standard.urineRoutine.LEU ? '' : '异常',
                                    KET: $scope.urineRoutine.KET === $scope.standard.urineRoutine.KET ? '' : '异常',
                                    URO: $scope.urineRoutine.URO === $scope.standard.urineRoutine.URO ? '' : '异常',
                                    BIL: $scope.urineRoutine.BIL === $scope.standard.urineRoutine.BIL ? '' : '异常',
                                    SG: checkRange($scope.urineRoutine.SG, 1.005, 1.03),
                                    BLD: $scope.urineRoutine.BLD === $scope.standard.urineRoutine.BLD ? '' : '异常',
                                    PRO: $scope.urineRoutine.PRO === $scope.standard.urineRoutine.PRO ? '' : '异常',
                                    GLU: $scope.urineRoutine.GLU === $scope.standard.urineRoutine.GLU ? '' : '异常',
                                    NIT: $scope.urineRoutine.NIT === $scope.standard.urineRoutine.NIT ? '' : '异常',
                                    PH: checkRange($scope.urineRoutine.PH, 4.5, 8)
                                }
                            } else {
                                toaster.pop('error', '', '尿常规数据获取失败，请联系管理员');
                            }
                        })
                };
                $scope.info = item;
                $scope.initInfo = function () {
                    $scope.revise.info = {
                        name: $scope.info.name,
                        gender: $scope.info.gender,
                        time: $scope.info.time,
                        id: id
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

                /***
                 * 添加内科记录方法
                 */
                $scope.addInternal = function () {
                    clearError($scope.error.add.internal);
                    checkItem($scope.add.internal, $scope.error.add.internal);
                    if (checkError($scope.error.add.internal)) {
                        console.log($scope.add.internal);
                        $http.post('AddInternal.do', $scope.add.internal).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '内科记录添加成功');
                                $scope.info.internal = t.data.number;
                                getInternalDetail();
                                $('#addInternal').modal('hide');
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
                    clearError($scope.error.add.surgical);
                    checkItem($scope.add.surgical, $scope.error.add.surgical);
                    if (checkError($scope.error.add.surgical)) {
                        console.log($scope.surgical);
                        $http.post('AddSurgical.do', $scope.add.surgical).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '外科记录添加成功');
                                $scope.info.surgical = t.data.number;
                                getSurgicalDetail();
                                $('#addSurgical').modal('hide');
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
                    clearError($scope.error.add.ophthalmology);
                    checkItem($scope.add.ophthalmology, $scope.error.add.ophthalmology);
                    if (checkError($scope.error.add.ophthalmology)) {
                        console.log($scope.ophthalmology);
                        $http.post('AddOphthalmology.do', $scope.add.ophthalmology).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '眼科记录添加成功');
                                $scope.info.ophthalmology = t.data.number;
                                getOphthalmologyDetail();
                                $('#addOphthalmology').modal('hide');
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
                    clearError($scope.error.add.gynecology);
                    checkItem($scope.add.gynecology, $scope.error.add.gynecology);
                    if (checkError($scope.error.add.gynecology)) {
                        console.log($scope.gynecology);
                        $http.post('AddGynecology.do', $scope.add.gynecology).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '妇科记录添加成功');
                                $scope.info.gynecology = t.data.number;
                                getGynecologyDetail();
                                $('#addGynecology').modal('hide');
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
                    clearError($scope.error.add.infraredMammogram);
                    checkItem($scope.add.infraredMammogram, $scope.error.add.infraredMammogram);
                    if (checkError($scope.error.add.infraredMammogram)) {
                        console.log($scope.add.infraredMammogram);
                        $http.post('AddInfraredMammogram.do', $scope.add.infraredMammogram).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '红外线乳透记录添加成功');
                                $scope.info.infrared_mammogram = t.data.number;
                                getInfraredMammogramDetail();
                                $('#addInfraredMammogram').modal('hide');
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
                    clearError($scope.error.add.BScan);
                    checkItem($scope.add.BScan, $scope.error.add.BScan);
                    if (checkError($scope.error.add.BScan)) {
                        console.log($scope.BScan);
                        $http.post('AddBScan.do', $scope.add.BScan).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', 'B超记录添加成功');
                                $scope.info.B_scan = t.data.number;
                                getBScanDetail();
                                $('#addBScan').modal('hide');
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
                    clearError($scope.error.add.boneDensity);
                    checkItem($scope.add.boneDensity, $scope.error.add.boneDensity);
                    if (checkError($scope.error.add.boneDensity)) {
                        console.log($scope.boneDensity);
                        $http.post('AddBoneDensity.do', $scope.add.boneDensity).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '骨密度记录添加成功');
                                $scope.info.bone_density = t.data.number;
                                getBoneDensityDetail();
                                $('#addBoneDensity').modal('hide');
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
                    clearError($scope.error.add.ECG);
                    checkItem($scope.add.ECG, $scope.error.add.ECG);
                    if (checkError($scope.error.add.ECG)) {
                        console.log($scope.ECG);
                        $http.post('AddECG.do', $scope.add.ECG).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '心电图记录添加成功');
                                $scope.info.ECG = t.data.number;
                                getECGDetail();
                                $('#addECG').modal('hide');
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
                    clearError($scope.error.add.XRay);
                    checkItem($scope.add.XRay, $scope.error.add.XRay);
                    if (checkError($scope.error.add.XRay)) {
                        console.log($scope.XRay);
                        $http.post('AddXRay.do', $scope.add.XRay).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', 'X射线记录添加成功');
                                $scope.info.X_ray = t.data.number;
                                getXRayDetail();
                                $('#addXRay').modal('hide');
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
                    clearError($scope.error.add.biochemical);
                    checkItem($scope.add.biochemical, $scope.error.add.biochemical);
                    if (checkError($scope.error.add.biochemical)) {
                        console.log($scope.biochemical);
                        $http.post('AddBiochemical.do', $scope.add.biochemical).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '生化检查记录添加成功');
                                $scope.info.biochemical = t.data.number;
                                getBiochemicalDetail();
                                $('#addBiochemical').modal('hide');
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
                    clearError($scope.error.add.bloodRoutine);
                    checkItem($scope.add.bloodRoutine, $scope.error.add.bloodRoutine);
                    if (checkError($scope.error.add.bloodRoutine)) {
                        console.log($scope.bloodRoutine);
                        $http.post('AddBloodRoutine.do', $scope.add.bloodRoutine).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '血常规记录添加成功');
                                $scope.info.blood_routine = t.data.number;
                                getBloodRoutineDetail();
                                $('#addBloodRoutine').modal('hide');
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
                    clearError($scope.error.add.urineRoutine);
                    checkItem($scope.add.urineRoutine, $scope.error.add.urineRoutine);
                    if (checkError($scope.error.add.urineRoutine)) {
                        console.log($scope.urineRoutine);
                        $http.post('AddUrineRoutine.do', $scope.add.urineRoutine).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '尿常规记录添加成功');
                                $scope.info.urine_routine = t.data.number;
                                getUrineRoutineDetail();
                                $('#addUrineRoutine').modal('hide');
                            } else {
                                toaster.pop('warning', '', '尿常规记录添加失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善尿常规表格');
                    }
                };

                /***
                 * 修改基本信息方法
                 */
                $scope.reviseInfo = function () {
                    clearError($scope.error.revise.info);
                    checkItem($scope.revise.info, $scope.error.revise.info);
                    if (checkError($scope.error.revise.info)) {
                        $http.post('ReviseRecording.do', $scope.revise.info).then(function (t) {
                            console.log($scope.revise.info);
                            if (t.data.result) {
                                toaster.pop('success', '', '基本信息修改成功');
                                setTimeout(function () {
                                    window.location.href = 'recording/search';
                                }, 1000);
                                $('#reviseInfo').modal('hide');
                            } else {
                                toaster.pop('error', '', '基本信息修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善基本信息表格');
                    }
                };

                /***
                 * 修改内科记录方法
                 */
                $scope.reviseInternal = function () {
                    clearError($scope.error.revise.internal);
                    checkItem($scope.revise.internal, $scope.error.revise.internal);
                    if (checkError($scope.error.revise.internal)) {
                        console.log($scope.revise.internal);
                        $http.post('ReviseInternal.do', $scope.revise.internal).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '内科记录修改成功');
                                getInternalDetail();
                                $('#reviseInternal').modal('hide');
                            } else {
                                toaster.pop('error', '', '内科记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善内科表格');
                    }
                };
                /***
                 * 修改外科记录方法
                 */
                $scope.reviseSurgical = function () {
                    clearError($scope.error.revise.surgical);
                    checkItem($scope.revise.surgical, $scope.error.revise.surgical);
                    if (checkError($scope.error.revise.surgical)) {
                        console.log($scope.surgical);
                        $http.post('ReviseSurgical.do', $scope.revise.surgical).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '外科记录修改成功');
                                getSurgicalDetail();
                                $('#reviseSurgical').modal('hide');
                            } else {
                                toaster.pop('error', '', '外科记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善外科表格');
                    }
                };
                /***
                 * 修改眼科记录方法
                 */
                $scope.reviseOphthalmology = function () {
                    clearError($scope.error.revise.ophthalmology);
                    checkItem($scope.revise.ophthalmology, $scope.error.revise.ophthalmology);
                    if (checkError($scope.error.revise.ophthalmology)) {
                        console.log($scope.ophthalmology);
                        $http.post('ReviseOphthalmology.do', $scope.revise.ophthalmology).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '眼科记录修改成功');
                                getOphthalmologyDetail();
                                $('#reviseOphthalmology').modal('hide');
                            } else {
                                toaster.pop('error', '', '眼科记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善眼科表格');
                    }
                };
                /***
                 * 修改妇科记录方法
                 */
                $scope.reviseGynecology = function () {
                    clearError($scope.error.revise.gynecology);
                    checkItem($scope.revise.gynecology, $scope.error.revise.gynecology);
                    if (checkError($scope.error.revise.gynecology)) {
                        console.log($scope.gynecology);
                        $http.post('ReviseGynecology.do', $scope.revise.gynecology).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '妇科记录修改成功');
                                getGynecologyDetail();
                                $('#reviseGynecology').modal('hide');
                            } else {
                                toaster.pop('error', '', '妇科记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善妇科表格');
                    }
                };
                /***
                 * 修改红外线乳透记录方法
                 */
                $scope.reviseInfraredMammogram = function () {
                    clearError($scope.error.revise.infraredMammogram);
                    checkItem($scope.revise.infraredMammogram, $scope.error.revise.infraredMammogram);
                    if (checkError($scope.error.revise.infraredMammogram)) {
                        console.log($scope.infraredMammogram);
                        $http.post('ReviseInfraredMammogram.do', $scope.revise.infraredMammogram).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '红外线乳透记录修改成功');
                                getInfraredMammogramDetail();
                                $('#reviseInfraredMammogram').modal('hide');
                            } else {
                                toaster.pop('warning', '', '红外线乳透记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善红外线乳透表格');
                    }
                };
                /***
                 * 修改B超记录方法
                 */
                $scope.reviseBScan = function () {
                    clearError($scope.error.revise.BScan);
                    checkItem($scope.revise.BScan, $scope.error.revise.BScan);
                    if (checkError($scope.error.revise.BScan)) {
                        console.log($scope.BScan);
                        $http.post('ReviseBScan.do', $scope.revise.BScan).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', 'B超记录修改成功');
                                getBScanDetail();
                                $('#reviseBScan').modal('hide');
                            } else {
                                toaster.pop('warning', '', 'B超记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善B超表格');
                    }
                };
                /***
                 * 修改骨密度记录方法
                 */
                $scope.reviseBoneDensity = function () {
                    clearError($scope.error.revise.boneDensity);
                    checkItem($scope.revise.boneDensity, $scope.error.revise.boneDensity);
                    if (checkError($scope.error.revise.boneDensity)) {
                        console.log($scope.boneDensity);
                        $http.post('ReviseBoneDensity.do', $scope.revise.boneDensity).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '骨密度记录修改成功');
                                getBoneDensityDetail();
                                $('#reviseBoneDensity').modal('hide');
                            } else {
                                toaster.pop('warning', '', '骨密度记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善骨密度表格');
                    }
                };
                /***
                 * 修改心电图记录方法
                 */
                $scope.reviseECG = function () {
                    clearError($scope.error.revise.ECG);
                    checkItem($scope.revise.ECG, $scope.error.revise.ECG);
                    if (checkError($scope.error.revise.ECG)) {
                        console.log($scope.ECG);
                        $http.post('ReviseECG.do', $scope.revise.ECG).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '心电图记录修改成功');
                                getECGDetail();
                                $('#reviseECG').modal('hide');
                            } else {
                                toaster.pop('warning', '', '心电图记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善心电图表格');
                    }
                };
                /***
                 * 修改X射线记录方法
                 */
                $scope.reviseXRay = function () {
                    clearError($scope.error.revise.XRay);
                    checkItem($scope.revise.XRay, $scope.error.revise.XRay);
                    if (checkError($scope.error.revise.XRay)) {
                        console.log($scope.XRay);
                        $http.post('ReviseXRay.do', $scope.revise.XRay).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', 'X射线记录修改成功');
                                getXRayDetail();
                                $('#reviseXRay').modal('hide');
                            } else {
                                toaster.pop('warning', '', 'X射线修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善X射线表格');
                    }
                };
                /***
                 * 修改生化检查记录方法
                 */
                $scope.reviseBiochemical = function () {
                    clearError($scope.error.revise.biochemical);
                    checkItem($scope.revise.biochemical, $scope.error.revise.biochemical);
                    if (checkError($scope.error.revise.biochemical)) {
                        console.log($scope.biochemical);
                        $http.post('ReviseBiochemical.do', $scope.revise.biochemical).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '生化检查记录修改成功');
                                getBiochemicalDetail();
                                $('#reviseBiochemical').modal('hide');
                            } else {
                                toaster.pop('warning', '', '生化检查记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善生化检查表格');
                    }
                };
                /***
                 * 修改血常规记录方法
                 */
                $scope.reviseBloodRoutine = function () {
                    clearError($scope.error.revise.bloodRoutine);
                    checkItem($scope.revise.bloodRoutine, $scope.error.revise.bloodRoutine);
                    if (checkError($scope.error.revise.bloodRoutine)) {
                        console.log($scope.bloodRoutine);
                        $http.post('ReviseBloodRoutine.do', $scope.revise.bloodRoutine).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '血常规记录修改成功');
                                getBloodRoutineDetail();
                                $('#reviseBloodRoutine').modal('hide');
                            } else {
                                toaster.pop('warning', '', '血常规记录修改失败，请检查所填内容');
                            }
                        })
                    } else {
                        toaster.pop('error', '', '请完善血常规表格');
                    }
                };
                /***
                 * 修改尿常规记录方法
                 */
                $scope.reviseUrineRoutine = function () {
                    clearError($scope.error.revise.urineRoutine);
                    checkItem($scope.revise.urineRoutine, $scope.error.revise.urineRoutine);
                    if (checkError($scope.error.revise.urineRoutine)) {
                        console.log($scope.urineRoutine);
                        $http.post('ReviseUrineRoutine.do', $scope.revise.urineRoutine).then(function (t) {
                            if (t.data.result) {
                                toaster.pop('success', '', '尿常规记录修改成功');
                                getUrineRoutineDetail();
                                $('#reviseUrineRoutine').modal('hide');
                            } else {
                                toaster.pop('warning', '', '尿常规记录修改失败，请检查所填内容');
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

                $('#weightChart').on('shown.bs.modal', function () {
                    var data = {};
                    $http.post('GetChart.do', {'name': item.name, 'gender': item.gender}).then(function (t) {
                        if (t.data.result) {
                            data = t.data.data;
                            var times = [];
                            var weight = [];
                            angular.forEach(data, function (value) {
                                times.push(value.time);
                                weight.push(value.weight);
                            });
                            var option = {
                                    tooltip: {
                                        trigger: 'axis',
                                        axisPointer: {
                                            type: 'cross',
                                            label: {
                                                backgroundColor: '#6a7985'
                                            }
                                        }
                                    },
                                    xAxis: {
                                        type: 'category',
                                        data: times
                                    },
                                    yAxis: {
                                        type: 'value'
                                    },
                                    series: [
                                        {
                                            name: '体重',
                                            data: weight,
                                            type: 'line',
                                            smooth: true,
                                            label: {
                                                normal: {
                                                    show: true,
                                                    position: 'top'
                                                }
                                            }
                                        }
                                    ]
                                }
                            ;

                            var myChart = echarts.init(document.getElementById("ageChart"));
                            myChart.setOption(option);
                            window.addEventListener('resize', function () {
                                myChart.resize();
                            });
                        } else {
                            toaster.pop('error', '', '历史数据获取失败，请联系管理员');
                        }
                    });

                })
            } else {
                toaster.pop('warning', '', '数据获取失败，请联系管理员');
                setTimeout(function () {
                    location.href = 'recording';
                }, 200);
            }

        });
    }
}]);