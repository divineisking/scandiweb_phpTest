<?php

namespace Product;

abstract class Product extends \Product\Module
{
    //product features
    protected $product_name;
    protected $product_sku;
    protected $product_price;
    protected $product_attributes;
    protected $product_id;
    //methods to add product to DB

    public function addProduct($product_name, $product_sku, $product_price, $product_attributes)
    {
        $this->product_name = $product_name;
        $this->product_sku = $product_sku;
        $this->product_price = $product_price;
        $this->product_attributes = $product_attributes;

        if ($this->invalidSku() == false) :
            //error "invalid sku"
            header("location: ../index.html?error=invalidsku");
            exit();
        endif;
        if ($this->skuTakenCheck() == false) :
            //error "Sku already exists"

            echo 'sku already exists';
            http_response_code(204);
            exit();
        endif;


        $this->setProducts($this->product_name, $this->product_sku, $this->product_price, $this->product_attributes);
    }

    //check if sku is alphanumeric
    private function invalidSku()
    {
        $result;

        if (!preg_match("/[a-zA-Z0-9]/", $this->product_sku)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    //check if sku already exist
    private function skuTakenCheck()
    {
        $result;

        if (!$this->checkSku($this->product_sku)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    //run get products function
    public function displayAllProducts()
    {
        $products = $this->getProducts();
        return $products;
    }

    //product id
    //run setDelete function
    public function deleteProduct($product_id)
    {
        $this->product_id = $product_id;
        $this->setDelete($this->product_id);
    }
}