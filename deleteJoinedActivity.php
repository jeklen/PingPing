<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		echo "<script>alert('请从微信端进入');history.back();</script>";
	}
	else{ 
		$user_id=$_SESSION['user_id'];
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
			$show_id=$_GET['id'];
		}
		else{
			echo'<script type="text/javascript">location.href="../../../join.php"</script>';
		}
		$link=new SaeMysql();
		$sql4="delete from activity_user_joiner where activity_id='$id' and joiner_id='$user_id'";
		$link->runSql($sql4);
		echo'<script type="text/javascript">location.href="../../../join.php"</script>';	
	}	
?>