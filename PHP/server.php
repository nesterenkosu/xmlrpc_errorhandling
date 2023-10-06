<?php
	require_once("XML/RPC/Server.php");
	require_once("XML/RPC.php");
	
	function hellouser($params) {
		global $XML_RPC_erruser;
		$name=$params->getParam(0)->getval();
		$age=$params->getParam(1)->getval();		
		
		if($age<18) 
			return new XML_RPC_Response(0,$XML_RPC_erruser+1,"Детям нельзя!");
		else
			return new XML_RPC_Response(
				new XML_RPC_Value("Добро пожаловать, $name !","string")
			);
		
	}
	
	
	$map=Array(
		"demoservice::hellouser"=>Array(
			"function"=>"hellouser",
			"signature"=>Array(
				Array("string","string","int")				
			),
			"docstring"=>"Всего лишь приветствие кого-нибудь"
		)		
	);
	
	$srv=new XML_RPC_Server($map,1,1);
	
	