<?php
header("content-type:text/html; charset=utf8");
session_start();
echo session_id() . "<br>";
$mysql = new SaeMysql();

$mysql->setCharset("utf8");

//var_dump($_POST);

echo "<br>";
//var_dump($_FILES);


if (isset($_FILES['image']['tmp_name'])) {
    // Temporary file name stored on the server
    $tmpName = $_FILES['image']['tmp_name'];
    $activity_name = $_POST['activity_name'];
    $activity_time = $_POST['activity_time'];
    $activity_population = $_POST['activity_population'];
    $activity_place = $_POST['activity_place'];
    $activity_describe = $_POST['activity_describe'];
    /*
    // Read the file
    $fp = fopen($tmpName, 'r');
    $data = fread($fp, filesize($tmpName));
    $data = addslashes($data);
    fclose($fp);
    //echo $data;
    //$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
    */
    /*
    $file_destination =  'images/' . $_FILES['image']['name'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], $file_destination)) {
        echo "image uploaded";
    }

    $file = "images/" . $_FILES['image']['name'];
    */

    $size = $_FILES['image']['size'];
    $tmp = $_FILES['image']['tmp_name'];
    $fp = fopen($tmp, 'rb');
    $data = fread($fp, $size);
    $data= mysqli_real_escape_string($mysqli, $data);

    $sql = "insert into activity";
    $sql .= "(activity_name, activity_time, activity_population, activity_place, activity_describe, picdirectory)";
    $sql .= "values('$activity_name', '$activity_time', '$activity_population', '$activity_place', '$activity_describe', '$data')";
    //$sql .= "values('$image')";
    if ($mysql->runSql($sql) != TRUE) {
        echo "insert successful";
    }

    $sql = "select * from activity";
    $result = $mysql->runSql($sql);
    //var_dump($result);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["picdirectory"];
            //echo "<img src= 'images/carrot.jpg'>";
            echo "<img src='" . $row["picdirectory"] . "'>";
        }
    }
}

?>
