<?php 

/*
*Using​ ​simple​ ​code,​ ​explain​ ​what​ ​kind​ ​of​ ​situations​ ​would​ ​you​ ​use​ ​the​ ​methods:
***i. GET
***ii. POST
***iii. UPDATE
***iv. PUT
*/


/*
* PUT
 *
 * The HTTP DELETE method is used Use to delete existing resources . An HTTP response code of * 200 (OK), 202 (Accepted) or 204 (No Content). In an error case, it is normally returns a 404 "NOT FOUND".
*/

if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    parse_str(file_get_contents("php://input"), $_DELETE);
    foreach ($_DELETE as $key => $value)
    {
        unset($_DELETE[$key]);

        $_DELETE[str_replace('amp;', '', $key)] = $value;
    }
    $_REQUEST = array_merge($_REQUEST, $_DELETE);
}

if (!isset($_REQUEST["id"]) && is_null($_REQUEST["id"]))
    throw new \Exception('the id request is incorrect!');



$dataContent = file_get_contents('../data.json');
$tempArray = json_decode($dataContent);
$id = --$_REQUEST['id'];
unset($tempArray[$id]);
$jsonData = json_encode($tempArray);
file_put_contents('../data.json', $jsonData);
echo 'done';