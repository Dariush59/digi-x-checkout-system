<?php 

/*
*Using​ ​simple​ ​code,​ ​explain​ ​what​ ​kind​ ​of​ ​situations​ ​would​ ​you​ ​use​ ​the​ ​methods:
***i. GET
***ii. POST
***iii. UPDATE
***iv. PUT
*/


/*
* GET
*
* The HTTP GET method is used to retrieve, read or get data. GET returns in XML or JSON format and an HTTP response code of * 200 (OK). In an error case, it is normally returns a 400 "BAD REQUEST" or 404 "NOT FOUND".
* In PHP one of the famous library is GuzzleHttp\Client that can be one of or dependencies. There is another library which * is Added in PHP 5 and older which is cURL or file_get_contents
*/


header("Access-Control-Allow-Origin: *");
header( 'Content-Type: application/json' );
$lines = file_get_contents('http://localhost:7070/');
if ( isset( $_GET["id"] ) && !empty( $_GET["id"] ) )
    $lines = json_encode(json_decode($lines)[--$_GET["id"]]);
echo $lines;

