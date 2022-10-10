<?php

    header('Access-Control-Allow-Origin: *',
    "Access-Control-Allow-Credentials : true "
);

    $result;

    //return json_encode($viewProduct->showAllProducts());

    include '../classes/dbh.class.php';
    include '../classes/productClass.class.php';
    include '../classes/addctrl.class.php';

    $viewProduct = new ViewProducts;


    //$viewProduct->showAllProducts();
    $result = json_encode($viewProduct->showAllProducts());

    echo $result;
 

   
     //$viewProduct->showAllProducts();

  

    
