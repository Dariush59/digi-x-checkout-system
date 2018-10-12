<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:42 PM
 */

namespace CheckOutSys\Model\Checkout;


use CheckOutSys\Handler\Filter;
use CheckOutSys\Model\Packages\PricingRuleInterface;
use CheckOutSys\Model\Products\ProductInterface;

class Checkout
{
    protected $pricingRules;

    public function __construct(PricingRuleInterface $pricingRules) {
        $this->pricingRules = $pricingRules;
    }
    public function scan(ProductInterface $product) {
        $this->pricingRules->scan($product->product);
    }
    public function total(Filter $filter){
        return $this->pricingRules->total($filter);
    }
}