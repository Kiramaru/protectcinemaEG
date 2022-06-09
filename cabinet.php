<?
if(!isset($_SESSION))
	{
		session_start();
	}
include 'functions.php';
$conn = Connect();	
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM kosmosusers";
$result = mysqli_query($conn, $sql);
?>
<head>
	<meta charset="utf-8">
	<title>Личный кабинет</title>
	<style>
		body{
			background-color: #f0e7fc;
			font-size:25px;
		}
		.flex-container {
			display: flex; 
			justify-content: center; 
			flex-direction: column;
			align-items: center;
		}
		fieldset {
			padding: 25px;
			color:#25054f;
		}
		.result {
			font-size: 20px;
			text-align: center;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<header>
	<a href="index.php">
		<img src="image/Рисунок1.jpg">
	</a>
	</header>
	<div class="flex-container">
		<fieldset style="margin: 150px 150px 25px 150px;">
			<legend>Личный кабинет</legend>
			<p>E-mail: <?echo $_SESSION['email']?></p>
			<?if(empty($_GET['chpass'])){?>
			<p><form method="get"><button type="submit" name="chpass" value="chpass" style="font-size:25px;">Изменить пароль</button></form><p>
			<?} else{?>
				<form method="post">
					<p><label for="password" style="margin-right: 40px;">Старый пароль</label><input type="password" id="password" name="password" pattern="[A-Za-zА-Яа-яЁё0-9]{8,50}" style="font-size:25px;" required></p>
					<p><label for="passwordnew" style="margin-right: 49px;">Новый пароль</label><input type="password" id="passwordnew" name="passwordnew" pattern="[A-Za-zА-Яа-яЁё0-9]{8,50}" style="font-size:25px;" required></p>
					<p><label for="passwordnewcheck" style="margin-right: 43px;">Повтор пароля</label><input type="password" id="passwordnewcheck" name="passwordnewcheck" pattern="[A-Za-zА-Яа-яЁё0-9]{8,50}" style="font-size:25px;" required></p>
					<p><button type="submit" name="new" value="new" style="font-size:25px;">Обновить пароль</button></p>
				</form>
				<form method="get"><button type="submit" name="close" value="close" style="font-size:25px;">Закрыть</button></form>
				<?
				if($_POST['new'] == "new"){
					$password = $_POST['password'];
					$passwordnew = $_POST['passwordnew'];
					$passwordnewcheck = $_POST['passwordnewcheck'];
					$email = $_SESSION['email'];
					$sqlpass = "SELECT * FROM kosmosusers";
					$resultpass = mysqli_query($conn, $sqlpass);
					while ($row = mysqli_fetch_array($resultpass)){
						if($email == $row['email']){
							if(password_verify($password, $row['password']))
							{
								if($passwordnew == $passwordnewcheck)
								{
									$passwordnew = password_hash($passwordnew, PASSWORD_DEFAULT);
									$sqlnew = "UPDATE kosmosusers SET password = '$passwordnew' WHERE email = '$email'";
									$resultnew1 = mysqli_query($conn, $sqlnew);
									$_GET['chpass']=0;
									NEWpassword($resultnew1, $conn);
								}else{
									echo '<div class="result">Пароли не совпадают!</div>';
								}
							}
						else{
							echo '<div class="result">Неккоректно введен старый пароль!</div>';
							}
						}
					}
				}?>
			<?}?>
			<fieldset style="padding-right: 500px;">
				<legend>Банковские данные</legend>
				<?while ($row = mysqli_fetch_array($result)){
					if($_SESSION['email'] == $row['email']){
				?>
				<p>Номер карты: <?echo $row['cardnum'];?></p>
			<?}}?>
			<?if(empty($_GET['card']))
			{?>
			<p><form method="get"><button type="submit" name="card" value="card" style="font-size:25px;">Изменить данные</button></form><p>
			<?} 
			else
			{?>
			<form method="post">
					<p><label style="margin-right: 40px;">Новый номер карты</label><input type="number" name="cardnum" pattern="[0-9]{16}" style="font-size:25px;" required></p>
					<p><button type="submit" name="newcard" value="newcard" style="font-size:25px;">Обновить данные</button></p>
				</form>
			<form method="get"><button type="submit" name="close" value="close" style="font-size:25px;">Закрыть</button></form>
			<?
			if($_POST['newcard'] == "newcard")
			{
				$number = $_POST['cardnum'];
				settype($number, 'integer');
				$email = $_SESSION['email'];
				$sqlcard = "SELECT * FROM kosmosusers";
				$resultcard = mysqli_query($conn, $sqlcard);
				while ($row = mysqli_fetch_array($resultcard))
				{
					if($email == $row['email'])
					{
						$sqlnew = "UPDATE kosmosusers SET cardnum = '".$number."' WHERE email = '$email'";
						//4257893009980491"
						$resultnew = mysqli_query($conn, $sqlnew);
						$_GET['card']=0;
						NEWcardnum($resultnew, $conn);
					}
				}
			}}?>
			</fieldset>	
			<form method="get"><button type="submit" name="exit" value="exit" style="font-size:25px;margin-top: 10px;">Выйти из аккаунта</button></form>				
		</fieldset>
		<p style="margin: 0px 0px 25px 0px;"><a href="index.php" style="margin: auto">Вернуться назад</a></p>
	</div>
</body>
<?if($_GET['close'] == "close"){
	$_GET['chpass']=0;
	$_GET['card']=0;
	header("location:cabinet.php");
}
if($_GET['exit'] == "exit"){
	$_SESSION['email'] = 0;
	session_destroy();
	header("location:index.php");
}
?>