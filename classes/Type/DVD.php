<?php

namespace Type;

class DVD extends \Product\Product
{
    //product features
    protected $product_name;
    protected $product_sku;
    protected $product_price;
    protected $product_attributes;

    public function addDVD($product_name, $product_sku, $product_price, $product_attributes)
    {
        //product features
        $this->product_name = $product_name;
        $this->product_sku = $product_sku;
        $this->product_price = $product_price;
        $this->product_attributes = $product_attributes;

        $this->addProduct($product_name, $product_sku, $product_price, $product_attributes);
    }
}