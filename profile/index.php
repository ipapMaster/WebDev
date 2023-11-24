<?php
session_start();
// TODO: Потом сделаем при помощи БД
/*$userArray = [
    "ID" => "1",
    "NAME" => "Tom"
];

$_SESSION["USER"] = $userArray;
*/
if(isset($_SESSION["USER"])) {
    echo $_SESSION["USER"]["NAME"] . ", Вы авторизованы";
} else {
    echo "Вы не авторизованы";
}
?>