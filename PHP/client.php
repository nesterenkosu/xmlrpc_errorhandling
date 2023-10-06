<?php
	require_once("XML/RPC.php");
	
	$client=new XML_RPC_Client("/server.php","http://siteserver.loc");
	
	//$client->setDebug(1);
	
	$request=new XML_RPC_Message(
		"demoservice::hellouser",
		Array(
			new XML_RPC_Value("Вася","string"),
			new XML_RPC_Value(19,"int")
		)
	);
	
	//echo "<xmp>";
	$response=$client->send($request);	
	//echo "</xmp>";
	
	if(!$response) 
		die("Ошибка передачи запроса {$client->errno} {$client->errstr}");	
	elseif($response->faultCode()!=0)
		die("Ошибка обработки запроса {$response->faultCode()} {$response->faultString()}");
	
	echo $response->value()->getval();
