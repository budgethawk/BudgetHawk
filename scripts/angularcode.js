var budgetApp = angular.module('budgetApp', []);

budgetApp.controller("purchaseCtrl", ['$scope', '$http', function ($scope, $http) { 
    getInfo();
    function getInfo() {
    $http.post('scripts/purchasedetails.php').success(function (data) {
				
		$scope.purchases = data;
    });
    }
    
    // Enabling show_form variable to enable Add Purchase button
    $scope.show_form = true;
    // Function to add toggle behaviour to form
    
    $scope.formToggle =function(){
    $('#newpurchaseform').slideToggle();
    $('#editpurchaseform').css('display', 'none');
    }
    
    $scope.insertPurchase = function(purchase){
    $http.post('scripts/insertpurchase.php',{"amount":purchase.amount,"merchant":purchase.merchant,"purchasedate":purchase.purchasedate}).success(function(data){
    if (data == true) {
    getInfo();
    // Hide details insertion form
    $('#newpurchaseform').css('display', 'none');
    }
    });
    }
    
    $scope.currentPurchase = {};
    $scope.editPurchase = function(purchase){
    $scope.currentPurchase = purchase;
    $('#newpurchaseform').slideUp();
    $('#editpurchaseform').slideToggle();
    }
    
    $scope.editPurchase = function(purchase){
    $http.post('scripts/updatepurchase.php',{"amount":purchase.amount,"merchant":purchase.merchant,"purchasedate":purchase.purchasedate}).success(function(data){
    $scope.show_form = true;
    if (data == true) {
    getInfo();
    }
        
    });
    }
    
}]);

/*var app = angular.module('budgetApp', []);

app.controller('purchaseCtrl', function($scope, $http) {
    $http.post("http://ec2-54-242-125-128.compute-1.amazonaws.com/scripts/populatetable.php")
    .then(function (response) {$scope.purchases = response.data.records;});
}); */

/*
var app = angular.module('budgetApp', []);

app.controller('purchaseCtrl',['$scope', '$http', function($scope, $http) {
    getPurchase();
    function getPurchase() {
        $http.post("http://ec2-54-242-125-128.compute-1.amazonaws.com/scripts/populatetable.php")
        .then(function (response) {$scope.purchases = response.data.records;});
    }    

    $scope.insertPurchase = function(purchase) {
                                $http.post("http://ec2-54-242-125-128.compute-1.amazonaws.com/scripts/insertpurchase.php", {"amount":purchase.amt, "merchant":purchase.merchant, "purchaseDate":purchase.purchaseDate})
                                .then(function (data)){
                                if (data == true) {
                                getPurchase();
                                        }
                                    }
                                }
                                
}]);


*/