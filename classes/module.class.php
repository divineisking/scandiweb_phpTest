<?php

//add product module class
abstract class AddProduct extends DbCon {
    
    public function setProducts($product_name, $product_price, $product_sku, $product_attributes) {
        $stmt = $this->connect()->prepare('INSERT  INTO products (product_name, product_sku, product_price, product_attributes) VALUES (?, ?, ?, ?);');

        if (!$stmt->execute([$product_name, $product_price, $product_sku, $product_attributes])) 
        {
            $stmt = null;
            header("location: ../index.html?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    
    //check product sku in database
    protected function checkSku($product_sku) {
        $stmt = $this->connect()->prepare('SELECT product_sku FROM products WHERE product_sku = ?;');

        if (!$stmt->execute([$product_sku])) 
        {
            $stmt = null;
            header("location: ../index.html?error=stmtfailed");
            exit();
        }

        //result from sku check
        $resultCheck;

        if($stmt->rowCount() > 0)
        {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;

        $stmt = null;
    }
};

//get oroducts module class
abstract class GetProducts extends DbCon{
    //retriveing products and products features
    //method to retrive product features

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0)
        {
            while ($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row;
            }
            return $data;
        }
    }
};

//delete product module class
abstract class DeleteProducts extends DbCon{
    //deleting product from DB
    //delete method
    public function setDelete($product_id){
        $sql = 'DELETE FROM products WHERE product_id = ?;';
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$product_id]))
        {
            $stmt = null;
            
            exit();
        }
    }
};


?>