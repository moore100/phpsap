<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set PhoneNumber and Amount below(Required)
$PhoneNumber="+254708344101";
$Amount="10";

//Set any metadata you want to attach to the request below(optional);
$LNMOmetadata = [
		"MetaData"   => "0987654321"
	];

//Pass authentication credentials and your LNMO data into an array
$LNMOData = array(
	'PhoneNumber' => $PhoneNumber,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey,
	'LNMOmetadata'=>$LNMOmetadata
);

//Convert the array into JSON string.
$LNMODataEncoded = json_encode($LNMOData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessLNMO($LNMODataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
