<?php
require_once("config/connect.php");
include("assets/functions.php");
$title = "Форма регистрации";
$main_menu = get_menu($menu);
if (isset($_POST["sent"])) {
    $err = [];

    $name = htmlspecialchars(trim($_POST["userName"]));
    $email = htmlspecialchars(trim($_POST["userEmail"]));
    $pass1 = htmlspecialchars(trim($_POST["userPass1"]));
    $pass2 = htmlspecialchars(trim($_POST["userPass2"]));
    $level = 1;

    if (strlen($name) < 3 || strlen($name) > 30) {
        $err[] = "Имя должно быть более 3-х символов, но не более 30-ти";
    }

    if ($pass1 != $pass2 || strlen($pass1) < 3) {
        $err[] = "Пароли не совпадают или длина пароля менее 3-х символов";
    }

    $query = mysqli_query($link, "SELECT NAME FROM users WHERE EMAIL='" . mysqli_real_escape_string($link, $email) . "'") or die(mysqli_error($link));

    if (mysqli_num_rows($query) > 0) {
        $err[] = "Такой пользователь уже зарегистрирован!";
    }

    if (count($err) == 0) {
        $password = password_hash($pass1, PASSWORD_DEFAULT);
        $regtime = date("Y-m-d H:i:s");
        mysqli_query($link, "INSERT INTO users SET NAME='" . $name . "', EMAIL='" . $email . "', PASS='" . $password . "', LEVEL='" . $level . "', REGTIME='" . $regtime . "'") or die(mysqli_error($link));
        $content = "<h2>Вы успешно прошли регистрацию. Теперь войдите</h2>";
        header("refresh: 1, url=loginform.html");
        exit();
    } else {
        $content = "При регистрации произошли ошибки: ";
        foreach ($err as $error) {
            $content .= $error . "<br />";
        }
        $content = get_content("assets/register.inc");
    }
    mysqli_close($link);
}
include("assets/design.php");
?>