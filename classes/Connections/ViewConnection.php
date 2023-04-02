<?php

namespace connections;

class ViewConnection extends \Product\Product
{
    public function view()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') :

            $result;

            $result = json_encode($this->displayAllProducts());

            echo $result;


        endif;

    }
}