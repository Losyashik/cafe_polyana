<?php
require_once("./lib/connect.php");
echo json_encode(getArrayData("SELECT * FROM product WHERE id = {$_GET['id']}")[0]);
