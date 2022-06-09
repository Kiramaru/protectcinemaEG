<head>
	<meta charset="utf-8">
	<title>Восстановление пароля</title>
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
			<legend style="font-size:20px;">Восстановление пароля</legend>
			<p><label for="email" style="margin-right: 57px; font-size:20px;">Email</label><input type="email" id="email" name="email" style="font-size:20px;" required></p>
		<?
			include 'functions.php';
			$conn = Connect();
			mysqli_set_charset($conn, "utf8");
			if($_POST['register'] == "register"){
				$email = $_POST['email'];
				$sql_check_user = "SELECT * FROM kosmosusers";
				$result_check_user = mysqli_query($conn, $sql_check_user);
		
				$auth = 0;
				while ($row = mysqli_fetch_array($result_check_user))
				{
					if($row['email'] == $email)
					{
						echo '<div class="result">Письмо отправлено на почту!</div>';
					}
					else
					{
						$auth = 1;
					}
				}
				if($auth == 1)
				{
					echo '<div class="result">Такая почта не зарегестрирована в системе!</div>';
				}
			}?>	
		</fieldset>
		<p><button type="submit" name="register" value="register" style="font-size:20px; color:#25054f;" >Отправить письмо для восстановления</button></p>
	</form>
	<a href="authorization.php" style="margin: auto">Отмена</a>
</div>