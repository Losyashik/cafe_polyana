<?php
function convertRUcharacters($str)
{
    $from = array('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', ' ');
    $to = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'cz', 'ch', 'sh', 'shh', '', 'y', '', 'e', 'yu', 'ya', 'A', 'B', 'V', 'G', 'D', 'E', 'E', 'ZH', 'Z', 'I', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'KH', 'CZ', 'CH', 'SH', 'SHH', '', 'Y', '', 'E', 'YU', 'YA', '_');
    return str_replace($from, $to, $str);
}
require_once("./lib/connect.php");
if (isset($_POST['category'])) {
    switch ($_POST['category']) {
        case "get": {
                echo (json_encode(getArrayData("SELECT * FROM category")));
                break;
            }
        case "add": {
                request("INSERT INTO `category`( `name`) VALUES ('{$_POST['name']}')");
                echo (json_encode(getArrayData("SELECT * FROM category")));
                break;
            }
        case "delete": {
                request("DELETE FROM category WHERE id = '{$_POST['id']}'");
                echo (json_encode(getArrayData("SELECT * FROM category")));
                break;
            }
    }
}
if (isset($_POST['table'])) {
    switch ($_POST['table']) {
        case "get": {
                echo (json_encode(getArrayData("SELECT * FROM tables")));
                break;
            }
        case "add": {
                request("INSERT INTO `tables`(`number`) VALUES ('{$_POST['name']}')");
                echo (json_encode(getArrayData("SELECT * FROM tables")));
                break;
            }
        case "delete": {
                request("DELETE FROM tables WHERE id = '{$_POST['id']}'");
                echo (json_encode(getArrayData("SELECT * FROM tables")));
                break;
            }
    }
}

if (isset($_POST['product'])) {
    switch ($_POST['product']) {
        case "get": {
                echo json_encode(getArrayData("SELECT *, category.name as category, product.name as name,    product.id as id FROM `product`, `category` WHERE `id_category` = `category`.`id`"));
                break;
            }
        case "add": {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $description = $_POST['description'];
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $path = "./assets/images/products/" . convertRUcharacters($name) . ".$ext";
                if (move_uploaded_file($_FILES['image']['tmp_name'], "./." . $path)) {
                    request("INSERT INTO `product`(`id_category`, `name`, `image`, `description`, `price`) VALUES ('$category','$name','$path','$description','$price')");
                    echo json_encode(getArrayData("SELECT *, category.name as category, product.name as name, product.id as id FROM `product`, `category` WHERE `id_category` = `category`.`id`"));
                } else {
                    throw new Exception("Файл не загружен");
                }
                break;
            }
        case "delete": {
                request("DELETE FROM tables WHERE id = '{$_POST['id']}'");
                echo json_encode(getArrayData("SELECT *, category.name as category, product.name as name,    product.id as id FROM `product`, `category` WHERE `id_category` = `category`.`id`"));
                break;
            }
        case 'update':

            break;
    }
}
if (isset($_POST['application'])) {
    switch ($_POST['application']) {
        case "get": {
                $data = [];
                $res = request("SELECT * FROM `application` WHERE compleat=0");
                while ($row = $res->fetch_assoc()) {
                    foreach (getArrayData("SELECT * FROM product_list WHERE id_application = {$row['id']}") as $item) {
                        $item['name'] = getArrayData("SELECT name FROM product WHERE id = {$item['id_product']}")[0]['name'];
                        $row['productList'][] = $item;
                    }
                    $data[] = $row;
                }
                echo json_encode($data);
                break;
            }
        case "compleat": {
                request("UPDATE `application` SET `compleat`='1' WHERE `id`='{$_POST['id']}'");
                $data = [];
                $res = request("SELECT * FROM `application` WHERE compleat=0");
                while ($row = $res->fetch_assoc()) {
                    foreach (getArrayData("SELECT * FROM product_list WHERE id_application = {$row['id']}") as $item) {
                        $item['name'] = getArrayData("SELECT name FROM product WHERE id = {$item['id_product']}")[0]['name'];
                        $row['productList'][] = $item;
                    }
                    $data[] = $row;
                }
                echo json_encode($data);
                break;
            }
    }
}
if (isset($_POST['reserve'])) {
    switch ($_POST['reserve']) {
        case "get": {
                echo json_encode(getArrayData("SELECT *,`reserve`.`id` as `id`,`reserve`.`number` as `number`, `tables`.`number` as `table` FROM `reserve`,`tables` WHERE compleat=0 AND `tables`.`id` = id_table"));
                break;
            }
        case "compleat": {
                request("UPDATE `reserve` SET `compleat`='1' WHERE `id`='{$_POST['id']}'");
                echo json_encode(getArrayData("SELECT *,`reserve`.`id` as `id`,`reserve`.`number` as `number`, `tables`.`number` as `table` FROM `reserve`,`tables` WHERE compleat=0 AND `tables`.`id` = id_table"));
                break;
            }
    }
}
