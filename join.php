<?php
header("Content-Type: text/html;charset=utf-8"); 
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
//mysql_query("set character set 'utf8'");//读库
//mysql_query("set names 'utf8'");//写库
//使用sae的库函数设置编码
$mysql->setCharset("UTF8");

$num_rec_per_page = 1;  //每页显示数量
if (isset($_GET["page"])) {$page = $_GET["page"];} else {$page=1;}
$start_from = ($page - 1) * $num_rec_per_page;

$sqlOne = "SELECT activity.*, user.user_name
	FROM activity, user
	WHERE activity.id = activity_id_initiate
	ORDER BY activity_time DESC 
	LIMIT 1;";
$result = $mysql->getLine($sqlOne);
echo $result['activity_describe'].'<br>';
echo $result['user_name'].'<br>';
echo $result['picture'].'<br>';
?>

<?php
//查询单条数据
//$sql = "select * from activity limit 1";
//$result = $mysql->getLine($sql);
//var_dump($result);
//发现这个已经是按数组的方式返回的
//echo "<hr>";
//查询多条数据
$sql = "select * from activity";
$mut_data = $mysql->getData($sql);
//var_dump($mut_data);
//发现这个就是按二维数组输出的了，下面一个foreach输出
echo "<hr>";
foreach ($mut_data as $small) {
	echo "活动".$small["activity_name"].'<br>';
	echo "描述".$small["activity_place"].'<br>';
}
?>