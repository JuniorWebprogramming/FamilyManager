<?php
	session_start();
	
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	switch ($lang){
		case "en":
			header("location:en/index.php");break;
		case "hu":
			header("location:hu/index.php");break;
	}
