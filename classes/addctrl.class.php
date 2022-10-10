<?php

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
        if ($this->invalidsku() == false)
        {
            //error "invalid sku"
            header("location: ../addProduct.php?error=invalidsku");
            exit();
        };
        if ($this->skuTakenCheck() == false)
        {
            //error "Sku already exists"
            header("location: ../addProduct.php?error=skuAlreadyExists");
            exit();
        };

        
            $this->setProducts($this->product_name, $this->product_sku, $this->product_price, $this->product_attributes);

       
       
        
    }

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
}