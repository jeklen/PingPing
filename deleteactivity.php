<?php
    //获取活动内容
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$show_id=$_GET['id'];}
	else{
		return false;
	}
	$link=new SaeMysql();
	$sql3="delete * from activity where id=$show_id";
	$link->runSql($sql3);
?>