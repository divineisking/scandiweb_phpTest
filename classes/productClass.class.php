<?php


abstract class AddProduct extends DbCon {
    
    public function setProducts($product_name, $product_price, $product_sku, $product_attributes) {
        $stmt = $this->connect()->prepare('INSERT  INTO products (product_name, product_sku, product_price, product_attributes) VALUES (?, ?, ?, ?);');

        if (!$stmt->execute([$product_name, $product_price, $product_sku, $product_attributes])) 
        {
            $stmt = null;
            header("location: ../addProduct.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    
    protected function checkSku($product_sku) {
        $stmt = $this->connect()->prepare('SELECT product_sku FROM products WHERE product_sku = ?;');

        if (!$stmt->execute([$product_sku])) 
        {
            $stmt = null;
            header("location: ../addProduct.php?error=stmtfailed");
            exit();
        }

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

Abstract class GetProducts extends DbCon{
    //retriveing products and products features
    //method to retrive product features

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->connect()->query($sql);
        //$numRows = $result->num_rows;
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

class ViewProducts extends GetProducts {
    public function showAllProducts() {
        $products = $this->getProducts();
        return $products;
    }
};

abstract class DeleteProduct extends DbCon{
    //deleting product from DB
    public function deleteProducts(){
        $sql = "DELETE product FROM Products WHERE ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
    }
}


?>