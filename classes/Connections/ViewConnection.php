<?php

namespace connections;

class ViewConnection
{
    public function view()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){

            $displayProduct = new \Ctrl\DisplayProducts;

            $result;

            $result = json_encode($displayProduct->displayAllProducts());

            echo $result;


        }

    }
}