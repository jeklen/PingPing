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
$mysql = new SaeMysql();
//查询单条数据
$sql = "select * from activity limit 1";
$result = $mysql->getLine($sql);
var_dump($result);
//发现这个已经是按数组的方式返回的
echo "<hr>";
//查询多条数据
$sql = "select * from activity";
$mut_data = $mysql->getData($sql);
//var_dump($mut_data);
//发现这个就是按二维数组输出的了，下面一个foreach输出
echo "<hr>";
foreach ($mut_data as $small) {
	echo "活动".$small["activity_name"].'<br>';
	echo "描述".$small["activity_describe"].'<br>';
}
?>