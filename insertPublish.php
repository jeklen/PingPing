<?php
$mysql = new SaeMysql();

if (!$mysql->setCharset("utf8")) {
    echo "can't set charset to utf8" . "<br>";
}
//$mysql->setCharset("UTF8");
$mysql->close();
var_dump($_POST);

?>
