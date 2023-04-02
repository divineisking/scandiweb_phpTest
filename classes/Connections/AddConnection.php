<?php

namespace Connections;

class AddConnection extends \Product\Product
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            //get data from frontend
            $json = file_get_contents('php://input');

            //decode json data
            $data = json_decode($json);

            //break down data sent
            $products = $data->productAttributes;
            $product_sku = $products->product_sku;
            $product_name = $products->product_name;
            $product_attributes = $products->product_attribute;
            $product_price = $products->product_price;
            $Type = $products->product_type;

            //send data to db
            while ($Type === 'DVD'):
                $addDVD = new \Type\DVD;
                $addDVD->addDVD($product_name, $product_sku,
                $product_price, $product_attributes);
                die;
            endwhile;

            while ($Type === 'Book'):
                $addBook = new \Type\Book;
                $addBook->addBook($product_name, $product_sku,
                $product_price, $product_attributes);
                die;
            endwhile;

            while ($Type === 'Furniture'):
                $addFurniture = new \Type\Furniture;
                $addFurniture->addFurniture($product_name, $product_sku,
                $product_price, $product_attributes);
                die;
            endwhile;


        endif;
    }
}