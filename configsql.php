<?php
header("Content-Type:text/html;charset=UTF-8");
header("Content-Type:text/html;charset=utf-8");
echo "用户名:".SAE_MYSQL_USER."<br>";
echo "密码:". SAE_MYSQL_PASS.'<br>';
echo "主库域名:".SAE_MYSQL_HOST_M."<br>";
echo "从库域名:".SAE_MYSQL_HOST_S."<br>";
echo "端口".SAE_MYSQL_PORT."<br>";
echo "数据库名:".SAE_MYSQL_DB."<br>";
?>

<?php
$hostname = SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
$dbuser = SAE_MYSQL_USER;
$dbpass = SAE_MYSQL_PASS;
$dbname = SAE_MYSQL_DB;
$link = mysql_connect($hostname, $dbuser, $dbpass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br/>';
//select db
mysql_select_db($dbname, $link) or die ('Can\'t use dbname : ' . mysql_error());
echo 'Select db '.$dbname.' successfully';
mysql_close($link);
?>