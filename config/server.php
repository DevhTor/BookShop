<?php

SESSION_START();

//Url Base

$port = "";

if($_SERVER['SERVER_NAME'] == "localhost")
{
	$port = ":8000";

}

$urlServer = '//' . $_SERVER['SERVER_NAME'] . $port.'/';

?>
