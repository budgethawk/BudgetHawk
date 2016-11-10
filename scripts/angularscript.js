//<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

// Application module

var crudApp = angular.module('budgetApp', []);

budgetApp.controller("purchaseCtrl", ['$scope', '$http', function ($scope, $http) { 
    getInfo();
    function getInfo() {
    $http.post("purchasedetails.php").then(function (data) {
        $scope.purchases = data;
    });
    }
}]);

