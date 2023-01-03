<?php

namespace Modules;

//delete product module class
abstract class DeleteProducts extends \Connections\DbCon
{
    //deleting product from DB
    //delete method
    public function setDelete($product_id)
    {
        $sql = 'DELETE FROM products WHERE product_id = ?;';
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$product_id])) {
            $stmt = null;

            exit();
        }
    }
}
