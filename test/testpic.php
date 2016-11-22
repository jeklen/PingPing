<?php
header("content-type:text/html; charset=utf8");
session_start();
echo session_id() . "<br>";
$mysql = new SaeMysql();

$mysql->setCharset("utf8");

$mysql->runSql("select * from activity");
$sql = "select * from activity";
$result = $mysql->runSql($sql);
//var_dump($result);

if ($result->num_rows > 0) {
    echo $result->num_rows ."<br>";
    while ($row = $result->fetch_assoc()) {
        //echo $row["picdirectory"];
        //echo "<img src= 'images/carrot.jpg'>";
        echo "<img src='" . $row["picdirectory"] . "'>";
    }
}
?>