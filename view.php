<?php

    require 'includes/autoloader.inc.php';

    $httpConn = new Connections\HttpConnect;
    $httpConn->httpConn();

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){

        $displayProduct = new Ctrl\DisplayProducts;

        $result;

        $result = json_encode($displayProduct->displayAllProducts());

        echo $result;


    }
