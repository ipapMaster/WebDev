<?php
include("assets/functions.php");
$title = "Авторизация";
$main_menu = get_menu($menu);
require_once("profile/user_data.php");
if (!$_POST["userEmail"] || !$_POST["userPass"]) {
    $content = "<h2>Заполнены не все поля!";
    $content .= file_get_contents("assets/login.inc");
} else {
    $login = htmlspecialchars(trim($_POST["userEmail"]));
    $pass = htmlspecialchars(trim($_POST["userPass"]));
    // $h_pass = password_hash($pass, PASSWORD_DEFAULT);
    if (password_verify($pass, $userPass) && $login == $userEmail) {
        $content = "<h2>Вы успешно авторизовались</h2>";
        $userArray = [
            "ID" => $userID,
            "NAME" => $userName,
            "EMAIL" => $userEmail,
            "LEVEL" => $userLevel,
            "LOGGED" => true
        ];
        $_SESSION["USER"] = $userArray;
        $page = "refresh: 1, url=" . $_SERVER["HTTP_REFERER"];
        header($page);
    } else {
        $content = "<h2>Неверный логин или пароль</h2>";
        $page = "refresh: 1, url=" . $_SERVER["HTTP_REFERER"];
        header($page);
    }
}

include("assets/design.php");
?>