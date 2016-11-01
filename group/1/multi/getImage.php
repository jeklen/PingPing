<?php
/**
 * Date: 10/29/16
 * Time: 9:39 AM
 */
$id = $_GET['id'];
// do some validation here to ensure id is safe
$mysql = new SaeMysql();
$sql = "select picture from activity where id = $id";
$result = $mysql->getLine($sql);

header("Content-type: image/jpeg");
echo $result['picture'];
?>
