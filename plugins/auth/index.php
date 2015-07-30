<?php
include_once 'conf.php';
?>
<html>
<head>
<title>Auth</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<style>
@font-face {
  font-family: 'MvBoli';
  font-style: normal;
  font-weight: 400;
  src: local('Mv Boli'), local('MvBoli'), url(/themes/default/css/mvboli.ttf) format('ttf');
}
.form {
	width: 300px;
	height: 300px;
	margin: 0 auto;
	font-family: 'Open Sans', sans-serif;
	position: fixed;
	top: 50%;
	left: 50%;
	margin-top: -150px;
	margin-left: -150px;
}
.auth {
	margin-left: 50px;
	margin-top: 10px;
}
.field {
	width: 200px;
	height: 30px;
	color: gray;
	padding-left: 3px;
}
.text {
	margin-top: 10px;
	margin-bottom: 5px;
}
.btn {
	width: 200px;
	height: 30px;
	margin-top: 20px;
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
.btn:hover {
	background: #87e0fd; /* Old browsers */
	background: -moz-linear-gradient(top,  #87e0fd 0%, #53cbf1 0%, #05abe0 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87e0fd), color-stop(0%,#53cbf1), color-stop(100%,#05abe0)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87e0fd', endColorstr='#05abe0',GradientType=0 ); /* IE6-9 */
}
.auth a {
	text-decoration: none;
	color: white;
	font-size: 10pt;
}
.auth li {
	list-style-type: none;
	width: 200px;
	height: 30px;
	text-align: center;
	margin-top: 5px;
	line-height: 30px;
	background: #00b7ea; /* Old browsers */
	background: -moz-linear-gradient(top,  #00b7ea 0%, #009ec3 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #00b7ea 0%,#009ec3 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #00b7ea 0%,#009ec3 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3',GradientType=0 ); /* IE6-9 */
	border-radius: 3px;
	cursor: default;
}
.auth li:hover {
	background: #87e0fd; /* Old browsers */
	background: -moz-linear-gradient(top,  #87e0fd 0%, #53cbf1 0%, #05abe0 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87e0fd), color-stop(0%,#53cbf1), color-stop(100%,#05abe0)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #87e0fd 0%,#53cbf1 0%,#05abe0 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87e0fd', endColorstr='#05abe0',GradientType=0 ); /* IE6-9 */
}
#logo{
	position:relative;
	width: 42px;
	height: 42px;
	-webkit-animation: preloader_6 5s linear;
	-moz-animation: preloader_6 5s linear;
	-ms-animation: preloader_6 5s linear;
	animation: preloader_6 5s linear;
	margin: 0 auto;
}
#logo span{
	width:15px;
	height:15px;
	position:absolute;
	display:block;
	-webkit-animation: logo_span 5s linear;
	-moz-animation: logo_span 5s linear;
	-ms-animation: logo_span 5s linear;
	animation: logo_span 5s linear;
}
#logo span:nth-child(1){
	background:#f25022;
}
#logo span:nth-child(2){
	left:22px;
	background:#7fba00;
	-webkit-animation-delay: .1s;
	-moz-animation-delay: .1s;
	-ms-animation-delay: .1s;
	animation-delay: .1s;
	border-radius: 100px;
}
#logo span:nth-child(3){
	top:22px;
	background:#05a2f1;
	-webkit-animation-delay: .1s;
	-moz-animation-delay: .1s;
	-ms-animation-delay: .1s;
	animation-delay: .1s;
}
#logo span:nth-child(4){
	top:22px;
	left:22px;
	background:#fcbb01;
}
@-webkit-keyframes logo_span {
	0% { -webkit-transform:scale(1); }
	50% { -webkit-transform:scale(0.5); }
	100% { -webkit-transform:scale(1); }
}

@-moz-keyframes logo_span {
	0% { -moz-transform:scale(1); }
	50% { -moz-transform:scale(0.5); }
	100% { -moz-transform:scale(1); }
}

@-ms-keyframes logo_span {
	0% { -ms-transform:scale(1); }
	50% { -ms-transform:scale(0.5); }
	100% { -ms-transform:scale(1); }
}
@keyframes logo_span {
	0% { transform:scale(1); }
	30% { transform:scale(0.3); }
	50% { transform:scale(0.5); }
	70% { transform:scale(0.3); }
	100% { transform:scale(1); }
}
.text {
	text-align: center;
	-moz-user-select: none;
	-o-user-select:none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	user-select: none;
	cursor: default;
	font-family: 'Mv Boli', sans-serif;
	font-size: 16px;
}
</style>
</head>
<body>
<?php
	$auth = new Auth();

	if (isset($_POST['send'])) {
		if (!$auth->authorization()) {
			$error = $_SESSION['error'];
			unset ($_SESSION['error']);
		}
	}

	//if (isset($_GET['exit'])) $auth->exit_user();

	if ($auth->check()) {
	?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/">
	<?php //$_SESSION['login_user']; ?>
<?php
	} else {
		if (isset($error)) {
?>

<?php } ?>
	<form action="" method="post">
		<div class="form">
			<div id="logo">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="text">
				ASK.PLEASE<br>
			</div>
			<div class="auth">
				<input type="text" class="field" name="login" value="<?php echo $_POST['login']; ?>" placeholder="Логин" /><br><br>
				<input type="password" class="field" name="passwd" id="" placeholder="Пароль"/><br>
				<input type="submit" class="btn" value="Войти" name="send" />
			</div>
		</div>
	</form>
<?php
	}
?>
</body>
</html>
