<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:49 PM
 */

namespace CheckOutSys\Model\Packages;


use CheckOutSys\Handler\Filter;

class RegularAmount implements PricingRuleInterface
{
    protected $item = [];

    public function scan($item)
    {
        $this->item['sku'][] = $item->sku;
        $this->item['price'][] = $item->price;
    }

    public function total(Filter $filter)
    {
        return array_sum($this->item['price']);
    }
}