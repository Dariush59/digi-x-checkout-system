<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 4:30 PM
 */

use CheckOutSys\Model\Checkout\Checkout;
use CheckOutSys\Model\Packages\SpecialAmount;// ​Opening​ ​day​ ​specials
use CheckOutSys\Model\Packages\RegularAmount;// Normal days that there no discount
use CheckOutSys\Model\Products\Product;
use CheckOutSys\Handler\Filter;

$checkout = new Checkout(new SpecialAmount);
$checkout->scan(new Product("mbp"));
$checkout->scan(new Product("vga"));
$checkout->scan(new Product("ipd"));
//$checkout->scan(new Product("mbp"));
$result = $checkout->total(new Filter());


echo "SKUs​ ​Scanned: ";
foreach ($result['SKUs'] as $key => $value){
    echo " $value of $key, ";
}
echo "<br>";
echo "Total​ ​expected: " . $result['net'];
