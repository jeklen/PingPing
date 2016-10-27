<!DOCTYPE html>
<html>
<head>
	<title>php分页示例</title>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
</head>
<body>
<?php 
$conn = mysql_connect("localhost", "zhang", "zhang");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
//设置每页的记录数
$pagesize = 5;
mysql_select_db("blogtastic", $conn);
//取得记录总数$rs，计算总页数用
$rs = mysql_query("select count(*) from activity", $conn);
$myrow = mysql_fetch_array($rs);
$numrows = $myrow[0];
echo $numrows.'<br>';
//计算总页数
$pages = intval($numrows/$pagesize);
if ($numrows%$pagesize)
	$pages++;
//设置页数
if (isset($_GET['page'])) {
	$page = intval($_GET['page']);
}
else{
	$page = 1;
}
//计算偏移量
$offset = $pagesize*($page-1);
?>

<?php
//读取指定记录数
$rs = mysql_query("select * from categories order by id 
	desc limit $offset, $pagesize", $conn);
if ($myrow = mysql_fetch_array($rs)) {
	$i = 0;
	?>
	<table border="0" width="80%">
	<tr>
	<td>序号</td>
	<td>类别</td>
	</tr>
	<?php 
	do {
		$i++;
		//echo $myrow['id'].$myrow['cat'].'<br>';
		?>
	<tr>
	<td><?php $myrow['id'] ?></td>
	<td><?php $myrow['cat'] ?></td>
	</tr>
	<?php
	 } while ($myrow = mysql_fetch_array($rs));
	 echo "</table>"; 
	 }?>

</body>
</html>