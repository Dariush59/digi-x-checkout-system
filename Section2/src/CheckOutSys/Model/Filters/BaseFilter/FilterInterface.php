<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 09/11/2018
 * Time: 2:48 PM
 */

namespace CheckOutSys\Model\Filters\BaseFilter;


/**
 * Interface FilterInterface
 * @package CheckOutSys\Model\Filters\BaseFilter
 */
interface FilterInterface
{
    /**
     * @param array $item
     */
    public function register(array $item) : void;
}