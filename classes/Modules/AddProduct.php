<?php

namespace Modules;

//add product module class
abstract class AddProduct extends \Connections\DbCon
{

    public function setProducts($product_name, $product_price, $product_sku, $product_attributes)
    {
        $stmt = $this->connect()->prepare('INSERT  INTO products (product_name, product_sku,
        product_price, product_attributes) VALUES (?, ?, ?, ?);');

        if (!$stmt->execute([$product_name, $product_price, $product_sku, $product_attributes])) {
            $stmt = null;
            header("location: ../index.html?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    //check product sku in database
    protected function checkSku($product_sku)
    {
        $stmt = $this->connect()->prepare('SELECT product_sku FROM products WHERE product_sku = ?;');

        if (!$stmt->execute([$product_sku])) {
            $stmt = null;
            header("location: ../index.html?error=stmtfailed");
            exit();
        }

        //result from sku check
        $resultCheck;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;

        $stmt = null;
    }
}
