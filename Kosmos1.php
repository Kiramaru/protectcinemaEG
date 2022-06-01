<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Кинотеатр "Космос"</title>
        <link rel="stylesheet" href="style/nado.css">
    </head>
    <body>
        <header>
            <img src="image/Рисунок1.jpg">
            <h1><a href="#">Фильмы</a></h1>
            <h1><a href="#">Поиск фильма</a></h1>
            <h1><a href="#">Мои билеты</a></h1>
            <table cellspacing="10px">
                <tr>
                    <td>
                        <a href="#">Авторизация</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">Регистрация</a>
                    </td>
                </tr>
            </table>
        </header>
        <div class="sort">
            <form method="post">
                <select name="sort" class="sel1"><p>
                    <option selected value="умолч">Выберите сортировку</option>
                    <option value="жанр">По жанру</option>
                    <option value="хрон">По хронометражу</option>
                    <option value="возр">По возрасту</option>
                    <option value="страна">По стране</option>
                    </p></select>
            </form>
        </div>
        <?
        include 'function.php';
        $conn = Connect();
        mysqli_set_charset($conn, "utf8");
        $sqlbook = 'SELECT Name, Country, Genre, Timing, Poster, Information, Ticket_price, Age_imit FROM sinema';
        $resultbook = mysqli_query($conn, $sqlbook);
        ?>
        <? while($row = mysqli_fetch_array($resultbook))
            {
                $image = $row['Poster'];
        ?>
            <div class="sinema">
                <?echo "<img src=$image>";?>
                <div class="info">
                    <div class="margin">
                        <p><?echo $row['Country'];?></p>
                        <p><?echo $row['Genre'];?></p>
                        <p><?echo $row['Timing'];?></p>
                    </div>
                <table>
                    <tr>
                        <td><h3><?echo $row['Name'];?></h3></td>
                        <td class="bol"><?echo $row['Age_imit'];?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><?echo $row['Information'];?></p>
                        </td>
                    </tr>
                    <tr class="margin">
                        <td><p><?echo $row['Ticket_price'] . " " ."sotcery gems";?></p></td>
                        <td><p>Забронировать</p></td>
                    </tr>
                </table>
                </div>
            </div>
        <?
            }
        ?>
        </table>
        <div class="pagination">
            <p><</p>  
            <p>1</p>
            <p>2</p>
            <p>></p>
        </div>
        <div class="footer">
            <p>Тут могли бы быть контакты и адрес кинотеатра...</p>
            <p>Но мы хотим спать.</p>
        </div>
    </body>
</html>