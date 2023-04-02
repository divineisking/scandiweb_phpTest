<?php

namespace Type;

class Book extends \Product\Product
{
    //product features
    protected $product_name;
    protected $product_sku;
    protected $product_price;
    protected $product_attributes;

    public function addBook($product_name, $product_sku, $product_price, $product_attributes)
    {
        $this->product_name = $product_name;
        $this->product_sku = $product_sku;
        $this->product_price = $product_price;
        $this->product_attributes = $product_attributes;

        $this->addProduct($product_name, $product_sku, $product_price, $product_attributes);
    }


}