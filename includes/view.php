<?php

    $result;

    //return json_encode($viewProduct->showAllProducts());

    include '../classes/http.class.php';
    include '../classes/dbh.class.php';
    include '../classes/module.class.php';
    include '../classes/ctrl.class.php';

    $httpConn = new HttpConnect;
    $httpConn->httpConn();
    $viewProduct = new ViewProducts;
    


    //$viewProduct->showAllProducts();
    $result = json_encode($viewProduct->showAllProducts());

    echo $result;

  

    
