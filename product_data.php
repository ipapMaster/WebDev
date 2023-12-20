<?php
require_once("config/connect.php");
include("assets/functions.php");

if (@$_GET["id"]) {
    $product = (int) $_GET["id"];
    $query = mysqli_query($link, "SELECT * FROM products WHERE id={$product}");
    $detailed = mysqli_fetch_array($query, MYSQLI_ASSOC);
    unset($detailed["DESCR"]); // выкидываем ключ полного описания
    mysqli_close($link);
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($detailed, JSON_UNESCAPED_UNICODE);
} else {
    $detailed = ['error' => 'Bad request'];
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($detailed, JSON_UNESCAPED_UNICODE);
}
?>