<?php
$mysql = new SaeMysql();

$mysql->setCharset("utf8");
header("content-type:text/html; charset=utf8");

var_dump($_POST);

?>
