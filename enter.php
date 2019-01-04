<?php
include("db.php"); //соединение с SQL
session_start(); //начало сессии
if(isset($_SESSION['ERRMSG']) &&is_array($_SESSION['ERRMSG']) &&count($_SESSION['ERRMSG']) >0 ) { //если есть ошибки сессии
	$err = "<table>"; //Start a table
foreach($_SESSION['ERRMSG'] as $msg) {//распознавание каждой ошибки
	$err .= "<tr><td>" . $msg . "</td></tr>"; //запись её в переменную
}
	$err .= "</table>"; //закрытие таблицы
	unset($_SESSION['ERRMSG']); //удаление сессии
}

$_SESSION['country'] = $_POST['place'];
$_SESSION['checkin'] = $_POST['checkin'];
$_SESSION['checkout'] = $_POST['checkout'];
$country = $_SESSION['country']; 
$query = "UPDATE
                sessions
             SET
                state = 1,
                country = '$country'
";

$db->query($query);

header('Location: https://mixin.one/oauth/authorize?client_id=4d64a975-897f-4609-a67d-a1a976f3211a&scope=PROFILE:READ+APPS:READ+APPS:WRITE');
session_regenerate_id(true); 
exit;			
?>