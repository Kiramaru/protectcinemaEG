 <?
 function Connect()
 {
	$link = mysqli_connect("localhost", "root", "", "db_kosmos");
	if ($link == false)
	{
		print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
	}
	return $link;
 }
 function Adddata($result, $conn)
 {
	if ($result) {
		echo '<div class="result">Успешная регистрация!</div>';
    } else {
		echo '<div class="result" style="font-size:14px;">Некорректно введены данные!</div>';
    }
 }
 function NEWpassword($result, $conn)
 {
	if ($result) {
		echo '<div class="result">Пароль изменен!</div>';
    } else {
		echo '<div class="result" style="font-size:20px;">Некорректно введены данные!</div>';
    }
 }
 function NEWcardnum($result, $conn)
 {
	if ($result) {
		echo '<div class="result">Номер карты изменен!</div>';
    } else {
		echo '<div class="result" style="font-size:20px;">Некорректно введены данные!</div>';
    }
 }
 ?>