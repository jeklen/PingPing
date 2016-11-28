<?php
header("content-type:text/html; charset=utf8");
session_start();
echo session_id() . "<br>";
$userid = session_id();
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
	/* table2: user
id user_name tel qq activity_id_initiate activity_id_join */
	$user_name = $_POST['user_name'];
	$tel = $_POST['tel'];
	$qq = $_POST['qq'];
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
/*
    $size = $_FILES['image']['size'];
    $tmp = $_FILES['image']['tmp_name'];
    $fp = fopen($tmp, 'rb');
    $data = fread($fp, $size);
    $data= mysqli_real_escape_string($mysql, $data);
*/

    $name= 'asitela-'.time().'.jpg';
    $form_data =$_FILES['image']['tmp_name'];
    $s2 = new SaeStorage();
    $img = new SaeImage();
    $img_data = file_get_contents($form_data);//获取本地上传的图片数据
    $img->setData($img_data);
    $img->resize(720,720); //图片缩放为180*180
    $img->improve();//提高图片质量的函数
    $new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
    $s2->write('images',$name,$new_data);//将public修改为自己的storage 名称
    $url= $s2->getUrl('images',$name);//将public修改为自己的storage 名称echo "文件名：".$name."<br/>";
    //echo "Image url:".$url."<br/>";
    //echo "<img src='$url' />";

    $sql = "insert into activity";
    $sql .= "(activity_name, user_id, activity_time, activity_population, activity_place, activity_describe, picdirectory)";
    $sql .= "values('$activity_name', '$user_id', '$activity_time', '$activity_population', '$activity_place', '$activity_describe', '$url')";
    //$sql .= "values('$image')";
    if ($mysql->runSql($sql) != TRUE) {
        echo "insert successful";
    }
	$sql2 = "insert into user";
    $sql2 .= "(user_name,tel,qq)";
    $sql2 .= "values('$user_name','$tel','$qq')";
	if ($mysql->runSql($sql2) != TRUE) {
        echo "insert successful";
    }
    /*

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
    */

    /*
    $sql = "insert into activity_user_joiner";
    $sql .= "(activity_id, activity_time, user_id, joiner_id)";
    $sql .= "values('$activity_name', '$userid', '$activity_time', '$activity_population', '$activity_place', '$activity_describe', '$url')";
    //$sql .= "values('$image')";
    if ($mysql->runSql($sql) != TRUE) {
        echo "insert successful";
    }
    */


}

?>
