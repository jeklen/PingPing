<?php
require 'weixin.class.php';
ini_set('session.use_cookies', 0);
if($_GET['code']){
    $ret = wxmessage::getAuthToken($_GET['code']);
    if(isset($ret['openid'])){
        $openid = $ret['openid'];
    }
}
//$sessionId = md5($openid);
//session_id($sessionId);
session_start();
echo session_id() . "<br>";
echo md5($openid);
?>
<!DOCTYPE html>
<html>
<head>
    <title>发布活动</title>
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta charset="utf-8">
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<!--
tab1e1: activity
activity_name activity_time activity_population activity_place activity_describe
table2: user
id user_name tel qq activity_id_initiate activity_id_join
-->
<form enctype="multipart/form-data" action="insertPublish.php" method="post" name="changer" role="form">
    <div class="form-group">
        <label for="activity_name">活动名称</label>
        <input name = "activity_name" type="text" class="form-control" id="activity_name" placeholder="请输入活动名称">
    </div>
    <div class="form-group">
        <label for="activity_describe">活动描述</label>
        <textarea name="activity_describe" class="form-control" id="activity_describe" rows="9"></textarea>
    </div>
    <div class="form-group">
        <label for="inputpicture">上传图片</label>
        <input name = "image" accept="image/jpeg" type="file" id="inputpicture">
        <p class="help-block">请上传jpeg格式的图片</p>
    </div>
    <button type="submit" class=""btn btn-default>提交</button>
</form>


<!--
<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>
-->

<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
