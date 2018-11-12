<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:53 PM
 */

namespace CheckOutSys\Model\Products;

//use CheckOutSys\Model\Products\ProductAbstract;

use CheckOutSys\Model\Products\BaseProduct\ProductAbstract;

/**
 * Class Product
 * @package CheckOutSys\Model\Products
 */
class Product extends ProductAbstract
{
    /**
     * Product constructor.
     * @param string $sku
     * @throws \Exception
     */
    function __construct(string $sku){
        parent::__construct($sku);
    }

    /**
     * @return float|null
     */
    public function getPrice() : ?float
    {
        return $this->product->price ?? null;
    }

    /**
     * @return null|string
     */
    public function getName() : ?string
    {
        return $this->product->name ?? null;
    }

    /**
     * @return null|string
     */
    public function getSku() : ?string
    {
        return $this->product->sku ?? null;
    }

    /**
     * @return null|string
     */
    public function getId() : ?string
    {
        return $this->product->id ?? null;
    }
}