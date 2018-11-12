<?php
/**
 * Created by PhpStorm.
 * User: dariush
 * Date: 12/10/2018
 * Time: 4:28 PM
 */

try {
    require_once __DIR__ . '/../vendor/autoload.php';

    require_once __DIR__ . '/../config/setting.php';

    require_once __DIR__ . '/CheckOutSys/CheckOutSys.php';
}
catch (Throwable $e) {
    echo json_encode( $e->getMessage());
}