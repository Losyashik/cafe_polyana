<?php
require_once("./lib/connect.php");

request("INSERT INTO `application`(`name`, `number`, `addres`, `payment`) VALUES ('{$_POST['name']}','{$_POST['number']}','{$_POST['addres']}','{$_POST['payment']}')");

$id = $link->insert_id;
foreach (json_decode($_POST['productList'],1) as $item) {
    echo ("INSERT INTO `product_list`(`id_application`, `id_product`, `count`, `price`) VALUES ('$id','{$item['id']}','{$item['count']}','{$item['price']}')");
    request("INSERT INTO `product_list`(`id_application`, `id_product`, `count`, `price`) VALUES ('$id','{$item['id']}','{$item['count']}','{$item['price']}')");
}
