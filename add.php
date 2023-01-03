<?php
//instantiate httpconnect class
//require 'includes/autoloader.inc.php';

require 'includes/autoloader.inc.php';

$httpConn = new Connections\HttpConnect;
$httpConn->httpConn();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $addProduct = new Ctrl\AddProductCtrl($product_name, $product_sku, $product_price, $product_attributes);
    $addProduct->addProduct();
}
