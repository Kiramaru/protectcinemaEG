<head>
	<meta charset="utf-8">
	<title>Авторизация</title>
	<style>
		fieldset {
			padding: 20px;
			color:#25054f;
		}
		.flex-container {
			display: flex; 
			justify-content: center; 
			flex-direction: column;
		}
		body{
			background-color: #f0e7fc;
		}
		.result {
			font-size: 14px;
			text-align: center;
			font-weight: bold;
		}
	</style>
</head>
<div class="flex-container">
	<img src="image/regimg.jpg" width="400" height="400" style="margin: auto">
	<form method="post" style="margin: auto">
		<fieldset>
			<legend style="font-size:20px;">Авторизация</legend>
			<p><label for="email" style="margin-right: 57px; font-size:20px;">Email</label><input type="email" id="email" name="email" style="font-size:20px;" required></p>
			<p><label for="password" style="margin-right: 43px; font-size:20px;">Пароль</label><input type="password" id="password" name="password" pattern="[A-Za-zА-Яа-яЁё0-9]{8,}" style="font-size:20px;" required></p>
			<a href="recoverpassword.php" style="margin: auto">Забыли пароль?</a>
		</fieldset>
		<p><button type="submit" name="enter" value="enter" style="font-size:20px; color:#25054f;" >Войти</button></p>
	</form>
	<a href="index.php" style="margin: auto">Вернуться назад</a>
</div>

<?
include 'functions.php';
$conn = Connect();
mysqli_set_charset($conn, "utf8");
if($_POST['enter'] == "enter"){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql_check_user = "SELECT * FROM kosmosusers";
	$result_check_user = mysqli_query($conn, $sql_check_user);
	
	$auth = 0;
	while ($row = mysqli_fetch_array($result_check_user))
	{
		if(($row['email'] == $email) and (password_verify($password, $row['password'])))
		{
			session_start();
			$_SESSION['email'] = $email;
			header("location:index.php");
			$auth = 0;
		}
		else
		{
			$auth = 1;
		}
	}
	if($auth == 1)
	{
		echo '<div class="result">Неправильный пароль или почта!</div>';
	}
}
?>