<?
 function Connect()
 {
	$link = mysqli_connect("localhost", "root", "", "sinema");
	if ($link == false)
	{
		print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
	}
	return $link;
 }
 ?>