/**
 * Created by PhpStorm.
 * User: marcelo.teixeira
 * Date: 19/01/16
 * Time: 6:02
 * This is Server
 */
var addedUserProducts;
var app = angular.module('app',[]);
function CartController($scope, $http){
	var total = 0;
	var totalProductsinCart = 0;
	$scope.productsAdded = [];
	// load products via node JS
	// Read Json File in the server side
	$scope.init = function() {
		var req = {
			method: 'GET',
			url: 'http://localhost:8080/read-json',
			headers: {
				'Content-Type': undefined
			}
		}
		/*$http(req).then(function(response){
			console.log(response.data);
			$scope.products = response.data;
		});*/
	}
 
//not call node.js server
 $scope.products = [
  {
    "nom": "Product 1",
    "id": "1",
    "prix": "1.00"
  },
  {
    "nom": "Product 2",
    "id": "2",
    "prix": "2.00"
  },
  {
    "nom": "Product 3",
    "id": "3",
    "prix": "3.00"
  },
  {
    "nom": "Product 4",
    "id": "4",
    "prix": "4.00"
  },
  {
    "nom": "Product 5",
    "id": "5",
    "prix": "5.00"
  },
  {
    "nom": "Product 6",
    "id": "6",
    "prix": "6.00"
  },
  {
    "nom": "Product 7",
    "id": "7",
    "prix": "7.00"
  },
  {
    "nom": "Product 8",
    "id": "8",
    "prix": "8.00"
  },
  {
    "nom": "Product 9",
    "id": "9",
    "prix": "9.00"
  },
  {
    "nom": "Product 10",
    "id": "10",
    "prix": "10.00"
  },
  {
    "nom": "Product 11",
    "id": "11",
    "prix": "11.00"
  }
];
	//remove add to cart product
	$scope.addToCart = function(product){
		//if product exists in cart
		if ($scope.productExistsInCartCheckById($scope.productsAdded, product.id)) {
			console.log('product exists');
			$scope.addToExistingProduct(product);
		} else {
			console.log('not product exists!!');
			$scope.addNewProductToCart(product);
		}
		total+= parseFloat(product.prix);
		totalProductsinCart++;
	};
	//remove product
	$scope.remove = function(product){
		//if product exists in cart
		$.each($scope.productsAdded, function( index, value ) {
			if(product.id === value.id) {
				$scope.productsAdded[index].count = $scope.productsAdded[index].count - 1 ;
				total = total - parseFloat($scope.productsAdded[index].prix);
				totalProductsinCart--;
				if($scope.productsAdded[index].count == 0 ) {
					$scope.productsAdded.splice(index,1);
				}
			}
		});
	};
	// Return Total Cost
	$scope.total = function() {
		return total;
	};

	// Return Total Products
	$scope.totalProductsInCart = function() {
		return totalProductsinCart;
	};
	// Clean Cart
	$scope.cleanCart = function() {
		$scope.productsAdded = [];
		total = 0;
		totalProductsinCart = 0;
	};

	// increment qty
	$scope.addToExistingProduct = function(product) {
		$.each($scope.productsAdded, function( index, value ) {
			if(product.id === value.id) {
				$scope.productsAdded[index].count = $scope.productsAdded[index].count + 1 ;
			}
		});
	};
	// add new product in the cart
	$scope.addNewProductToCart = function(product) {
		product.count = 1;
		$scope.productsAdded.push(product);
	};

	// check if product exist in cart by id
	$scope.productExistsInCartCheckById = function(data, id) {
		return data.some(function (el) {
			return el.id === id;
		});
	}
	addedUserProducts = $scope.productsAdded;
}
