<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 09/11/2018
 * Time: 4:11 PM
 */
namespace CheckOutSys\Model\Filters\Policies;

use Exception;
use stdClass;

/**
 * Class Policy
 * @package CheckOutSys\Model\Filters\Policies
 */
class Policy
{
    /**
     * @var stdClass
     */
    private $policy;

    /**
     * Policy constructor.
     */
    public function __construct()
    {
        $this->policy = new \stdClass();
        $this->getPolicies();
    }


    /**
     * @return null|stdClass
     */
    private function getPolicies() : ?\stdClass
    {
        $this->policy->three​For​TwoDeal = $this->setThree​For​TwoDeal(new \stdClass());
        $this->policy->discountAfterBuying = $this->setDiscountAfterBuying(new \stdClass());
        $this->policy->freeOfCharge = $this->setFreeOfCharge(new \stdClass());
        return $this->policy;
    }


    /**
     * @param stdClass $obj
     * @return stdClass
     */
    protected function setFreeOfCharge(stdClass $obj): \stdClass
    {
        $obj->skuToBuy = ['mbp'];
        $obj->skuForFree = 'vga';
        return $obj;
    }


    /**
     * @param stdClass $obj
     * @return stdClass
     */
    protected function setDiscountAfterBuying(stdClass $obj): \stdClass
    {
        $obj->skus = ['ipd'];
        $obj->discountAmount = 50;
        $obj->after = 4;
        return $obj;
    }


    /**
     * @param stdClass $obj
     * @return stdClass
     */
    protected function setThree​For​TwoDeal(stdClass $obj): \stdClass
    {
        return (object) $obj->skus = ['atv'];
    }

    /**
     * @param null|string $value
     * @return stdClass
     * @throws Exception
     */
    public function getThree​For​TwoDeal(?string $value = null) : \stdClass
    {
        return $this->evaluate('three​For​TwoDeal', $value);
    }

    /**
     * @param null|string $value
     * @return null|stdClass
     * @throws Exception
     */
    public function getDiscountAfterBuying(?string $value = null) : ?\stdClass
    {
        return $this->evaluate('discountAfterBuying', $value);
    }

    /**
     * @param null|string $value
     * @return null|stdClass
     * @throws Exception
     */
    public function getFreeOfCharge(?string $value = null) : ?\stdClass
    {
        return $this->evaluate('freeOfCharge', $value);
    }

    /**
     * @param string $key
     * @param null|string $value
     * @return null|stdClass
     * @throws Exception
     */
    private function evaluate(string $key, ?string $value) : ?\stdClass
    {

        if (!is_null($value)){
            if (!isset($this->policy->$key->$value))
                throw new Exception("$value does not exist");
            return  $this->policy->$key->$value;
        }
        return $this->policy->$key ?? null;
    }
}