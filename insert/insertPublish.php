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

    $name= 'asitela-'.time().'.jpg';
    $form_data =$_FILES['image']['tmp_name'];
    $s2 = new SaeStorage();
    $img = new SaeImage();
    if ($form_data) {
        $img_data = file_get_contents($form_data);//获取本地上传的图片数据
        $img->setData($img_data);
        $img->resize(720, 720); //图片缩放为180*180
        $img->improve();//提高图片质量的函数
        $new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
        $s2->write('images', $name, $new_data);//将public修改为自己的storage 名称
        $url = $s2->getUrl('images', $name);//将public修改为自己的storage 名称echo "文件名：".$name."<br/>";


        $sql = "insert into activity";
        $sql .= "(activity_name, user_id, activity_time, activity_population, activity_place, activity_describe, picdirectory)";
        $sql .= "values('$activity_name', '$userid', '$activity_time', '$activity_population', '$activity_place', '$activity_describe', '$url')";
        //$sql .= "values('$image')";
        if ($mysql->runSql($sql) != TRUE) {
            echo "insert successful";
        }
    } else{
        $sql = "insert into activity";
        $sql .= "(activity_name, user_id, activity_time, activity_population, activity_place, activity_describe)";
        $sql .= "values('$activity_name', '$userid', '$activity_time', '$activity_population', '$activity_place', '$activity_describe')";
        //$sql .= "values('$image')";
        if ($mysql->runSql($sql) != TRUE) {
            echo "insert successful";
        }
    }
}

?>
