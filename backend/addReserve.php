<?php
require_once("./lib/connect.php");
$name = $_POST['name'];
$number = $_POST['number'];
$id_table = $_POST['table'];
$date = $_POST['date'];
$time = $_POST['time'];
request("INSERT INTO `reserve`(`name`,`number`,`id_table`,`date`,`time`) VALUES ('$name', '$number',$id_table,'$date','$time')");
header("Location:./../");
