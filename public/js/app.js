/**
 * Created by edgar on 03/06/16.
 */
var app = angular.module('todoApp', ['ui.bootstrap', 'datatables', 'hSweetAlert', 'ngFileUpload'], function() {

});


app.controller('cmsController', function($scope, $http, $uibModal, $rootScope, DTOptionsBuilder, sweet, Upload) {

    $scope.users = [];
    $scope.loading = false;
    var a = 1;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(5)
        .withOption('bLengthChange', true);

    $scope.init = function() {
        $scope.loading = true;
        $http.get('/usuario_cms').
        success(function(data, status, headers, config) {
            $scope.users = data;
            $scope.loading = false;

        });
    };

    $scope.updateUser = function(todo) {
        $scope.loading = true;

        $http.put('/home' + todo.id, {
            title: todo.title,
            done: todo.done
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.loading = false;

        });
    };

    $scope.deleteUser = function(index) {
        $scope.loading = true;

       // var user = $scope.user[index];

        sweet.show({
            title: 'Confirmar',
            text: 'Borrar este Usuario',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Si, Borrar',
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $http.delete('/usuario_cms/' + index)
                    .success(function() {
                        $scope.init();
                        $scope.loading = false;

                    });
                sweet.show('Borrado!', 'Ha sido Borrado con Exito.', 'success');
            }else{
                sweet.show('Cancelar', ':)', 'error');
            }
        });


    };

    $scope.animationsEnabled = true;

    $scope.open = function (size) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalInstanceCtrl',
            size: size

        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };


    $scope.editUser = function (user) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent1.html',
            controller: 'ModalEditCtrl',
            size: 'md',
            resolve: {
                user: function () {
                    return user;
                }
            }
        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };

    $rootScope.$on("CallParentMethod", function(){
        $scope.init();
    });


    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };

});

app.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, $http, $rootScope, Upload, $timeout, sweet) {

    $scope.user = {};
    $scope.users = [];

    $scope.save = function (form) {

        $scope.submitted = true;
        if (form.$valid) {
            $http.post('/usuario_cms', $scope.user)
                 .success(function(data, status, headers, config) {
                     $rootScope.$emit("CallParentMethod", {});
            });
            $uibModalInstance.close();
        }
    };


    $scope.uploadPic = function(file) {
        $scope.isBusy = true;
        file.upload = Upload.upload({
            url: '/usuario_cms',
            data: {archivo: file, login: $scope.login, password: $scope.password,
                permisos: $scope.permisos, email: $scope.email, nombre: $scope.nombre}
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
                if(file.result){

                    $scope.picFile2   = '';

                    $uibModalInstance.close();
                    sweet.show('Exitoso', 'success');
                    $rootScope.$emit("CallParentMethod", {});

                }
            });
        }, function (response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.controller('ModalEditCtrl', function ($scope, $uibModalInstance, user, $http, $rootScope, Upload, $timeout, sweet) {

    $scope.user = user;
    $scope.user.password = user.re_password;

    $scope.uploadPic = function(file) {
        file.upload = Upload.upload({
            method: 'POST',
            url: '/usuarios_cms/' + $scope.user.id,
            data: {archivo: file, login: $scope.user.login, password: $scope.user.password,
                permisos: $scope.user.permisos, email: $scope.user.email, nombre: $scope.user.nombre}
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
                if(file.result){

                    $scope.picFile2   = '';

                    $uibModalInstance.close();
                    sweet.show('Exitoso', 'success');
                    $rootScope.$emit("CallParentMethod", {});

                }
            });
        }, function (response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }


    $scope.edit = function (form) {

        $scope.submitted = true;
        if (form.$valid) {
            $http.put('/usuario_cms/' + $scope.user.id, $scope.user)
                .success(function(data, status, headers, config) {
                    $rootScope.$emit("CallParentMethod", {});
                });

            $uibModalInstance.close();

        }

    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.controller('variablesController', function($scope, $http, $uibModal, $rootScope, DTOptionsBuilder, sweet) {

    $scope.variables = [];
    $scope.loading = false;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(5)
        .withOption('bLengthChange', false);

    $scope.initVariable = function() {
        $scope.loading = true;
        $http.get('/variables1').
        success(function(data, status, headers, config) {
            $scope.variables = data;
            console.log($scope.variables);
            $scope.loading = false;

        });
    };

    $scope.updateUser = function(todo) {
        $scope.loading = true;

        $http.put('/home' + todo.id, {
            title: todo.title,
            done: todo.done
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.loading = false;

        });;
    };

    $scope.deleteVariable = function(index) {
        $scope.loading = true;

        sweet.show({
            title: 'Confirmar',
            text: 'Borrar este Articulo',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Si, Borrar',
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                // var user = $scope.user[index];
                $http.delete('/variables1/' + index)
                    .success(function() {
                        $scope.initVariable();
                        $scope.loading = false;

                    });
                sweet.show('Borrado!', 'Ha sido Borrado con Exito.', 'success');
            }else{
                sweet.show('Cancelar', ':)', 'error');
            }
        });

    };


    $scope.animationsEnabled = true;

    $scope.addVariables = function (size) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalAddVariableCtrl',
            size: size

        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };


    $scope.editVariable = function (variable) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent1.html',
            controller: 'ModalEditVariableCtrl',
            size: 'md',
            resolve: {
                variable: function () {
                    return variable;
                }
            }
        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };

    $rootScope.$on("CallParentMethod1", function(){
        $scope.initVariable();
    });


    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };

});

app.controller('ModalAddVariableCtrl', function ($scope, $uibModalInstance, $http, $rootScope) {

    $scope.save = function (form) {

        $scope.submitted = true;
        if (form.$valid) {
            $http.post('/variables1', $scope.variable)
                .success(function(data, status, headers, config) {
                    $rootScope.$emit("CallParentMethod1", {});
                });

            $uibModalInstance.close();

        }

    };


    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.controller('ModalEditVariableCtrl', function ($scope, $uibModalInstance, variable, $http, $rootScope) {

    $scope.variable = variable;

    //console.log(user);

    $scope.edit = function (form) {

        $scope.submitted = true;
        if (form.$valid) {
            $http.put('/variables1/' + $scope.variable.id, $scope.variable)
                .success(function(data, status, headers, config) {
                    $rootScope.$emit("CallParentMethod1", {});
                });

            $uibModalInstance.close();

        }

    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.controller('SliderCtrl', function ($scope, $uibModal, $http) {

    $scope.sliders = [];

    $scope.initSlider = function() {
        $scope.loading = true;
        $http.get('/sliders').
        success(function(data, status, headers, config) {
            $scope.sliders = data;
        });
    };


    $scope.addSlider = function (size) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalFileCtrl',
            size: size

        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };




});




app.controller('ModalFileCtrl', function ($scope, $uibModalInstance, $http, $rootScope, Upload, $timeout, sweet) {

    $scope.uploadPic = function(file, file1, file2) {
        $scope.isBusy = true;
        file.upload = Upload.upload({
            url: '/slider',
            data: {archivo: file, icono:file1, thumbs:file2, titulo: $scope.titulo, texto: $scope.texto,
                   descripcion: $scope.descripcion, nivel: $scope.nivel }
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
                if(file.result){

                    $scope.picFile1   = '';
                    $scope.picFile2   = '';
                    $scope.picFile3   = '';
                    $uibModalInstance.close();
                    sweet.show('Exitoso', 'success');

                    $scope.sliders = [];

                        $http.get('/sliders').
                        success(function(data, status, headers, config) {
                            $scope.sliders = data;
                        });



                }
            });
        }, function (response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.controller('AlianzasController', function($scope, $http, $uibModal, $rootScope, DTOptionsBuilder, sweet) {

    $scope.alianzas = [];
    $scope.loading = false;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(5)
        .withOption('bLengthChange', false);

    $scope.initAlianzas = function() {
        $scope.loading = true;
        $http.get('/alianzas').
        success(function(data, status, headers, config) {
            $scope.alianzas  = data;
            $scope.loading = false;

        });
    };

    $scope.addAlianza = function (size) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalAlianzaCtrl',
            size: size

        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };


    $scope.updateAlianzas = function(todo) {
        $scope.loading = true;

        $http.put('/alianzas' + todo.id, {
            title: todo.title,
            done: todo.done
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.loading = false;

        });;
    };

    $scope.deleteAlianzas = function(index) {
        $scope.loading = true;

        sweet.show({
            title: 'Confirmar',
            text: 'Borrar este Articulo',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Si, Borrar',
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                // var user = $scope.user[index];
                $http.delete('/alianzas/' + index)
                    .success(function() {
                        $scope.initAlianzas();
                    });
                sweet.show('Borrado!', 'Ha sido Borrado con Exito.', 'success');
            }else{
                sweet.show('Cancelar', ':)', 'error');
            }
        });
    };
    $scope.editAlianza = function (variable) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent1.html',
            controller: 'ModalEditAlianzaCtrl',
            size: 'md',
            resolve: {
                variable: function () {
                    return variable;
                }
            }
        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };

    $rootScope.$on("alianza", function(){
        $scope.initAlianzas();
    });


    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };

});

app.controller('ModalAlianzaCtrl', function ($scope, $uibModalInstance, $http, $rootScope, Upload, $timeout, sweet) {

    $scope.uploadPic = function(file) {
        $scope.isBusy = true;
        file.upload = Upload.upload({
            url: '/alianzas',
            data: {archivo: file, titulo: $scope.titulo, url: $scope.url}
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
                if(file.result){

                    $scope.picFile1   = '';
                    $scope.picFile2   = '';
                    $scope.picFile3   = '';
                    $uibModalInstance.close();
                    sweet.show('Exitoso', 'success');

                    $scope.sliders = [];
                    $rootScope.$emit("alianza", {});




                }
            });
        }, function (response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };


});


app.controller('ModalEditAlianzaCtrl', function ($scope, $uibModalInstance, variable, $http, $rootScope, Upload) {

    $scope.alianzas = variable;

    //console.log(user);

    $scope.uploadPic = function(file) {
        file.upload = Upload.upload({
            method: 'POST',
            url: '/alianzas/' + $scope.alianzas.id,
            data: {archivo: file, titulo: $scope.alianzas.titulo, url: $scope.alianzas.url}
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
                if(file.result){

                    $scope.picFile   = '';

                    $uibModalInstance.close();
                    sweet.show('Exitoso', 'success');

                    $rootScope.$emit("alianza", {});

                }
            });
        }, function (response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.controller('principalCtrl', function ($scope, $uibModal, $http, $rootScope, sweet) {

    $scope.principals = [];
    $scope.initPrincipals = function() {
        $http.get('/principals').
        success(function(data, status, headers, config) {
            $scope.principals = data;
        });
    };

    $scope.addPrincipal = function (size) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalEditPrincipalCtrl',
            size: 'lg'

        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };


    $scope.editPrincipals = function (variable) {

        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalEditVariableCtrl',
            size: 'md',
            resolve: {
                variable: function () {
                    return variable;
                }
            }
        });

        modalInstance.result.then(function () {

        }, function () {

        });
    };

    $scope.deletePrincipals = function(index) {
        $scope.loading = true;

        sweet.show({
            title: 'Confirmar',
            text: 'Borrar este Articulo',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Si, Borrar',
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                // var user = $scope.user[index];
                $http.delete('/principals/' + index)
                    .success(function() {
                        $scope.initPrincipals();
                    });
                sweet.show('Borrado!', 'Ha sido Borrado con Exito.', 'success');
            }else{
                sweet.show('Cancelar', ':)', 'error');
            }
        });
    };

    $rootScope.$on("principals", function(){
        $scope.initPrincipals();
    });

});
app.controller('ModalPrincipalCtrl', function ($scope, $uibModalInstance, $http, $rootScope, sweet, $rootScope) {

    $scope.save = function (form) {

        $scope.submitted = true;
        if (form.$valid) {
            $http.post('/principals', $scope.principal)
                .success(function(data, status, headers, config) {
                    $rootScope.$emit("principals", {});
                    sweet.show('Exitoso', 'success');
                });
            $uibModalInstance.close();
        }

    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.controller('ModalEditVariableCtrl', function ($scope, $uibModalInstance, variable, $http, $rootScope, sweet) {

    $scope.principal = variable;

    //console.log(user);

    $scope.edit = function (form) {

        $scope.submitted = true;
        if (form.$valid) {
            $http.put('/principals/' + $scope.principal.id, $scope.principal)
                .success(function(data, status, headers, config) {
                    $rootScope.$emit("principals", {});
                    sweet.show('Exitoso', 'success');
                });

            $uibModalInstance.close();

        }

    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

app.value('uiTinymceConfig', {})
app.directive('uiTinymce', ['uiTinymceConfig', function(uiTinymceConfig) {
    uiTinymceConfig = uiTinymceConfig || {};
    var generatedIds = 0;
    return {
        require: 'ngModel',
        link: function(scope, elm, attrs, ngModel) {
            var expression, options, tinyInstance;
            // generate an ID if not present
            if (!attrs.id) {
                attrs.$set('id', 'uiTinymce' + generatedIds++);
            }
            options = {
                // Update model when calling setContent (such as from the source editor popup)
                setup: function(ed) {
                    ed.on('init', function(args) {
                        ngModel.$render();
                    });
                    // Update model on button click
                    ed.on('ExecCommand', function(e) {
                        ed.save();
                        ngModel.$setViewValue(elm.val());
                        if (!scope.$$phase) {
                            scope.$apply();
                        }
                    });
                    // Update model on keypress
                    ed.on('KeyUp', function(e) {
                        console.log(ed.isDirty());
                        ed.save();
                        ngModel.$setViewValue(elm.val());
                        if (!scope.$$phase) {
                            scope.$apply();
                        }
                    });
                },
                mode: 'exact',
                elements: attrs.id
            };
            if (attrs.uiTinymce) {
                expression = scope.$eval(attrs.uiTinymce);
            } else {
                expression = {};
            }
            angular.extend(options, uiTinymceConfig, expression);
            setTimeout(function() {
                tinymce.init(options);
            });


            ngModel.$render = function() {
                if (!tinyInstance) {
                    tinyInstance = tinymce.get(attrs.id);
                }
                if (tinyInstance) {
                    tinyInstance.setContent(ngModel.$viewValue || '');
                }
            };
        }
    };
}]);