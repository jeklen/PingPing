<?php
session_start();
echo session_id() . "<br>";
$mysql = new SaeMysql();

$mysql->setCharset("utf8");
header("content-type:text/html; charset=utf8");


print_r($_SERVER);

var_dump($_POST);

echo "<br>";
var_dump($_FILES);

?>
