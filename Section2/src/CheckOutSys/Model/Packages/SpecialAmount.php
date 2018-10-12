<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:48 PM
 */

namespace CheckOutSys\Model\Packages;


use CheckOutSys\Handler\Filter;
use function count;
use function var_dump;

class SpecialAmount implements PricingRuleInterface
{
    protected $item = [];
    protected $grossAmount = [];
    protected $notification = '';

    public function scan($item)
    {
        $this->item[$item->sku][] = $item->price;
        $this->grossAmount[] = $item->price;
    }

    public function total(Filter $filter)
    {
        $reduced = [];
//        $totalQty = count($this->item,1) - count($this->item);
        $totalQty = count($this->grossAmount) ?? 0;
        $reduced[] = $filter->three​For​TwoDeal($this->item, 'atv');
        $reduced[] = $filter->discountAfterBuying($totalQty, $this->item, 'ipd', 50, 4);
        $reduced[] = $filter->​free​Of​Charge​($this->item, 'mbp','vga');
        foreach ( array_keys($this->item) as $key)
            $skus[$key] = count($this->item[$key]);

        return ["net" => array_sum($this->grossAmount) - array_sum($reduced) , "SKUs" => $skus];
    }
}