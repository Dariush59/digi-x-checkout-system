<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:47 PM
 */

namespace CheckOutSys\Model\Packages;


use CheckOutSys\Handler\Filter;
use CheckOutSys\Model\Products\Product;

interface PricingRuleInterface
{
    public function scan(Product $item);
    public function total(Filter $filter);
}