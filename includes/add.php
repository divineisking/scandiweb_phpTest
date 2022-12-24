<?php
//instantiate httpconnect class
include '../classes/http.class.php';

$httpConn = new HttpConnect;
$httpConn->httpConn();



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //get data from frontend
    $json = file_get_contents('php://input');

    //decode json data
    $data = json_decode($json);

    //break down data sent
    $products = $data->productAttributes;
    $product_sku = $products->product_sku;
    $product_name = $products->product_name;
    $product_attributes = $products->product_attribute;
    $product_price = $products->product_price;
    
    //send data to db
    //instantiate AddProductctrl class
    include '../classes/dbh.class.php';
    include '../classes/module.class.php';
    include '../classes/ctrl.class.php';

    $addProduct = new AddProductCtrl($product_name, $product_sku,  $product_price, $product_attributes);
    $addProduct->addProduct();

    
}

?>