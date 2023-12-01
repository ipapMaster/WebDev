<?php
require_once("config/connect.php");
include("assets/functions.php");
$product = (int) $_GET["id"];
$query = mysqli_query($link,"SELECT * FROM products WHERE id={$product}");
$detailed = mysqli_fetch_array($query, MYSQLI_ASSOC);
$main_menu = get_menu($menu);
$title = "{$detailed["NAME"]}";
$content = "<h1>{$title}</h1><br />";
$content .= "<div class=\"row w-75\">
<div class=\"col pt-4\">
<h4 class=\"card-title text-primary\">{$detailed["PRICE"]} &#8381;</h4><br />
<img src=\"images/{$detailed["PICT"]}\" width=\"150\" class=\"float-end imgshadow\" alt=\"{$title}\">
<p>{$detailed["DESCR"]}</p>
<a href=\"buy.php?product={$detailed["ID"]}\" class=\"btn btn-primary\">Купить</a>
</div>
</div>";
mysqli_close($link);
include("assets/design.php");
?>