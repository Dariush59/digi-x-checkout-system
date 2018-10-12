<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:53 PM
 */

namespace CheckOutSys\Model\Products;

use CheckOutSys\Model\Products\ProductInterface;

class Product implements ProductInterface
{
    public $product;
    public function __construct(string $sku){
        $this->product = $this->search(json_decode(file_get_contents(__DIR__ . "/../data.json")), $sku);
    }

    function search(array $data, string $sku) {
        foreach ($data as $item)
        {
            if ($item->sku == $sku)
                return $item;
        }
        return null;
    }

    public function getPrice()
    {
        return $this->product->price;
    }

    public function getName()
    {
        return $this->product->name;
    }

    public function getSku()
    {
        return $this->product->sku;
    }

    public function getId()
    {
        return $this->product->id;
    }
}