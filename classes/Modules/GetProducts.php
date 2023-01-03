<?php

namespace Modules;
//include 'classes/Connections/DbCon.php';

//get products module class
abstract class GetProducts extends \Connections\DbCon
{
    //retriveing products and products features
    //method to retrive product features

    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
