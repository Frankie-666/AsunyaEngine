<?php
	include "api/.api.php";
	include "functions.php";
	include "plugins/auth/conf.php";
	Data::connect($data);
	require_once "themes/" . $site['theme'] . "/header.php";
	Data::close();
?>