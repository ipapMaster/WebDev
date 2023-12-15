<?php
require_once("config/connect.php");
include("assets/functions.php");
$productID = (int) $_GET["product"];
$title = "Наша продукция";
$main_menu = get_menu($menu);
//создаётся $_SESSION["BASKET"]
if ($productID > 0) {
    $query = mysqli_query($link, "SELECT * FROM products WHERE id={$productID}");
    $arProduct = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $arProduct["COUNT"] = @$_SESSION["BASKET"][$arProduct["ID"]]["COUNT"] ? $_SESSION["BASKET"][$arProduct["ID"]]["COUNT"] + 1 : 1;
    unset($arProduct["DESCR"]); // "выкидываем" из массива ключ с полным описанием
    $_SESSION["BASKET"][$arProduct["ID"]] = $arProduct;
    header("Location: basket.php");
    //$arBasket = $_SESSION["BASKET"];
}

mysqli_close($link);
include("assets/design.php");
?>