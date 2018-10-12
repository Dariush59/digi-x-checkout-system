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
 * The HTTP POST method is used Use to update existing resource . An HTTP response code of * 200 (OK), 201 (Created) or 204 (No Content). In an error case, it is normally returns a 404 "NOT FOUND".
*/

if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    parse_str(file_get_contents("php://input"), $_PUT);
    foreach ($_PUT as $key => $value)
    {
        unset($_PUT[$key]);

        $_PUT[str_replace('amp;', '', $key)] = $value;
    }
    $_REQUEST = array_merge($_REQUEST, $_PUT);
}

if (!isset($_REQUEST["id"]) && is_null($_REQUEST["id"]))
    throw new \Exception('the id request is incorrect!');
if (!isset($_REQUEST["name"]) && is_null($_REQUEST["name"]))
    throw new \Exception('the name request is incorrect!');
if (!isset($_REQUEST["age"]) && is_null($_REQUEST["age"]))
    throw new \Exception('the age request is incorrect!');
if (!isset($_REQUEST["job"]) && is_null($_REQUEST["job"]))
    throw new \Exception('the job request is incorrect!');


$dataContent = file_get_contents('../data.json');
$tempArray = json_decode($dataContent);
$id = --$_REQUEST['id'];
foreach ($_REQUEST as $key => $value) {
    if ( htmlspecialchars($key) == "name"){
        $tempArray[$id]->name = htmlspecialchars($value);
    }

    if ( htmlspecialchars($key) == "age"){
        $tempArray[$id]->age = htmlspecialchars($value);
    }

    if ( htmlspecialchars($key) == "job"){
        $tempArray[$id]->job = htmlspecialchars($value);
    }
}

$jsonData = json_encode($tempArray);
file_put_contents('../data.json', $jsonData);
echo 'done';