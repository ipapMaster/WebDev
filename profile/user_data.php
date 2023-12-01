<?php
// TODO: Потом сделаем при помощи БД
// $userID = "1";
// $userName = "Tom";
// $userEmail = "123@email.ru"; // логин
// $userLevel = "1"; // сделаем пока админом
// $userPass = "$2y$10\$mC5NStbsM.14nvFgLgBt2eEMM38bunUzydOodtT9/q9ux.nVcdHSi";

require_once("config/connect.php");

$email = htmlspecialchars(trim($_POST["userEmail"]));

$query = mysqli_query($link,"SELECT * FROM users WHERE EMAIL='".mysqli_real_escape_string($link, $email)."'");
$userdata = mysqli_fetch_assoc($query);
$userID = $userdata["ID"];
$userName = $userdata["NAME"];
$userEmail = $userdata["EMAIL"]; // логин
$userLevel = $userdata["LEVEL"]; // сделаем пока админом
$userPass = $userdata["PASS"];
?>