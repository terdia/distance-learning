<?php
	include_once("model/helper.php");
	$killSession = new helper();
	
	session_start();
	session_destroy();
	
	$killSession->redirect_to("login");
	exit();