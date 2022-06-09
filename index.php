<!DOCTYPE html>
<?if(!isset($_SESSION['email']))
	{
		session_start();
	}

	if(isset($_GET['button']) and (!empty($_SESSION['email'])))
	{
		$_SESSION['film'] = $_GET['button'];
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
	else if (isset($_GET['button']))
	{
		header("location:authorization.php");
	}
?>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Кинотеатр "Космос"</title>
        <link rel="stylesheet" href="style/nado.css">
		<style>
			@media(max-width: 1150px){
				html, h1, h2, p, input{
				  font-size: 12px !important;
				}
				img{width: 40% !important; height: 40% !important;}
				.sinema
				{
					margin:2% 15% 2% 15%; 
					padding: 2% 2% 2% 2%;
					border-radius: 10px 10px 10px 10px;			
				}
			}
			@media(max-width: 750px){
				html, h1, h2, p, input{
				  font-size: 10px !important;
				}
				img{width: 30% !important; height: 30% !important;}
				.sinema
				{
					margin:2% 10% 2% 10%; 
					padding: 2% 2% 2% 2%;
					border-radius: 8px 8px 8px 8px;			
				}
			}
		</style>
    </head>
    <body>
        <header>
			<a href="index.php">
            <img src="image/Рисунок1.jpg">
			</a>
            <h1><a href="index.php">Фильмы</a></h1>
            <h1><a href="search.php">Поиск фильма</a></h1>
            <h1><a href="mybilet.php">Мои билеты</a></h1>
			<?if(empty($_SESSION['email'])){?>
            <table cellspacing="10px">
                <tr>
                    <td>
                        <a href="authorization.php">Авторизация</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="registration.php">Регистрация</a>
                    </td>
                </tr>
            </table>
			<?}else{?>
				<table cellspacing="10px">
				<tr>
                    <td>
                        <?echo 'Добро пожаловать,';?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="cabinet.php"><?echo $_SESSION['email'];?></a>
                    </td>
                </tr>
				</table>
			<?}?>
        </header>
        <h2 style="background-color: #FFFDE8; margin: 0; padding: 10px;">Сортировка фильмов</h2>
		<form method="get" style="display: block;">
			<p style="background-color: #A59FAD; font-size: 20px; margin: 0; padding: 10px;">По жанру: 
				<input type="radio" name="genre" value="Мультфильм"><label>Мультфильм</label>
				<input type="radio" name="genre" value="Ужасы"><label>Ужасы</label>
				<input type="radio" name="genre" value="Триллер"><label>Триллер</label>
				<input type="radio" name="genre" value="Фэнтези"><label>Фентези</label>
				<input type="radio" name="genre" value="Комедия"><label>Комедия</label>
				<input type="radio" name="genre" value="Приключения"><label>Приключения</label>
				<input type="submit" value="Сортировать" name="sort_1" style="font-size: 20px;">
			</p>
		</form>
		<form method="get" style="display: block;">
			<p style="background-color: #FFFDE8; font-size: 20px; margin: 0; padding: 10px;">По хронометражу: 
				<input type="radio" name="time" value="119"><label>Меньше 2-х часов</label>
				<input type="radio" name="time" value="120"><label>Больше 2-х часов</label>
				<input type="submit" value="Сортировать" name="sort_2" style="font-size: 20px;">
			</p>
		</form>
		<form method="get" style="display: block;">
			<p style="background-color: #A59FAD; font-size: 20px; margin: 0; padding: 10px;">По возрасту: 
				<input type="radio" name="age" value="6+"><label>6+</label>
				<input type="radio" name="age" value="12+"><label>12+</label>
				<input type="radio" name="age" value="16+"><label>16+</label>
				<input type="radio" name="age" value="18+"><label>18+</label>
				<input type="submit" value="Сортировать" name="sort_3" style="font-size: 20px;">
			</p>
		</form>
		<form method="get" style="display: block;">
			<p style="background-color: #FFFDE8; font-size: 20px; margin: 0; padding: 10px;">По стране: 
				<input type="radio" name="country" value="Япония"><label>Япония</label>
				<input type="radio" name="country" value="США"><label>США</label>
				<input type="radio" name="country" value="Великобритания"><label>Великобритания</label>
				<input type="radio" name="country" value="Россия"><label>Россия</label>
				<input type="radio" name="country" value="Франция"><label>Франция</label>
				<input type="submit" value="Сортировать" name="sort_4" style="font-size: 20px;">
			</p>
        </form>
        <?
        include 'functions.php';
        $conn = Connect();
        mysqli_set_charset($conn, "utf8");
        $sqlbook = 'SELECT Name, Country, Genre, Timing, Poster, Information, Ticket_price, Age_imit FROM sinema';
        $resultbook = mysqli_query($conn, $sqlbook);
        ?>
        <? 
		if(($_GET['sort_1'] != 'Сортировать') and ($_GET['sort_2'] != 'Сортировать') and ($_GET['sort_3'] != 'Сортировать') and ($_GET['sort_4'] != 'Сортировать'))
		{
			while($row = mysqli_fetch_array($resultbook))
				{
                $image = $row['Poster'];
        ?>
            <div class="sinema">
                <?echo "<img src=$image>";?>
                <div class="info">
                    <div class="margin">
                        <p><?echo $row['Country'];?></p>
                        <p><?echo $row['Genre'];?></p>
                        <p><?echo $row['Timing'], " мин.";?></p>
                    </div>
                <table>
                    <tr>
                        <td><h2><?echo $row['Name'];?></h2></td>
                        <td class="bol"><?echo $row['Age_imit'];?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><?echo $row['Information'];?></p>
                        </td>
                    </tr>
                    <tr class="margin">
                        <td><p><?echo $row['Ticket_price'] . " " ."рублей";?></p></td>
                        <td><form method="get">
							   <button type="submit" name="button" value="<?echo $row['Name'];?>">Забронировать</button>
							</form>
						</td>
                    </tr>
                </table>
                </div>
            </div>
        <?
		}} else
		{
			$genre = $_GET['genre'];
			$time = $_GET['time'];
			$age = $_GET['age'];
			$country = $_GET['country'];
			if($_GET['sort_1'] == 'Сортировать')
			{
				$sql = "SELECT * FROM sinema WHERE Genre like '$genre'";
				$result = mysqli_query($conn, $sql);
			}
			else if($_GET['sort_2'] == 'Сортировать')
			{
				if($time==119)
				{
					$sql = "SELECT * FROM sinema WHERE Timing <= '$time'";
					$result = mysqli_query($conn, $sql);
				}
				else if($time==120)
				{
					$sql = "SELECT * FROM sinema WHERE Timing >= '$time'";
					$result = mysqli_query($conn, $sql);
				}

			}
			else if($_GET['sort_3'] == 'Сортировать')
			{
				if($age )
				$sql = "SELECT * FROM sinema WHERE Age_imit like '$age'";
				$result = mysqli_query($conn, $sql);
			}
			else if($_GET['sort_4'] == 'Сортировать')
			{
				$sql = "SELECT * FROM sinema WHERE Country like '$country'";
				$result = mysqli_query($conn, $sql);
			}	
			while($row = mysqli_fetch_array($result))
				{
                $image = $row['Poster'];
        ?>
            <div class="sinema">
                <?echo "<img src=$image>";?>
                <div class="info">
                    <div class="margin">
                        <p><?echo $row['Country'];?></p>
                        <p><?echo $row['Genre'];?></p>
                        <p><?echo $row['Timing'], " мин.";?></p>
                    </div>
                <table>
                    <tr>
                        <td><h2><?echo $row['Name'];?></h2></td>
                        <td class="bol"><?echo $row['Age_imit'];?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><?echo $row['Information'];?></p>
                        </td>
                    </tr>
                    <tr class="margin">
                        <td><p><?echo $row['Ticket_price'] . " " ."рублей";?></p></td>
                        <td><form method="get">
							   <button type="submit" name="button" value="<?echo $row['Name'];?>">Забронировать</button>
							</form>
						</td>
                    </tr>
                </table>
                </div>
            </div>
		<?}}
        ?>
    </body>
</html>