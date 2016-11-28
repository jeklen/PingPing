<?php
    //获取活动内容
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$show_id=$_GET['id'];}
	else{
		echo'<script type="text/javascript">location.href="../../../join.php"</script>';
	}
	$link=new SaeMysql();
	$sql="delete * from activity where id=$show_id";
?>