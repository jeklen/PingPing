<?php
require 'weixin.class.php';
$openid = 0;

echo $_GET['code']."<br>";
$token = wxmessage::getAuthToken($_GET['code']);
$openid = $token['openid'];
echo $openid;
?>

<?php 
header("Content-Type:text/html;charset=utf-8");
require("configsql.php");
 ?>