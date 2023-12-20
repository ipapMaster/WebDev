<?php
include("assets/functions.php");
$title = "Ваша корзина";
$main_menu = get_menu($menu);

$content = "<h2>Ваш заказ оформлен!</h2>";

if (isset($_POST["basket"])) {
    $temp = $_POST["basket"];
    $basket = json_decode($temp, true);
    $content .= "<table class=\"table table-striped table-secondary table-bordered\">";
    $content .= "<thead>
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
        <tr class=\"text-center\">";
    $count = 0;
    $total = 0;
    foreach ($basket as $product) {
        foreach ($product as $key => $value) {
            switch ($key) {
                case "ID":
                    $id = $value;
                    $content .= "<td>" . ++$count . "</td>";
                    break;
                case "PICT":
                    $content .= "<td><img src=\"images/{$value}\" width=\"50\"></td>";
                    break;
                case "NAME":
                    $content .= "<td><a class=\"link-underline-none\" href=\"product.php?id={$id}\">{$value}</a></td>";
                    break;
                case "PRICE":
                    $price = $value;
                    $content .= "<td>{$value}</td>";
                    break;
                case "COUNT":
                    $count = $value;
                    $content .= "<td>{$value}</td>";
                    break;
                default:
                    $content .= "<td>{$value}</td>";
                    break;
            }
        }
        $content .= "<td>" . $count * $price . "</td>";
        $content .= "</tr>";
        $total += $count * $price;
    }
    $content .= "<tr>";
    $content .= "<td colspan=\"6\"><b>ИТОГО:</b></td>";
    $content .= "<td><b>{$total}</b></td>";
    $content .= "</tr>";
    $content .= "</table>";
}
include("assets/design.php");
?>