<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 4:00 PM
 */

namespace CheckOutSys\Model\Filters;


use CheckOutSys\Model\Filters\BaseFilter\FilterInterface;
use CheckOutSys\Model\Filters\Policies\Policy;
use function is_null;
use function isEmpty;
use function var_dump;

/**
 * Class Filter
 * @package CheckOutSys\Model\Filters
 */
class Filter implements FilterInterface
{
    /**
     * @var array
     */
    private $item = [];
    /**
     * @var Policy
     */
    protected $policy;

    /**
     * Filter constructor.
     * @param Policy $policy
     */
    public function __construct(Policy $policy)
    {
        $this->policy = $policy;
    }

    /**
     * @param array $item
     */
    public function register(array $item) : void
    {
        $this->item = $item;
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function three​For​TwoDeal() : float
    {
        $skus = $this->policy->getThree​For​TwoDeal()->skus?? [];
        $discount = 0.00;
        foreach ($skus as $sku){
            if (isset($this->item[$sku]) && count($this->item[$sku]) > 2)
                $discount +=  floor(count($this->item[$sku])/3)*$this->item[$sku][0];
        }
        return $discount;
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function discountAfterBuying() : float
    {
        $discountAfterBuying = $this->policy->getDiscountAfterBuying();
        $discount = 0.00;
        foreach ($discountAfterBuying->skus ?? array() as $skus){
            $totalQty = count($this->item[$skus] ?? []) ;
            if ($totalQty > $discountAfterBuying->after)
                foreach ($discountAfterBuying->skus as $sku)
                    if ( isset($this->item[$sku]) && $this->item[$sku])
                        $discount += count($this->item[$sku]) * $discountAfterBuying->discountAmount;
        }
        return $discount;
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function ​free​Of​Charge​() : float
    {
        return $this->applyDiscountForFreeOfCharge(
            $this->policy->getFreeOfCharge('skuForFree1')->scalar);
    }


    /**
     * @param string $skuForFree
     * @return float
     * @throws \Exception
     */
    private function applyDiscountForFreeOfCharge(string $skuForFree) : float
    {
        $discount = 0.00;
        foreach ($this->policy->getFreeOfCharge('skuToBuy') as $skuToBuy) {
            if (isset($this->item[$skuToBuy]) && count($this->item[$skuToBuy])) {
                $mbpQty = count($this->item[$skuToBuy]);
                $vgaQty = isset($this->item[$skuForFree]) ? count($this->item[$skuForFree]) : 0;
                if ($vgaQty >= $mbpQty)
                    $discount += $mbpQty * $this->item[$skuForFree][0];
                if ($vgaQty < $mbpQty) {
                    $vgaDiff = $mbpQty - $vgaQty;
                    echo "Please receive $vgaDiff No of $skuForFree device from customer service!";
                    $discount += $vgaQty * $this->item[$skuForFree][0];
                }
            }
        }
        return $discount;
    }
}