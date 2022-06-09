<?include 'functions.php';?>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
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
			font-size: 25px;
			text-align: center;
			font-weight: bold;
		}
		
	</style>
</head>
<div class="flex-container">
	<img src="image/regimg.jpg" width="400" height="400" style="margin: auto">
	<form method="post" style="margin: auto">
		<fieldset>
			<legend style="font-size:20px;">Регистрация</legend>
			<p><label for="email" style="margin-right: 120px; font-size:20px;">Email</label><input type="email" id="email" name="email" style="font-size:20px;" required></p>
			<p><label for="password" style="margin-right: 106px; font-size:20px;">Пароль</label><input type="password" id="password" name="password" pattern="[A-Za-zА-Яа-яЁё0-9]{8,50}" style="font-size:20px;" required></p>
			<p><label for="passwordcheck" style="margin-right: 43px; font-size:20px;">Повтор пароля</label><input type="password" id="passwordcheck" name="passwordcheck" pattern="[A-Za-zА-Яа-яЁё0-9]{8,50}" style="font-size:20px;" required></p>
<?
$conn = Connect();
mysqli_set_charset($conn, "utf8");
if($_POST['register'] == "register"){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordcheck = $_POST['passwordcheck'];

	$sql_check_user = "SELECT email FROM kosmosusers";
	$result_check_user = mysqli_query($conn, $sql_check_user);
	
	$check = 0;
	while (($row = mysqli_fetch_array($result_check_user)) and ($check == 0))
	{
		if($row['email'] == $email)
		{
			echo '<div class="result" style="font-size:14px;">Эта почта уже зарегестрирована в системе!</div>';
			$check = 1;
		}
	}
	$checkpassword = 0;
	if($password == $passwordcheck)
	{
		$checkpassword = 1;
	}
	else
	{
		echo '<div class="result" style="font-size:14px;">Пароли должны совпадать!</div>';
	}
	if(($check == 0) and ($checkpassword == 1))
	{
		$password = password_hash($password, PASSWORD_DEFAULT);
		$card = 0;
		$sql = "INSERT INTO `kosmosusers` (`id`, `email`, `password` , `cardnum`) VALUES (NULL, '" .$email. "', '" .$password. "', '".$card."')";
		$result = mysqli_query($conn, $sql);
		Adddata($result, $conn);
	}
}
?>
	</fieldset>
	<p><button type="submit" name="register" value="register" style="font-size:20px; color:#25054f;" >Зарегистрироваться</button></p>
	</form>
	<a href="index.php" style="margin: auto">Вернуться назад</a>
</div>