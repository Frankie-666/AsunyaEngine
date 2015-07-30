<?php
	include "api/.api.php";
	include "functions.php";
	Data::connect($data);
	
	$answsel = mysql_query("SELECT * FROM `ask`");
	$nums = mysql_num_rows($answsel);
	$id = $nums+1;
	
	$quest = htmlspecialchars($_POST['quest']);
	$to = "1";
	$ip = $_SERVER['REMOTE_ADDR'];
	//mysql_query("INSERT INTO ask SET id='$id', from='$from', to='$to', question='$quest'");
	if ($_POST['quest']) {
		mysql_query("INSERT INTO ask SET id='$id', question='$quest', ipfrom='$ip'");
		header("Location: http://ask.asunya.info/");
	} else {
		header("Location: http://ask.asunya.info/");
	}
	Data::close();
?>