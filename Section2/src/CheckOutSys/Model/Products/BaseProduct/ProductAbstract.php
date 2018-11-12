<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:52 PM
 */

namespace CheckOutSys\Model\Products\BaseProduct;


use Exception;

/**
 * Class ProductAbstract
 * @package CheckOutSys\Model\Products\BaseProduct
 */
abstract class ProductAbstract
{
    /**
     * @var object
     */
    protected $product;

    /**
     * ProductAbstract constructor.
     * @param string $sku
     * @throws Exception
     */
    function __construct(string $sku)
    {
        $this->product = $this->search(
            json_decode(
                file_get_contents(__DIR__ . "/../../data.json")
            ), $sku);
    }

    /**
     * @param array $data
     * @param string $sku
     * @return object
     * @throws Exception
     */
    function search(array $data, string $sku) : object
    {
        foreach ($data as $item)
        {
            if ($item->sku == $sku)
                return $item;
        }
        throw new Exception("$sku does not exist!");
    }

    /**
     * @return null|string
     */
    abstract protected function getId() : ?string ;

    /**
     * @return float|null
     */
    abstract protected function getPrice() : ?float ;

    /**
     * @return null|string
     */
    abstract protected function getName() : ?string ;

    /**
     * @return null|string
     */
    abstract protected function getSku() : ?string ;
}