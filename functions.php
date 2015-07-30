<?php


	//mysql
	class Data {
		function connect($data) {
			global $link; //,$data
			($link = mysql_pconnect($data['host'], $data['user'], $data['pass'])) || die ("Ошибка соединения с сервером MySQL: ".mysql_error());
			mysql_set_charset('utf8');
			mysql_select_db($data['db'], $link) || die("Ошибка подключения к бд: ".mysql_error() );
		}
		function close() {
			mysql_close();
			echo $test;
		}
	}
?>