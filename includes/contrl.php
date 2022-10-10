<?php


if (isset($_POST['submit']))
    {
        //grabbing data
        $product_sku = $_POST['product_sku'];
        $product_name = $_POST['product_name'];
        $product_attributes = $_POST['product_attributes'];
        $product_price = $_POST['product_price'];

        //instaniate AddProductctrl class
    include '../classes/dbh.class.php';
    include '../classes/productClass.class.php';
    include '../classes/addctrl.class.php';

        $addProduct = new AddProductCtrl($product_name, $product_sku,  $product_price, $product_attributes);
        $addProduct->addProduct();
    //go back to front page

    

  header("location: ../addProduct.php");

        
    }

    

?>