<?php
header("content-type:text/html; charset=utf8");
session_start();
//echo session_id() . "<br>";

$mysqli = mysqli_connect("127.0.0.1", "root", "19960907", "pingping");
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

var_dump($_FILES);
echo $_FILES['image']['tmp_name'];
//$size = $_FILES['image']['size'];
//$tmp = $_FILES['image']['tmp_name'];
//$fp = fopen($tmp, 'rb');
//$data = fread($fp, $size);
//$data= mysqli_real_escape_string($mysqli, $data);
//echo $data;
if (move_uploaded_file($_FILES['image']['tmp_name'], "images\\" . $_FILES['image']['name'])) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
$file = "images/" . $_FILES['image']['name'];
$mysqli->query("insert into activity (picdirectory) values('$file') ");
//$mysqli->query("insert into activity (activity_name) values ('去南京路')");
echo "hello world";

$sql = "select * from activity";
$result = $mysqli->query($sql);

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
