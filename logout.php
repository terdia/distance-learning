<?php
	include_once("model/studentHelper.php");
	$killSession = new studentHelper();
	
	session_start();
	session_destroy();
	
	$killSession->redirect_to("account");
	exit();