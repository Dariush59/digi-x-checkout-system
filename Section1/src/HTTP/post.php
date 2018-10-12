<?php 

/*
*Using​ ​simple​ ​code,​ ​explain​ ​what​ ​kind​ ​of​ ​situations​ ​would​ ​you​ ​use​ ​the​ ​methods:
***i. GET
***ii. POST
***iii. UPDATE
***iv. PUT
*/


/*
* POST
 *
 * The HTTP POST method is used to add or create a new data in the resources collection. POST returns in XML or JSON format and an HTTP response code of * 200 (OK) , 201 (Created) or 204 (No Content).
*/

if (!isset($_POST["name"]) && is_null($_POST["name"]))
    throw new \Exception('the name request is incorrect!');
if (!isset($_POST["age"]) && is_null($_POST["age"]))
    throw new \Exception('the age request is incorrect!');
if (!isset($_POST["job"]) && is_null($_POST["job"]))
    throw new \Exception('the job request is incorrect!');
$data = [];

$dataContent = file_get_contents('../data.json');
$tempArray = json_decode($dataContent);
$id = end($tempArray)->id;
$data["id"] = ++$id;
foreach ($_POST as $key => $value) {
    $data[htmlspecialchars($key)] = htmlspecialchars($value);
}
array_push($tempArray, $data);
$jsonData = json_encode($tempArray);
file_put_contents('../data.json', $jsonData);

/* Redirect browser */
header("Location: http://localhost:3030/list.html");
exit();