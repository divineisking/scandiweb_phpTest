<?php

namespace Connections;

class DeleteConnection extends \Product\Product
{
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            //get data from frontend
            $json = file_get_contents('php://input');

           //decode json data
           $data = json_decode($json);
           $product_id = $data->iD;
           $productid = $product_id;
           $i = 0;

           while ($i < count($productid)) :
               $product_id = $productid[$i];

               //instantiate DeleteProdCtrl class
               //$this->constructId($product_id);
               $this->deleteProduct($product_id);

               $i++;
           endwhile;
        endif;
    }
}