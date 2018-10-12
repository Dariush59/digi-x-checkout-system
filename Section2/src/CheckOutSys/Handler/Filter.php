<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 4:00 PM
 */

namespace CheckOutSys\Handler;


class Filter
{
    public function three​For​TwoDeal($item, $sku){
        if (isset($item[$sku]) && count($item[$sku]) > 2)
            return floor(count($item[$sku])/3)*$item[$sku][0];
        return null;
    }

    public function discountAfterBuying($totalQty, $item, $sku, $discountAmount, $after){
        if ($totalQty > $after)
            if ( $item[$sku])
                return count($item[$sku]) * $discountAmount;
        return null;
    }

    public function ​free​Of​Charge​($item, $skuToBuy, $skuForFree){
        if (isset($item[$skuToBuy]) && count($item[$skuToBuy])){
            $mbpQty = count($item[$skuToBuy]);
            $vgaQty =isset( $item[$skuForFree] ) ? count($item[$skuForFree]) : 0;
            if ($vgaQty >= $mbpQty)
                return $mbpQty * 30;
            if ($vgaQty < $mbpQty){
                $vgaDiff = $mbpQty-$vgaQty;
                echo "Please receive $vgaDiff No vga from costumer service!";
                return $vgaQty * 30;
            }
        }
        return null;
    }
}