/**
 * Created by marcelo on 20-01-2016.
 */
var app = angular.module('app',[]);
var items = [];
function SaveController($scope, $http) {
    $scope.save = function() {
        // validate inputs
        //added moore validations after
        if($('#username').val() !== '' && $('#email').val()  ) {
            var u = String($('#username').val());
            var em = String($('#email').val());
            var item = {cart : null, username : null, email : null} ;
           if(!$scope.userExists(items, u)){
                item.cart = addedUserProducts;
                item.username = u;
                item.email = em;
                items.push(item);
            } else {
                $.each(items, function( index, value ) {
                    // replace cart
                    if(u === items[index].username) {
                        items[index].cart = addedUserProducts ;
                    }
                });
            }
            console.log(items);
        } else {
            alert('Error: Invalid data!')
        }
    };

        // check if product exist in cart by id
    $scope.userExists = function(data, id) {
        return data.some(function (el) {
            return el.username === id;
        });
    }
}
