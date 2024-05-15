<?php
require_once("./lib/connect.php");
$start = $_GET['page'] * 12;
$data = [];
$data["pages"] = ceil(getArrayData("SELECT COUNT(id) as count FROM product WHERE id_category = {$_GET['id']}")[0]['count'] / 12);
$data["products"] = getArrayData("SELECT * FROM product WHERE id_category = {$_GET['id']} LIMIT $start,12");

echo json_encode($data, 0);
