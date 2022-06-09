<?
include 'functions.php';
$conn = Connect();
if(!isset($_SESSION['email']))
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
        <?php
        mysqli_set_charset($conn, "utf8");
        $sqlbook = 'SELECT Name FROM sinema';
        $resultbook = mysqli_query($conn, $sqlbook);
        while($row = mysqli_fetch_array($resultbook))
        {
            $car_name = $row["Name"];
            echo "'$car_name',";
        }
        ?>
    ];
    $( "#find" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
    <head>
        <meta charset="utf-8">
        <title>Поиск фильма</title>
        <link rel="stylesheet" href="style/nado.css">  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
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
		<form method="get" autocomplete="off" style="width: 500px; margin: 0 auto;">
			<input type="text" name="find" id="find" style="width: 500px;"required><br>
			<button type="submit" name="search" value="search" style="position: relative; left: 40%; width: 100px; margin-top: 10px;">Поиск</button>
			<div id="findList"></div>
		</form>
        <?
        mysqli_set_charset($conn, "utf8");
		if($_GET['search'] == "search")
		{
			echo json_encode($response);
            $filmname = $_GET['find'];
			$sql = "SELECT * FROM sinema WHERE Name like '$filmname'";
			$result = mysqli_query($conn, $sql);
			$check = 0;
			while($row = mysqli_fetch_array($result))
			{
				$check = 1;
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
		}
		if($check == 0)
		{?>
			<div style="font-size: 25px; font-weight: bold; text-align: center; justify-content: center; margin-top: 25px;">Такого фильма нет в прокате!</div>
		<?}
		}?>
    </body>
</html>