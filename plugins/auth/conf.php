<?php
	session_start();
	
	include_once 'module.php';
	include_once '../../config.php';

	$db_host = $data['host'];
	$db_login = $data['user'];
	$db_passwd = $data['pass'];
	$db_name = $data['db'];

	$db = new mysql();
	$db -> connect($db_host, $db_login, $db_passwd, $db_name);
?>
