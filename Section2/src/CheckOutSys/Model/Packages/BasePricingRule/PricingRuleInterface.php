<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:47 PM
 */

namespace CheckOutSys\Model\Packages\BasePricingRule;


use CheckOutSys\Model\Filters\Filter;
use CheckOutSys\Model\Filters\Policies\Policy;
use CheckOutSys\Model\Products\Product;

/**
 * Interface PricingRuleInterface
 * @package CheckOutSys\Model\Packages\BasePricingRule
 */
interface PricingRuleInterface
{
    /**
     * @param Product $item
     */
    public function scan(Product $item) : void;

    /**
     * @param Filter|null $filter
     * @return array
     */
    public function total(?Filter $filter = null) : array ;
}