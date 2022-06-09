<?if(!isset($_SESSION))
	{
		session_start();
	}
	include 'functions.php';
	$conn = Connect();	
	mysqli_set_charset($conn, "utf8");
	$sqlfilm = "SELECT * FROM sinema";
	$resultfilm = mysqli_query($conn, $sqlfilm);
	while($row = mysqli_fetch_array($resultfilm)){
		if($row['Name'] == $_SESSION['film'])
		{
			$_SESSION['idfilm'] = $row['id'];
			$_SESSION['price'] = $row['Ticket_price'];
		}
	}
	
	$sqluser = "SELECT * FROM kosmosusers";
	$resultuser = mysqli_query($conn, $sqluser);
	while($row = mysqli_fetch_array($resultuser)){
		if($row['email'] == $_SESSION['email'])
		{
			$_SESSION['cardnumsave'] = $row['cardnum'];
		}
	}
	
	if(isset($_GET['back']))
	{
		$_SESSION['idfilm'] = 0;
		$_SESSION['iddate'] = 0;
		$_SESSION['price'] = 0;
		$_SESSION['date'] = 0;
		$_SESSION['time'] = 0;
		$_SESSION['number'] = 0;
		$_SESSION['tickets'] = 0;
		$_SESSION['cardnum'] = 0;
		$_SESSION['monthyear'] = 0;
		$_SESSION['CVV'] = 0;
		$_SESSION['endprice'] = 0;
		header("location:index.php");
	}
	
	if(isset($_GET['redo']))
	{
		$_SESSION['idfilm'] = 0;
		$_SESSION['iddate'] = 0;
		$_SESSION['price'] = 0;
		$_SESSION['date'] = 0;
		$_SESSION['time'] = 0;
		$_SESSION['number'] = 0;
		$_SESSION['tickets'] = 0;
		$_SESSION['cardnum'] = 0;
		$_SESSION['monthyear'] = 0;
		$_SESSION['CVV'] = 0;
		$_SESSION['endprice'] = 0;
		header("location:book.php");
	}
	
	$sql = "SELECT * FROM datefilm";
	$result = mysqli_query($conn, $sql);
	if(isset($_GET['next1']))
	{
		$_SESSION['date'] = $_GET['date'];
		while($row = mysqli_fetch_array($result)){
		if($row['id_film'] == $_SESSION['idfilm'])
		{
			$_SESSION['iddate'] = $row['id'];
		}
		}
	}
	
	$sqltime = "SELECT * FROM timefilm";
	$resulttime = mysqli_query($conn, $sqltime);
	if(isset($_GET['next2']))
	{
		$_SESSION['time'] = $_GET['time'];
	}
	

	if(isset($_GET['next3']))
	{
		if($_GET['number'] == 0)
		{
			$eror = "Выберите кол-во билетов отличное от нуля!";
		}
		else
		{
			if($_SESSION['tickets'] < $_GET['number'])
			{
				$eror1 = "Невозможно забронировать столько билетов!";
			}
			else
			{
				$_SESSION['number'] = $_GET['number'];
			}
		}
	}
			
	
	if(isset($_POST['next4']))
	{
		$_SESSION['cardnum'] = $_POST['cardnum'];
		$_SESSION['monthyear'] = $_POST['monthyear'];
		$_SESSION['CVV'] = $_POST['CVV'];
		$_SESSION['endprice'] = ($_SESSION['price'] * $_SESSION['number']);
		if($_POST['checkbox'] == 'Yes')
		{
			$sqlnew = "UPDATE kosmosusers SET cardnum = '".$_SESSION['cardnum']."' WHERE email = '".$_SESSION['email']."'";
			$resultnew = mysqli_query($conn, $sqlnew);
		}
	}
	if(isset($_POST['next5']))
	{
		header("location:ticket.php");
	}
?>
<head>
	<meta charset="utf-8">
	<title>Бронировка билета</title>
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
	</style>
</head>
<div class="flex-container">
	<img src="image/regimg.jpg" width="400" height="400" style="margin: auto">
		<fieldset style="margin: auto">
			<legend style="font-size:20px;">Бронировка билета</legend>
			<? echo "<p align='center'>Название фильма: </p>";
			echo $_SESSION['film'];?>


			<?if(empty($_SESSION['date'])){?>
			<p><form method="get">
				<select name="date" required style="font-size:20px; color:#25054f;">
					<option value="0">Выберите дату</option>
					<? while($row = mysqli_fetch_array($result)){ if($row['id_film'] == $_SESSION['idfilm']){?>
					<option value="<?echo $row['date'];?>"><?echo $row['date'];?></option>
					<?}}?>
				</select>
				<p><button type="submit" name="next1" value="next1" style="font-size:20px; color:#25054f;" >Далее</button></p>
			</form></p>
			<?}?>
			
			
			<?if(!empty($_SESSION['date']) and (empty($_SESSION['time']))){?>
			<p><form method="get">
				<select name="time" required style="font-size:20px; color:#25054f;">
					<option value="0">Выберите время</option>
					<? while($row = mysqli_fetch_array($resulttime)){ if($row['id_date'] == $_SESSION['iddate']){?>
					<option value="<?echo $row['time'];?>"><?echo $row['time'];?></option>
					<?}}?>
				</select>
				<p><button type="submit" name="next2" value="next2" style="font-size:20px; color:#25054f;" >Далее</button></p>
			</form></p>
			<?}?>
			
			
			<?if(!empty($_SESSION['time'] and (empty($_SESSION['number'])))){?>
			<p><form method="get">
					<? while($row = mysqli_fetch_array($resulttime)){ if(($row['id_date'] == $_SESSION['iddate']) and ($row['time'] == $_SESSION['time'])){
						if($row['ticketsnumber'] == 0)
						{
							?><p><button type="submit" name="redo" value="redo" style="font-size:20px; color:#25054f; margin-top: 10px;">Начать сначала</button></p><?
							echo "К сожалению, билеты распроданы. Вернитесь назад и выберете другое время.";
							exit;
						}
						?>
						<input value="<?echo $row['ticketsnumber']?>"; <?$_SESSION['tickets'] = $row['ticketsnumber']; $_SESSION['idtime'] = $row['id'];?> style="font-size:15px;" disabled>
					<?}}?>
					<input name="number" style="font-size:15px;" pattern="[0-9]{0,2}" placeholder="Введите число билетов" required>
				<p><button type="submit" name="next3" value="next3" style="font-size:20px; color:#25054f;" >Далее</button></p>
				<? if(isset($eror)){echo $eror;} if(isset($eror1)){echo $eror1;}?>
			</form></p>
			<?}?>


			<?if(!empty($_SESSION['number'] and (empty($_SESSION['cardnum'])))){?>
			<p><form method="post">
					<input name="cardnum" value="<?echo $_SESSION['cardnumsave'];?>" style="font-size:15px; width: 205px;" pattern="[0-9]{16,16}" placeholder="Номер карты" required>
					<p><input name="monthyear" style="font-size:15px; width: 100px;" pattern="[0-9/]{5,5}" placeholder="MM/YY" required>
					<input name="CVV" style="font-size:15px; width: 100px;" pattern="[0-9]{3,3}" placeholder="CVV" required></p>
					<input type="checkbox" name="checkbox" value="Yes"/><label>Сохранить номер карты?</label>
				<p><button type="submit" name="next4" value="next4" style="font-size:20px; color:#25054f;" >Далее</button></p>
			</form></p>
			<?}?>
			
			
			<?if(!empty($_SESSION['cardnum'])){?>
			<p><form method="post">
					<p><input value="<?echo $_SESSION['date'];?>" style="font-size:20px; width: 150px;" disabled>
					<input value="<?echo $_SESSION['time'];?>" style="font-size:20px; width: 150px;" disabled></p>
					<p><input value="<?echo $_SESSION['tickets'];?>" style="font-size:20px; width: 150px;" disabled>
					<input value="<?echo $_SESSION['number'];?>" style="font-size:20px; width: 150px;" disabled></p>
					<input value="<?echo $_SESSION['cardnum'];?>" style="font-size:20px; width: 304px;" disabled>
					<p><input value="<?echo $_SESSION['monthyear'];?>" style="font-size:20px; width: 200px;" disabled>
					<input value="<?echo $_SESSION['CVV'];?>" style="font-size:20px; width: 100px;" disabled></p>
				<p>
				<input value="<?echo $_SESSION['endprice'];?>" style="font-size:20px; width: 100px;" disabled>
				<button type="submit" name="next5" value="next5" style="font-size:20px; color:#25054f;" >Забронировать</button>
				</p>
			</form></p>
			<?}?>
		</fieldset>
	<?if(!empty($_SESSION['endprice'])){?>
	<form method="get" style="display: flex; justify-content: center;">
		<button type="submit" name="redo" value="redo" style="font-size:20px; color:#25054f; margin-top: 10px;">Заполнить данные повторно</button>
	</form>
	<?}?>
	<form method="get" style="display: flex; justify-content: center;">
		<button type="submit" name="back" value="back" style="font-size:20px; color:#25054f; margin-top: 10px;">Вернуться назад</button>
	</form>
</div>