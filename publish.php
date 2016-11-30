<?php
require 'weixin.class.php';
ini_set('session.use_cookies', 0);
if($_GET['code']){
    $ret = wxmessage::getAuthToken($_GET['code']);
    if(isset($ret['openid'])){
        $openid = $ret['openid'];
    }
}
ob_start();
$sessionId = md5($openid);
header("content-type:text/html;charset=utf-8");
session_id($sessionId);
session_start();
//echo session_id() . "<br>";
//echo md5($openid);
?>
<!DOCTYPE html>
<html>
<head>
    <title>发布活动</title>
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta charset="utf-8">
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="css/publish.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	
</head>
<body>

<!--
tab1e1: activity
activity_name activity_time activity_population activity_place activity_describe
table2: user
id user_name tel qq activity_id_initiate activity_id_join
-->
<div class="dark-matter">
<form enctype="multipart/form-data"  method="post" name="changer" role="form" action="insertPublish.php"  accept-charset="utf-8" onsubmit="var the_result=check_form();return the_result;">
    <div  class="title" style="text-shadow: 5px 5px 5px #FF0000;" style="color:black"  style="front-size:50pt" > 活动信息 </div> 
	<div class="form-group">
        <label for="activity_name">活动名称</label>
        <input name = "activity_name" type="text" class="form-control" id="activity_name" placeholder="请输入活动名称">
    </div>
    <div class="form-group">
        <label for="activity_describe">活动描述</label>
        <textarea name="activity_describe" class="form-control" id="activity_describe" placeholder="请输入活动的大致描述，不超过200字" rows="9"></textarea>
    </div>
    <div class="form-group">
        <label for="activity_time">活动时间</label>
        <input name="activity_time" id="activity_time" type="datetime" class="form-control datetimepicker" >
    </div>
    <div class="form-group">
        <label for="activity_population">活动人数</label>
        <input name="activity_population" id="activity_population" type="number" class="form-control" placeholder="请输入阿拉伯数字">
    </div>
    <div class="form-group">
        <label for="activity_place">活动地点</label>
        <input type="text" class="form-control" id="activity_place" name="activity_place">
    </div>
	<div class="title" style="text-shadow: 5px 5px 5px #FF0000;" style="color:black" style="front-size:50pt" > 海报上传</div>
    <div class="form-group">
        <label for="inputpicture">上传图片</label>
        <input name = "image" accept="image/jpeg" type="file" id="inputpicture">
        <p class="help-block">请上传jpeg格式的图片</p>
    </div>
	<div class="title" style="text-shadow: 5px 5px 5px #FF0000;" style="color:black" style="front-size:50pt"  > 个人信息</div>
    <div class="form-group">
        <label for="user_name">姓名（必填）</label>
        <input type="text" class="form-control" id="user_name" name="user_name">
    </div>
    <div class="form-group">
        <label for="tel">手机（必填）</label>
        <input type="tel" class="form-control" id="tel" name="tel">
    </div>
	<div class="form-group">
        <label for="qq">QQ或微信（选填）</label>
        <input type="tel" class="form-control" id="qq" name="qq">
    </div>
    <button type="submit" class="btn btn-default">提交</button>
</form>
</div>

<script type="text/javascript" src="js/check.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Bootstrap Date-Picker Plugin not sure whether go with css-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<!-- datetimepicker-->
<link rel="stylesheet" type="text/css" href="./css/jquery.datetimepicker.min.css"/ >
<script src="./js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker();
    });
</script>

</body>
</html>
