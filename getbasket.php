<?php
include("assets/functions.php");
$title = "Ваша корзина";
$main_menu = get_menu($menu);
$content = "<h1>Ваша корзина</h1>";
$content .= "<div id=\"basket\"></div>";
$content .= "<div id=\"sendForm\"></div>";
if(isset($_SESSION["USER"]) && $_SESSION["USER"]["LOGGED"]) {
    $content .= "<button snd_id=\"sendBasket\" class=\"btn btn-primary sendbasket\" onclick=\"gatherInfo(this);\">Оформить</button>";
}
include("assets/design.php");
?>