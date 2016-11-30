<?php
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$show_id=$_GET['id'];}
	else{
		echo'<script type="text/javascript">location.href="../../../join.php"</script>';
	}
<<<<<<< HEAD
	$link=new SaeMysql();
	$sql4="delete from activity_user_joiner where id=$show_id";
	$link->runSql($sql4);
	echo'<script type="text/javascript">location.href="../../../join.php"</script>';	
=======
<<<<<<< HEAD
	else{ $user_id=$_SESSION['user_id'];
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$show_id=$_GET['id'];}
	else{
		echo'<script type="text/javascript">location.href="../../../join.php"</script>';
	}
	$link=new SaeMysql();
	$sql4="delete from activity_user_joiner where where activity_id=$show_id and joiner_id='$user_id'";
	$link->runSql($sql4);
	echo'<script type="text/javascript">location.href="../../../join.php"</script>';		

>>>>>>> 61e0c55f35c785d014fd4b36ae9e3d75dd807598
?>