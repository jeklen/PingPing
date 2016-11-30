<?php
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$user_id=$_GET['id'];}
	else{
		echo'<script type="text/javascript">location.href="../../../join.php"</script>';
	}
	$link=new SaeMysql();
	$sql4="delete from activity_user_joiner where joiner_id='$user_id'";
	$link->runSql($sql4);
	echo'<script type="text/javascript">location.href="../../../join.php"</script>';	
?>