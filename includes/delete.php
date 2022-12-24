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
    $product_id = $data->iD;
    print_r($product_id);



    //instantiate AddProductctrl class
    include '../classes/dbh.class.php';
    include '../classes/module.class.php';
    include '../classes/ctrl.class.php';

$productid = $product_id;
$i = 0;

while ( $i < count($productid))
{
    $product_id = $productid[$i];

    $deleteProduct = new DeleteProdCtrl($product_id);
    $deleteProduct->deleteProduct();

    $i++;
};

// echo 'starting'.'<br/>';

// for ($i; $i < count($productid); $i++){
//     $product_id = $productid[$i];

//     $deleteProduct = new DeleteProdCtrl($product_id);
//     $deleteProduct->deleteProduct();

//     echo 'done'.'<br/>';

// };   
}