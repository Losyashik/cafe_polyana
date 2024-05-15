<?php
require_once("./lib/connect.php");
$data =getArrayData("SELECT * FROM product WHERE id = {$_GET['id']}")[0];
$data['count'] = 1;
echo json_encode($data);
