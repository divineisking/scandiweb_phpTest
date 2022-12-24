<?php

//add product ctrl class
class AddProductCtrl extends AddProduct{
    //product features
    protected $product_name;
    protected $product_sku;
    protected $product_price;
    protected $product_attributes;
    //methods to add product to DB

    public function __construct($product_name, $product_sku, $product_price, $product_attributes) {
        $this->product_name = $product_name;
        $this->product_sku = $product_sku;
        $this->product_price = $product_price;
        $this->product_attributes = $product_attributes;
    }

    public function addProduct(){
        if ($this->invalidSku() == false)
        {
            //error "invalid sku"
            header("location: ../index.html?error=invalidsku");
            exit();
        };
        if ($this->skuTakenCheck() == false)
        {
            //error "Sku already exists"
    
            echo 'sku already exists';
            http_response_code(204);
            exit();
        };

        
        $this->setProducts($this->product_name, $this->product_sku, $this->product_price, $this->product_attributes);

       
       
        
    }

    //check if sku is alphanumeric
    private function invalidSku() 
    {
        $result;

        if (!preg_match("/[a-zA-Z0-9]/", $this->product_sku))
        {
            $result = false;
        }
        else
        (
            $result = true
        );
        return $result;
    }

    //check if sku already exist
    private function skuTakenCheck() {
        $result;

        if (!$this->checkSku($this->product_sku))
        {
            $result = false;
        }
        else
        (
            $result = true
        );
        return $result;
    }
};

//view product ctrl class
class ViewProducts extends GetProducts {

    //run get products function
    public function showAllProducts() {
        $products = $this->getProducts();
        return $products;
    }
};

//delete product ctrl class
class DeleteProdCtrl extends DeleteProducts {
    //product id
    protected $product_id;

    //get product id 
    public function __construct($product_id) {
        $this->product_id = $product_id;
    }

    //run setDelete function
    public function deleteProduct() {
        $this->setDelete($this->product_id);
    }
}