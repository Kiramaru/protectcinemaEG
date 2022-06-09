<?
if(!isset($_SESSION))
	{
		session_start();
	}
include 'functions.php';
?>
<head>
	<meta charset="utf-8">
	<title>Билет</title>
	<style>
		fieldset {
			padding: 20px;
			color:#25054f;
		}
		.flex-container {
			display: flex; 
			justify-content: center; 
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
	<div style="margin: auto; border: 4px double black;">
	<img src="image/regimg.jpg" width="300" height="300">
	<div>
	<p class="result"><?echo $_SESSION['film'];?></p>
	<p class="result"><?echo $_SESSION['date'] , " ", $_SESSION['time'];?></p>
	<p class="result"><?echo $_SESSION['price'] , "(" , $_SESSION['endprice'] , ")";?></p>
	<p class="result"><?echo "Кол-во: " , $_SESSION['number'];?></p>
	</div>
	</div>
</div>
<?
	
	$conn = Connect();
	mysqli_set_charset($conn, "utf8");
	$sqlbook = 'SELECT id, email FROM kosmosusers';
	$resultbook = mysqli_query($conn, $sqlbook);
	$id;
	while ($row = mysqli_fetch_array($resultbook))
	{
		if($row['email'] == $_SESSION['email'])
		{
			$id = $row['id'];
		}
	}
	$fi = $_SESSION['film'];
	$da = $_SESSION['date'];
	$ti = $_SESSION['time'];
	$end = $_SESSION['endprice'];
	$nu = $_SESSION['number'];
	$sqlbook = 'SELECT Name, Poster FROM sinema';
	$resul = mysqli_query($conn, $sqlbook);
	$sql = "INSERT INTO `tablfilm` (`id`, `id_user`, `name`, `date`, `time`, `tickets`, `cost`) VALUES (NULL, '".$id."','".$fi."', '".$da."','".$ti."', '".$end."', '".$nu."')";
	$result = mysqli_query($conn, $sql);

	$del = $_SESSION['tickets'] - $_SESSION['number'];
	settype($del, 'integer');
	$sqldel = "UPDATE timefilm SET ticketsnumber = '".$del."' WHERE id = '".$_SESSION['idtime']."'";
	$resultdel = mysqli_query($conn, $sqldel);
?>
<p style="margin: auto; display: flex; justify-content: center; flex-direction: column;"><a href="index.php" style="margin: auto">Вернуться назад</a></p>