<?
if(!isset($_SESSION))
	{
		session_start();
	}
include 'functions.php';
if(empty($_SESSION['email']))
{
    header("location:authorization.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Мои билеты</title>
        <link rel="stylesheet" href="style/nado.css">
    </head>
    <body>
        <header>
            <a href="index.php">
                <img src="image/Рисунок1.jpg">
            </a>
            <h1><a href="index.php">Фильмы</a></h1>
            <h1><a href="search.php">Поиск фильма</a></h1>
            <h1><a href="mybilet.php">Мои билеты</a></h1>
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
        </header>
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
            $sqlbook = 'SELECT id_user, name, date, time, tickets, cost FROM tablfilm';
            $resultbook = mysqli_query($conn, $sqlbook);
            $flag = 0;
            while ($row = mysqli_fetch_array($resultbook))
            {
                if($id == $row['id_user'])
                { $flag = 1;?>
                    <div class="sinema">
                        <img src="image/regimg.jpg" width="50%" height="100%">
                        <div class="info">
                        <table>
                            <h2>Билет</h2>
                            <tr>
                                <td colspan="2">
                                    <h2><?echo $row['name'];?></h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Дата</p>
                                    <p><?echo $row['date'];?></p>
                                </td>
                                <td>
                                    <p>Время</p>
                                    <p><?echo $row['time'];?></p>
                                </td>
                            </tr>
                                <td>

                                    <p><?echo $row['tickets'];?> руб</p>
                                </td>
                                <td>
                                    <p><?echo $row['cost'];?> шт</p>
                                </td>
                            </tr>
                        </table>
                        </div>
                    </div>
              <?}
            }
            ?>
        <?
        if ($flag==0)
        {
            echo '<h2 align="center">Вы пока не приобрели билеты.</h2>';
        }
        ?>
    </body>
</html>        