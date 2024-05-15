<?php
$link = mysqli_connect("", "root", "", "polyana");

function getArrayData(String $query)
{
    global $link;
    $result = $link->query($query);
    for ($data = []; $row = $result->fetch_assoc(); $data[] = $row);
    return $data;
}
function request(String $query)
{
    global $link;
    $result = $link->query($query);
    return $result;
}
