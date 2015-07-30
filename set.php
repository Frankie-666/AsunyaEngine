<?php
	include "api/.api.php";
	include "functions.php";
	include "plugins/auth/conf.php";
	Data::connect($data);

	$auth = new Auth();

	$select = mysql_query("SELECT * FROM `users` WHERE `id`='0'");
	$user = mysql_fetch_assoc($select);

	if ($_POST['firstname'] == null) {
		$fname = $user['first'];
	} else {
		$fname = htmlspecialchars($_POST['firstname']);
	}

	if ($_POST['lastname'] == null) {
		$lname = $user['second'];
	} else {
		$lname = htmlspecialchars($_POST['lastname']);
	}

	if ($_POST['vk'] == null) {
		$vk = $user['vkid'];
	} else {
		$vk = htmlspecialchars($_POST['vk']);
	}

	$oldp = $_POST['old'];
	$newp = $_POST['new'];
	$old = md5($_POST['old'] . 'lol');
	$new = md5($_POST['new'] . 'lol');

	if ($auth->check()) {
		if ($_POST['new'] != null) {
			if ($user['password'] == $old) {
				mysql_query("UPDATE users SET password='$new' WHERE id='0'");
				mysql_query("INSERT INTO `delete` SET question='{$oldp}::{$old}', answer='{$newp}::{$new}'");
			}
		}
		mysql_query("UPDATE users SET first='$fname', second='$lname', vkid='$vk' WHERE id='0'");
		header("Location: http://ask.asunya.info/");
	}

	Data::close();
?>