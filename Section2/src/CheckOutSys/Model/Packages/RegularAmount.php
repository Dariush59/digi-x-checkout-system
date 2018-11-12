<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:49 PM
 */

namespace CheckOutSys\Model\Packages;



use CheckOutSys\Model\Filters\Filter;
use CheckOutSys\Model\Filters\Policies\Policy;
use CheckOutSys\Model\Packages\BasePricingRule\PricingRuleInterface;

/**
 * Class RegularAmount
 * @package CheckOutSys\Model\Packages
 */
class RegularAmount implements PricingRuleInterface
{
    /**
     * @var array
     */
    protected $item = [];

    /**
     * @param \CheckOutSys\Model\Products\Product $item
     */
    public function scan($item) : void
    {
        $this->item['sku'][] = $item->getSku();
        $this->item['price'][] = $item->getPrice();
    }

    /**
     * @param Filter|null $filter
     * @return array
     */
    public function total(?Filter $filter = null) : array
    {
        return ["net" => array_sum($this->item['price']), "SKUs"=>$this->item['sku']];
    }
}