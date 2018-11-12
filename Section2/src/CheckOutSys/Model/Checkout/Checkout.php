<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:42 PM
 */

namespace CheckOutSys\Model\Checkout;


use CheckOutSys\Model\Filters\Filter;
use CheckOutSys\Model\Filters\Policies\Policy;
use CheckOutSys\Model\Packages\BasePricingRule\PricingRuleInterface;
use CheckOutSys\Model\Products\Product;
use function var_dump;


/**
 * Class Checkout
 * @package CheckOutSys\Model\Checkout
 */
class Checkout
{
    /**
     * @var PricingRuleInterface
     */
    protected $pricingRules;

    /**
     * Checkout constructor.
     * @param PricingRuleInterface $pricingRules
     */
    public function __construct(PricingRuleInterface $pricingRules)
    {
        $this->pricingRules = $pricingRules;
    }

    /**
     * @param Product $product
     */
    public function scan(Product $product) : void
    {
        $this->pricingRules->scan($product);
    }

    /**
     * @param Filter|null $filter
     * @param Policy|null $policy
     * @return array
     */
    public function total(Filter $filter = null, Policy $policy = null) : array
    {
        return $this->pricingRules->total($filter, $policy);
    }
}