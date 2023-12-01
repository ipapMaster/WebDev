<?php
include("assets/functions.php");
$title = "Ваша корзина";
$main_menu = get_menu($menu);
if (isset($_SESSION["BASKET"])) {
    $arBasket = $_SESSION["BASKET"];
    $content = "<h1>Ваша корзина</h1>";
    $content .= "<table class=\"table table-striped table-secondary table-bordered\">
                <thead>
                    <tr class=\"text-center\">
                        <th scope=\"col\">#</th>
                        <th scope=\"col\">Продукт</th>
                        <th scope=\"col\">Описание</th>
                        <th scope=\"col\">&nbsp;</th>
                        <th scope=\"col\">Цена за ед., руб.</th>
                        <th scope=\"col\">Кол-во, ед.</th>
                        <th scope=\"col\">Всего, руб.</th>
                    </tr>
                </thead>
                <tr>";
    $count = 0;
    $total = 0;
    foreach ($arBasket as $product) {
        foreach ($product as $key => $value) {
            if ($key == "ID") {
                $id = $value;
                $content .= "<td>" . ++$count . "</td>";
                continue;
            }
            if ($key == "PICT") {
                $content .= "<td class=\"text-center\"><img src=\"images/{$value}\" width=\"50\"></td>";
            } else if ($key == "NAME") {
                $content .= "<td><a class=\"link-underline-light\" href=\"product.php?id={$id}\">{$value}</a></td>";
            } else {
                $content .= "<td>{$value}</td>";
            }
        }
        $content .= "<td>" . $product["PRICE"] * $product["COUNT"] . "</td>";
        $content .= "</tr>";
        $total += $product["PRICE"] * $product["COUNT"];
    }
    $content .= "<tr>";
    $content .= "<td colspan=\"6\" class=\"text-end\"><b>ИТОГО:</b></td>";
    $content .= "<td><b>{$total}</b></td>";
    $content .= "</tr>";
    $content .= "</table>";
} else {
    $content = "<h2>Ваша корзина пуста!</h2>";
}
include("assets/design.php");
?>