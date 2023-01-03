<?php

namespace Ctrl;

//delete product ctrl class
class DeleteProdCtrl extends \Modules\DeleteProducts
{
    //product id
    protected $product_id;
    //get product id
    public function __construct($product_id)
    {
        $this->product_id = $product_id;
    }

    //run setDelete function
    public function deleteProduct()
    {
        $this->setDelete($this->product_id);
    }
}
