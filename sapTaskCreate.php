<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="usernme";
$apiKey="api key";

//Set your task details below

//You need tag your tasks for future identification and to control them using API in the future.(Required)
$tags = array();
$tags['type']='mytaskname';

 //The array for the content you want to HTTP POST to your URL when your task has been triggered(Optional)
$postData = array();
$postData['type']='mypostdata';


$TimeSlice="2";//integer begins from 1 
$Time="minute";//choose minute or hour ofr day or month or year
$Retries="3";// How many times should re try if your server failed(or it was down)? default value: 3
$Count="1";//How many cycles should be repeated? should be an integer or -1 for infinite times
$url="http://domain.com";//The target url that SAP will call at defined TimeSlice

//Pass authentication credentials and your task creation data to array
$TaskCreateData=array(
	'tags' => $tags,
	'postData' => $postData,
	'TimeSlice'=>$TimeSlice,
	'Time'=>$Time,
	'Retries'=>$Retries,
	'Count'=>$Count,
	'url'=>$url,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//convert our array to json string.
$TaskCreateDataEncoded=json_encode($TaskCreateData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessTaskCreate($TaskCreateDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}

