<?php
include("assets/functions.php");
$pos = (int)$_GET["pos"];
$title = "Удалить позицию № {$pos}";
$main_menu = get_menu($menu);
if (isset($_SESSION["BASKET"]) && array_key_exists($pos, $_SESSION["BASKET"])) {
    $item = $_SESSION["BASKET"][$pos]["NAME"];
    unset($_SESSION["BASKET"][$pos]);
    $content = "<h2>Позиция \"{$item}\" удалена</h2>";
    header("refresh: 1, url=basket.php");
} else {
    header("Location: basket.php");
}

include("assets/design.php");
?>