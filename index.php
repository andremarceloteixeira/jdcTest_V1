<!DOCTYPE html>
<html lang="en" ng-app="app">
<?php
/**
 * Created by PhpStorm.
 * User: marcelo.teixeira
 * Date: 18/01/16
 * Time: 13:59
 */
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JDC JS TEST</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/2-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">JDC JS Test for Julien SANCHEZ  by Marcelo Teixeira</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#jdcSaveUserDataModal">Save my Cart</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Modal -->
    <div id="jdcSaveUserDataModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Save user cart data</h4>
                </div>
                <div class="modal-body">
                    <p>Save user cart data...</p>
                    <form role="form"  ng-app  ng-controller="SaveController">
                        <div class="form-group">
                            <label for="username">User Name:</label>
                            <input type="username" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <button ng-click="save()" type="submit" class="btn btn-default">Save data</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">E-Shop Cart
                    <small>node.js, angular.js, jquery.js for Julien SANCHEZ </small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row" ng-app ng-controller="CartController" data-ng-init="init()">
            <div class="col-md-6 portfolio-item">
                <form>
                    <h1>Product List</h1>
                    <ul>
                        <li ng-repeat="product in products">
                            <!-- Notice the use of the currency filter, it will format the price -->
                            {{product.nom}} <span class="glyphicon glyphicon-plus-sign" data-id="{{ product.id}}" ng-click="addToCart(product)"></span>
                            <span style="margin-right: 10px;">{{ product.prix | currency}}</span>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="col-md-6 portfolio-item">
                <form class="form-cart">
                    <h1>Cart Resume</h1>
                    <button ng-click="cleanCart()" type="button" class="btn btn-danger">Clear all products added to cart </button>
                    <ul>
                        <li ng-repeat="cartProduct in productsAdded">
                            <!-- Notice the use of the currency filter, it will format the price -->
                                {{cartProduct.count}} x {{cartProduct.nom}} <span class="glyphicon glyphicon-minus-sign" data-id="{{ cartProduct.id}}" ng-click="remove(cartProduct)"></span>
                            <span style="margin-right: 10px;">{{ cartProduct.prix | currency}}</span>
                        </li>
                    </ul>
                    <div class="total">
                        TOTAL: <span>{{total() | currency}}</span>
                    </div>
                    <div class="total">
                        Total Products: <span>{{totalProductsInCart()}}</span>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Jdc test 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->
    <!-- Include AngularJS from Google's CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
    <script src="js/myscript.js"></script>
    <script src="js/save-controller.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
