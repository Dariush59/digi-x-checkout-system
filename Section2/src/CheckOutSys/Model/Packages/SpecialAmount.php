<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:48 PM
 */

namespace CheckOutSys\Model\Packages;


use CheckOutSys\Model\Filters\Filter;
use CheckOutSys\Model\Filters\Policies\Policy;
use CheckOutSys\Model\Packages\BasePricingRule\PricingRuleInterface;
use CheckOutSys\Model\Products\Product;
use function var_dump;

/**
 * Class SpecialAmount
 * @package CheckOutSys\Model\Packages
 */
class SpecialAmount implements PricingRuleInterface
{
    /**
     * @var array
     */
    protected $item = [];
    /**
     * @var array
     */
    protected $grossAmount = [];

    /**
     * @param Product $item
     */
    public function scan(Product $item) : void
    {
        $this->item[$item->getSku()][] = $item->getPrice();
        $this->grossAmount[] = $item->getPrice();
    }

    /**
     * @param Filter|null $filter
     * @return array
     * @throws \Exception
     */
    public function total(Filter $filter = null) : array
    {
        $filter->register($this->item);
        $reduced = [];
        $reduced[] = $filter->three​For​TwoDeal();
        $reduced[] = $filter->discountAfterBuying();
        $reduced[] = $filter->​free​Of​Charge​();
        foreach ( array_keys($this->item) as $key)
            $skus[$key] = count($this->item[$key]);

        return ["net" => array_sum($this->grossAmount) - array_sum($reduced) , "SKUs" => $skus];
    }
}