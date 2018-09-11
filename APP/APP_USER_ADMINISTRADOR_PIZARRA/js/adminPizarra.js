'use strict'

angular.module('adminPizarra',[]).controller('adminPizarraCtrl', function($scope, adminPizarraServ, $http, $filter){

    $scope.tablePizarra = true;
    $scope.action = false;
    $scope.result = false;
    $scope.pizarras = [];
    $scope.p = {};//pizarra model

    $scope.showAddPizarra = function(){
        $scope.tablePizarra = false;
        $scope.action = true;
    };

    $scope.cancelar = function(){
        //verificar los archivos
        $scope.tablePizarra = true;
        $scope.action = false;
    };

    $scope.getPizarras = function(){
        /*
        adminPizarraServ.get_Pizarras().then(function success(data) {
            $scope.pizarras = response.data;
            //console.log(data);
        }, function error(response) {
            //console.log(response);
        })
        */


        $http.get("VIEW/LIST.php").then(function(response) {
            $scope.pizarras = response.data;
            //console.log(response.data)
            })
        $scope.p = {};

    };

    $scope.createPizarra = function(p){
      console.log(p);
    };

}).directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                scope.$apply(function () {
                    scope.fileread = changeEvent.target.files[0];
                    // or all selected files:
                    // scope.fileread = changeEvent.target.files;
                });
            });
        }
    }
}]);