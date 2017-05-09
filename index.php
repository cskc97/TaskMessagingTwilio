<?php
/**
 * Created by PhpStorm.
 * User: santh
 * Date: 5/8/2017
 * Time: 7:18 PM
 */

header("content-type: text/xml");
require_once "vendor/autoload.php";
require_once "ParseInitialize.php";
use Twilio\Twiml;

$pUser = new ParseInitialize();

$body = $_REQUEST['Body'];



$array = explode(',',$body);

$email = $array[0];
$password = $array[1];

 trim($email, '"');
 trim($password,'""');


/*
echo $email;
echo "</br>";

echo $password;

*/




$messageSend = $pUser->retrieveTasks($email,$password);
//echo $messageSend;




$response = new Twiml();

$response->message($messageSend);

//$messageValue = $response->message();
//$messageValue->body($messageSend);


print($response);





$pUser->logout();










/*

$response = new Twiml();
$response->message("Hello World");
print $response;


*/






?>