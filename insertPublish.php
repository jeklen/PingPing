<?php
$mysql = new SaeMysql();

if (!$mysql->setCharset("UTF8")) {
    echo "can't set charset to utf8" . "<br>";
}
//$mysql->setCharset("UTF8");
var_dump($_POST);

?>
