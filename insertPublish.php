<?php
header("content-type:text/html; charset=utf8");
session_start();
echo session_id() . "<br>";
$mysql = new SaeMysql();

$mysql->setCharset("utf8");

var_dump($_POST);

echo "<br>";
var_dump($_FILES);


if (isset($_FILES['image']['tmp_name'])) {
    // Temporary file name stored on the server
    $tmpName = $_FILES['image']['tmp_name'];
    $activity_name = $_POST['activity_name'];
    $activity_time = $_POST['activity_time'];
    $activity_population = $_POST['activity_population'];
    $activity_place = $_POST['activity_place'];
    $activity_describe = $_POST['activity_describe'];
    // Read the file
    $fp = fopen($tmpName, 'r');
    $data = fread($fp, filesize($tmpName));
    $data = addslashes($data);
    fclose($fp);
    //echo $data;
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
    $sql = "insert into activity";
    $sql .= "(activity_name, activity_time, activity_population, activity_place, activity_describe, picture)";
    $sql .= "values('$activity_name', '$activity_time', '$activity_population', '$activity_place', '$activity_describe', '$image')"
    //$sql .= "values('$image')";
    if ($mysql->runSql($sql) != TRUE) {
        echo "insert successful";
    }
}

?>
