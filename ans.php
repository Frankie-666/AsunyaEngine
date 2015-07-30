<?php
	include "api/.api.php";
	include "functions.php";
	include "plugins/auth/conf.php";
	Data::connect($data);
	
	$auth = new Auth();
	
	$answ = htmlspecialchars($_POST['answ']);
	$idansw = htmlspecialchars($_POST['id']);
	
	$date = date("d.m.Y H:i:s");
	$typedate = date("YmdHis");
	if ($auth->check()) {
		if ($_POST['answ']) {
			mysql_query("UPDATE ask SET ansdate='$date', answer='$answ', typedate='$typedate', status='1' WHERE id='{$idansw}'");
			header("Location: http://ask.asunya.info/");
		}
	}
	Data::close();
?>