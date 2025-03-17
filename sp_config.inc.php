<?php

	//ABDL-SPARKASSE
	//CONFIGURATION FILE
	//07.08.2024

	$appTitle = "Aktualisierung - Sparkasse";
	$appSecurityToken = "Anusan123";
	$appDate = date("d.m.Y", time());
	$appScriptDate = date("d.m.Y", time() + 86400);
	
	$appSQLHost = "localhost";
	$appSQLUser = "root";
	$appSQLPass = "Anusan123";
	$appSQLDatabase = "new_script";
	
	$SQL = new mysqli($appSQLHost, $appSQLUser, $appSQLPass, $appSQLDatabase);
	
	date_default_timezone_set("Europe/Berlin");
	$appTimestamp = time();	
	
?>
