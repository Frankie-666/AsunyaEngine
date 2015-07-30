<?php 
	$auth = new Auth(); 
	$select = mysql_query("SELECT * FROM `users` WHERE `name`='asunya'");
	$user = mysql_fetch_assoc($select);
	
	$avasel = mysql_query("SELECT * FROM `avatars` WHERE `uid`='{$user['id']}'");
	$ava = mysql_fetch_assoc($avasel);
	
	$select2 = mysql_query("SELECT * FROM `ask` WHERE `to`='{$user['id']}' AND `status`='1' ORDER BY typedate DESC");
	
	$uname = $_SESSION['login_user'];
	$getname = $_GET['name'];
	
	$answsel = mysql_query("SELECT * FROM `ask` WHERE `to`={$user['id']} AND `status`='1'");
	$nums = mysql_num_rows($answsel);
	
	if (isset($_POST['send'])) {
		if (!$auth->authorization()) {
				$error = $_SESSION['error'];
				unset ($_SESSION['error']);
			}
		}
	if (isset($_GET['exit'])) $auth->exit_user();
; ?>
<html>
<head>
<title>Asunya.Info - Задай вопрос Насте</title>
<script src='/themes/default/prefixfree.min.js'></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="/themes/default/css/jquery.remodal.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--http://s.codepen.io/assets/libs/prefixfree.min.js-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<style class="cp-pen-styles">
@font-face {
  font-family: 'MvBoli';
  font-style: normal;
  font-weight: 400;
  src: local('Mv Boli'), local('MvBoli'), url(/themes/default/css/mvboli.ttf) format('ttf');
}
html {
	background: radial-gradient(ellipse at bottom, #1b2735 0%, #090a0f 100%) fixed;
	/*background: #1b2735 url(http://asunya.info/themes/default/css/winterforest.png) repeat-x bottom center fixed;*/
}
body {
	margin: 0;
	padding: 0;
	margin-top: -20px;
}
.wrapper {
	position: absolute;
	width: 100%;
}
.wrap {
	width: 770px;
	margin: 0 auto;
	z-index: 9999;
}
.head {
	position: absolute;
	width: 100%;
	height: 50px;
	background: #2d2d2d;
	z-index: 9999;
}
.panel {
	width: 770px;
	margin: 0 auto;
	-moz-user-select: none;
	-o-user-select:none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	user-select: none;
	cursor: default;
	font-family: 'Mv Boli', sans-serif;
}
.logo {
	line-height: 50px;
}
.logo a {
	text-decoration: none;
	color: white;
	font-size: 18px;
}
.panel ul {
	margin: 0;
	padding: 0;
}
.panel li {
	list-style-type: none;
	float: left;
}
.auth {
	line-height: 52px;
	text-decoration: none;
	color: white;
	font-size: 14px;
	padding: 3px 9px 3px 7px;
	background: #464646;
}
.auth:hover {
	background: #575757;
}
.user {
	width: 770px;
	min-height: 100px;
	background: #fff;
	/*margin: 0 auto;*/
	-moz-user-select: none;
	-o-user-select:none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	user-select: none;
	cursor: default;
	border-radius: 0px 0px 3px 3px;
	padding-top: 50px;
}
.user ul {
	margin: 0;
	padding: 0;
}
.user li {
	list-style-type: none;
	float: left;
}
.info ul {
	margin: 0;
	padding: 0;
}
.info li {
	list-style-type: none;
	float: left;
}
.info span {
	font-family: 'Open Sans', sans-serif;
	margin-left: 5px;
	margin-right: 3px;
}
textarea {
	border: 1px solid #cccccc;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	background: #ffffff !important;
	outline: none;
	height: 30px;
	min-height: 30px;
	max-height: 70px;
	min-width: 760px;
	max-width: 760px;
	font-size: 11px;
	font-family: 'Open Sans', sans-serif;
	margin-left: 5px;
	margin-top: 5px;
}
.post {
	display: block;
	width: 770px;
	/*margin: 0 auto;*/
	margin-top: 5px;
	margin-bottom: -16px;
	font-family: 'Open Sans', sans-serif;
	background: #fff;
	border-radius: 3px;
}
.gotn {
	width: 200px;
	height: 30px;
	margin-top: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
	background: #00b7ea; /* Old browsers */
	background: -moz-linear-gradient(top,  #00b7ea 0%, #009ec3 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #00b7ea 0%,#009ec3 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3',GradientType=0 ); /* IE6-9 */
	border: 0px;
	border-radius: 3px;
	color: white;
}
.gotn:hover {
	background: #87e0fd; /* Old browsers */
	background: -moz-linear-gradient(top,  #87e0fd 0%, #53cbf1 0%, #05abe0 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87e0fd), color-stop(0%,#53cbf1), color-stop(100%,#05abe0)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87e0fd', endColorstr='#05abe0',GradientType=0 ); /* IE6-9 */
}
.gotnlink {
	text-decoration: none;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 7px;
	padding-right: 7px;
	margin: 5px;
	font-size: 12px;
	background: #00b7ea; /* Old browsers */
	background: -moz-linear-gradient(top,  #00b7ea 0%, #009ec3 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #00b7ea 0%,#009ec3 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3',GradientType=0 ); /* IE6-9 */
	border: 0px;
	border-radius: 3px;
	color: white;
	display: inline-block;
}
.gotnlink:hover {
	background: #87e0fd; /* Old browsers */
	background: -moz-linear-gradient(top,  #87e0fd 0%, #53cbf1 0%, #05abe0 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87e0fd), color-stop(0%,#53cbf1), color-stop(100%,#05abe0)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87e0fd', endColorstr='#05abe0',GradientType=0 ); /* IE6-9 */
}
.savetn {
	width: 200px;
	height: 30px;
	margin-top: 5px;
	margin-left: 5px;
	background: #00b7ea; /* Old browsers */
	background: -moz-linear-gradient(top,  #00b7ea 0%, #009ec3 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #00b7ea 0%,#009ec3 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3',GradientType=0 ); /* IE6-9 */
	border: 0px;
	border-radius: 3px;
	color: white;
}
.savetn:hover {
	background: #87e0fd; /* Old browsers */
	background: -moz-linear-gradient(top,  #87e0fd 0%, #53cbf1 0%, #05abe0 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87e0fd), color-stop(0%,#53cbf1), color-stop(100%,#05abe0)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87e0fd', endColorstr='#05abe0',GradientType=0 ); /* IE6-9 */
}
.ask {
	width: 770px;
	background: #fff;
	border-radius: 3px;
	margin-bottom: 2px;
	font-family: 'Open Sans', sans-serif;
}
.name {
	padding-top: 5px;
	padding-bottom: 5px;
	font-size: 15px;
	border-bottom: 1px dotted #2d2d2d;
	width: 760px;
	margin-left: 5px;
}
.ntext {
	padding-top: 5px;
	padding-bottom: 5px;
	font-size: 13px;
	width: 760px;
	margin-left: 5px;
}
.ugift {
	position: absolute;
}
.ugift li {
	list-style-type: none;
	float: right;
	margin-left: -40px;
}
#wrapper {
	width: 970px;
	margin: 0 auto;
}
.gotnans {
	width: 200px;
	height: 30px;
	margin-top: 5px;
	margin-bottom: -15px;
	background: #6bba70; /* Old browsers */
	background: -moz-linear-gradient(top,  #6bba70 0%, #6bba70 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6bba70), color-stop(100%,#6bba70)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #6bba70 0%,#6bba70 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #6bba70 0%,#6bba70 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #6bba70 0%,#6bba70 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #6bba70 0%,#6bba70 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6bba70', endColorstr='#6bba70',GradientType=0 ); /* IE6-9 */
	border: 0px;
	border-radius: 3px;
	color: black;
}
.gotnans:hover {
	background: #8fc400; /* Old browsers */
	background: -moz-linear-gradient(top,  #8fc400 0%, #8fc400 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8fc400), color-stop(100%,#8fc400)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #8fc400 0%,#8fc400 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #8fc400 0%,#8fc400 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #8fc400 0%,#8fc400 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #8fc400 0%,#8fc400 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc400', endColorstr='#8fc400',GradientType=0 ); /* IE6-9 */
}
.logo span {
	font-size: 10px;
}
.set input[type=text] {
	width: 300px;
	font-size: 13px;
	padding: 6px 0 4px 10px;
	border: 1px solid #cecece;
	border-radius: 3px;
	background: #F6F6f6;
	outline: none;
}
.set input[type=text]:focus {
	border: 1px solid #2d2d2d;
	background: #fff;
	outline: none;
}
.set input[type=password] {
	width: 300px;
	font-size: 13px;
	padding: 6px 0 4px 10px;
	border: 1px solid #cecece;
	border-radius: 3px;
	background: #F6F6f6;
	outline: none;
}
.set input[type=password]:focus {
	border: 1px solid #2d2d2d;
	background: #fff;
	outline: none;
}
</style>
</head>
<body>
<div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>
<div class="head">
	<div class="panel">
		<ul>
			<li>
				<div class="logo">
					<a href="/">Asunya.Info <span>v.0.2.9</span></a>
				</div>
			</li>
			<li style="float: right;">
			<?php
			if ($auth->check()) {
			?>
				<a class="auth" href="http://vk.com/share.php?url=http://asunya.info/&title=Asunya.Info%20-%20%D0%97%D0%B0%D0%B4%D0%B0%D0%B9%20%D0%B2%D0%BE%D0%BF%D1%80%D0%BE%D1%81%20%D0%9D%D0%B0%D1%81%D1%82%D0%B5&description=%D0%AD%D0%BB%D0%B8%D1%82%D0%BD%D1%8B%D0%B9%20%D0%B0%D1%81%D0%BA%20%D0%9D%D0%B0%D1%81%D1%82%D0%B8&image=<?php echo $ava['url']; ?>&noparse=true">Share in VK</a>
				<a class="auth" href="/index.php?exit">Exit</a>
			<?php
			} else {
			if (isset($error)) {
				//
			}
			?>
				<a class="auth" href="#authme">Auth</a>
			<?php
			}
			?>
			</li>
		</ul>
	</div>
</div>
<div class="remodal" data-remodal-id="settings">
	<p>
		<div class="set">
			<form method="post" action="/set.php">
				<span>Основные настройки:</span>
				<p><input type="text" name="firstname" placeholder="Имя (<?php echo $user['first']; ?>)"></p>
				<p><input type="text" name="lastname" placeholder="Фамилия (<?php echo $user['second']; ?>)"></p>
				<p><input type="text" name="vk" placeholder="Вконтакте (<?php echo $user['vkid']; ?>)"></p>
				<input type="submit" class="savetn" value="Сохранить настройки">
			</form>
			<br>
			<form method="post" action="/set.php">		
				<span>Смена пароля:</span>			
				<p><input type="password" name="old" placeholder="Старый пароль"></p>
				<p><input type="password" name="new" placeholder="Новый пароль"></p>
				<input type="submit" class="savetn" value="Изменить пароль">
			</form>
		</div>
	</p>
</div>
<div class="remodal" data-remodal-id="authme">
	<p>
		<div class="set">
			<form method="post" action="/plugins/auth/index.php">
				<span>Авторизация:</span>
				<p><input type="text" name="login" placeholder="Логин"></p>
				<p><input type="password" name="passwd" placeholder="Пароль"></p>
				<input type="submit" class="savetn" name="send" value="Войти">
			</form>
		</div>
	</p>
</div>
<div class="remodal" data-remodal-id="avatar">
	<p>
		<img src="<?php echo $ava['url']; ?>" width="320px">
	</p>
</div>
<div class="wrapper">
	<div class="wrap">
		<div class="user">
			<div class="info">
				<ul>
					<li><a href="#avatar"><img src="<?php echo $ava['url']; ?>" width="90px" height="90px" style="padding-left: 5px; padding-top: 5px;"/></a></li>
					<li><span><?php echo $user['first']; ?> <?php echo $user['second']; ?> <?php if ($auth->check()) { ; ?><a href="#settings" style="text-decoration: none; color: gray;"><i class="fa fa-cog"></i></a><?php } ; ?></span><br><span style="font-size: 12px;"><a style="text-decoration: none; color: #5C5C5C; border-bottom: 1px dotted #5C5C5C;" href="<?php echo $user['vkid']; ?>" target="_blank"><?php echo $user['vkid']; ?></a></span></li>
					<li style="float: right;"><span>Ответов: <?php echo $nums; ?></span></li>
				</ul>
			</div>
		</div>
		<div class="post" id="result">
			<form method="post" action="">
				<textarea name="quest" id="quest" style="height: 70px;" placeholder="Спрашивай царя, холоп!"></textarea>
				<input type="button" onclick="send();" class="gotn" value="Задать вопрос"> <!--type="submit"-->
			</form>
		</div>
		<div class="post" id="result2">
			<form><div class="name">Вопрос задан. Ожидай ответа :)</div><a href="#" class="gotnlink">Еще раз</a><br></form>
		</div>
		<div style="height: 5px;"></div>
<?php
if ($uname) {
	$requestsel = mysql_query("SELECT * FROM `ask` WHERE `to`='{$user['id']}' AND status='0' ORDER BY id DESC");
	while ($request = mysql_fetch_assoc($requestsel)) {
?>
		<div class="ask">
			<div class="name">
				<span>
				<?php if ($request['from'] == 666) { ?>ВОПРОС ДНЯ: <?php } ?><?php echo $request['question']; ?> 
				<a style="text-decoration: none; color: gray; font-size: 10px;" href="http://speed-tester.info/ip_location.php?ip=<?php echo $request['ipfrom']; ?>"><?php echo $request['ipfrom']; ?></a>
				<div style="float: right; font-size: 14px; line-height: 23px; color: gray;"><a href="/del.php?id=<?php echo $request['id']; ?>" style="text-decoration: none; color: gray;">Удалить</a></div>
				</span>
			</div>
			<div class="ntext">
				<form method="post" action="/ans.php">
					<textarea name="answ" style="margin-left: 0px; margin-top: 0px;"></textarea>
					<input type="hidden" name="id" value="<?php echo $request['id']; ?>">
					<input type="submit" class="gotnans" value="Ответить">
				</form>
			</div>
		</div>
<?php
	}
}
?>
<?php
	while ($ask = mysql_fetch_assoc($select2)) {
		$ask = str_replace($key, $value, $ask);
?>
		<div class="ask">
			<div class="name">
				<span><?php echo $ask['question']; ?> 
				<?php if ($auth->check()) { ?><a style="text-decoration: none; color: gray; font-size: 10px;" href="http://speed-tester.info/ip_location.php?ip=<?php echo $ask['ipfrom']; ?>"><?php echo $ask['ipfrom']; ?></a><?php } ; ?>
				<div style="float: right; font-size: 14px; line-height: 23px; color: gray;"><?php echo $ask['ansdate']; ?></div></span>
			</div>
			<div class="ntext">
				<?php echo $ask['answer']; ?>
				<?php if ($auth->check()) { ?>
				<div style="float: right; font-size: 14px; line-height: 23px;"><a style="text-decoration: none; color: gray;" href="/del.php?id=<?php echo $ask['id']; ?>">x</a></div>
				<?php } ?>
			</div>
		</div>
<?php
	}
?>
		<div style="height: 10px;"></div>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-2.1.0.min.js"><\/script>')</script>
<script src="/themes/default/jquery.remodal.js"></script>
<script>
    $(document).on('open', '.remodal', function () {
        console.log('open');
    });
    $(document).on('opened', '.remodal', function () {
        console.log('opened');
    });
    $(document).on('close', '.remodal', function () {
        console.log('close');
    });
    $(document).on('closed', '.remodal', function () {
        console.log('closed');
    });
    $(document).on('confirm', '.remodal', function () {
        console.log('confirm');
    });
    $(document).on('cancel', '.remodal', function () {
        console.log('cancel');
    });
    var inst = $('[data-remodal-id=modal2]').remodal();
</script>
<script>
$("#result2").css("display", "none");
$(".gotn").click(function() {
	var quest = $('#quest').val();
	$.ajax({
		type: "POST",
		url: "/add.php",
		data: "quest="+quest
	});
	$("#result2").css("display", "block");
	$("#result").css("display", "none");
});
$(".gotnlink").click(function() {
	$("#result2").css("display", "none");
	$("#result").css("display", "block");
});
/*
function send() {
//values
var quest = $('#quest').val();
//post values
	$.ajax({
		type: "POST",
		url: "/ask",
		//data: "quest="+quest+"&data1="+data1, //post 2+ values
		data: "quest="+quest,
		//succes info
			success: function(html) {
			//clear form
				//$("#result").empty();
				//set new html
					//$("#result").append(html); //result from server (not today)
					//$('#result').append('<form><div class="name">Вопрос задан. Ожидай ответа :)</div><a href="#" onclick="reset();" class="gotnlink">Еще раз</a><br></form>');
					$("#result2").css("display", "block");
			}
	});
}
function reset() {
	$.ajax({
		success: function(html) {
			$("#result").empty();
			$('#result').append('<form method="post" action=""><textarea name="quest" id="quest" style="height: 70px;" placeholder="Спрашивай царя, холоп!"></textarea><input type="button" onclick="send();" class="gotn" value="Задать вопрос"></form>');
		}
	});
}*/
</script>
</body>
</html>