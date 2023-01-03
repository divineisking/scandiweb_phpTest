<?php

namespace Ctrl;

//view product ctrl class
class DisplayProducts extends \Modules\GetProducts
{

    //run get products function
    public function displayAllProducts()
    {
        $products = $this->getProducts();
        return $products;
    }
}
