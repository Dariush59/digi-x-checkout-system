<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 3:52 PM
 */

namespace CheckOutSys\Model\Products;


interface ProductInterface
{
    public function getId();
    public function getPrice();
    public function getName();
    public function getSku();
}