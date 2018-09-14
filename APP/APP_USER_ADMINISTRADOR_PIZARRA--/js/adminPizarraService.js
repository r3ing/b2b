'use strict'

angular.module('adminPizarra').factory('adminPizarraServ', function($http){

    var _adminPizarraServ = {};

    _adminPizarraServ.get_Pizarras = function(){
        return $http.get('DB/LIST.php');
    };

    return _adminPizarraServ;
});
