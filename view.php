<?php



    require 'includes/autoloader.inc.php';
    //return json_encode($viewProduct->showAllProducts());
    //include 'classes/Connections/HttpConnect.php';

    $httpConn = new Connections\HttpConnect;
    $httpConn->httpConn();

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){

        //include 'classes/Ctrl/DisplayProducts.php';

        $displayProduct = new Ctrl\DisplayProducts;

        $result;

        //$viewProduct->showAllProducts();
        $result = json_encode($displayProduct->displayAllProducts());

        echo $result;


    }
