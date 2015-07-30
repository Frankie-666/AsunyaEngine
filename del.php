<?php
	include "api/.api.php";
	include "functions.php";
	include "plugins/auth/conf.php";
	Data::connect($data);
	$auth = new Auth();
	$select = mysql_query("SELECT * FROM `ask` WHERE `id`='{$_GET['id']}'");
	$ask = mysql_fetch_assoc($select);
	if ($auth->check()) {
		if ($_GET['id']) {
			//mysql_query("INSERT INTO `delete` SET question='{$ask['question']}', answer='{$ask['answer']}'");
			//mysql_query("DELETE FROM `ask` WHERE id='{$_GET['id']}'");
			mysql_query("UPDATE ask SET status='3' WHERE id='{$_GET['id']}'");
			header("Location: http://ask.asunya.info/");
		}
	}
	Data::close();
?>