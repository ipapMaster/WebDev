<?php
include("assets/functions.php");
$title = "Ваша корзина";
$main_menu = get_menu($menu);
$content = "<h1>Ваша корзина</h1>";
$content .= "<div id=\"basket\"></div>";
include("assets/design.php");
?>