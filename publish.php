<?php
require 'weixin.class.php';
echo $openid;
if($_GET['code']){
    $ret = wxmessage::getAuthToken($_GET['code']);
    if(isset($ret['openid'])){
        $openid = $ret['openid'];
    }
}
echo $openid;
?>
<!DOCTYPE html>
<html>
<head>
    <title>发布活动</title>
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<form action="save.php" method="post" role="form">
    <div class="form-group">
        <label for="activity_name">活动名称</label>
        <input type="text" class="form-control" id="activity_name" placeholder="请输入活动名称">
    </div>
    <div class="form-group">
        <label for="activity_describe">活动描述</label>
        <textarea class="form-control" id="activity_describe" rows="9"></textarea>
    </div>
    <div class="form-group">
        <label for="inputpicture">上传图片</label>
        <input type="file" id="inputpicture">
        <p class="help-block">请上传jpeg格式的图片</p>
    </div>
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
