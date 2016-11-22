<?php
header("content-type:text/html; charset=utf8");
session_start();
//echo session_id() . "<br>";

$mysqli = mysqli_connect("127.0.0.1", "root", "19960907", "pingping");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$mysqli->set_charset('utf8');

var_dump($_FILES);
echo $_FILES['image']['tmp_name'];
$file_destination =  'images/' . $_FILES['image']['name'];
if (move_uploaded_file($_FILES['image']['tmp_name'], $file_destination)) {
    echo "Cv uploaded";
}
//$size = $_FILES['image']['size'];
//$tmp = $_FILES['image']['tmp_name'];
//$fp = fopen($tmp, 'rb');
//$data = fread($fp, $size);
//$data= mysqli_real_escape_string($mysqli, $data);
//echo $data;
//$dirpath = realpath(dirname(getcwd()));
//move_uploaded_file($_FILES['image']['tmp_name'], "images\\" . $_FILES['image']['name']);
/*
if (move_uploaded_file($_FILES['image']['tmp_name'], $dirpath . "\\PingPing\\images\\". $_FILES['image']['name'])) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
*/
$file = "images/" . $_FILES['image']['name'];
//$mysqli->query("insert into activity (picdirectory) values('$file') ");
//echo "hello world";

$tmpName = $_FILES['image']['tmp_name'];
$activity_name = $_POST['activity_name'];
$activity_time = $_POST['activity_time'];
$activity_population = $_POST['activity_population'];
$activity_place = $_POST['activity_place'];
$activity_describe = $_POST['activity_describe'];

$sql = "insert into activity";
$sql .= "(activity_name, activity_time, activity_population, activity_place, activity_describe, picdirectory)";
$sql .= "values('$activity_name', '$activity_time', '$activity_population', '$activity_place', '$activity_describe', '$file')";
//$sql .= "values('$image')";
if ($mysqli->query($sql) != TRUE) {
    echo "insert successful";
}

$result = $mysqli->query("select * from activity");
if ($result->num_rows > 0) {
    /*
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
    */
    while ($row = $result->fetch_assoc()) {
        echo $row["picdirectory"];
        //echo "<img src= 'images/carrot.jpg'>";
        echo "<img src='" . $row["picdirectory"] . "'>";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>发布成功</title>
    <meta charset="utf-8">
</head>
<body>
<img src="images/" <?php echo ""; ?>>
</body>
</html>
