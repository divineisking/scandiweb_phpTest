<?php
//instantiate httpconnect class
require 'includes/autoloader.inc.php';

$httpConn = new Connections\HttpConnect;
$httpConn->httpConn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     //get data from frontend
     $json = file_get_contents('php://input');

    //decode json data
    $data = json_decode($json);
    $product_id = $data->iD;

    //instantiate AddProductctrl class
    $productid = $product_id;
    $i = 0;

    while ($i < count($productid)) {
        $product_id = $productid[$i];

        $deleteProduct = new Ctrl\DeleteProdCtrl($product_id);
        $deleteProduct->deleteProduct();

        $i++;
    };
}
