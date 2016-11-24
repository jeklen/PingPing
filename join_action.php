<?php
    //身份认证
    session_start();
	if(!isset($_SESSION['user_id'])){
		echo "<script>alert('请从微信端进入');history.back();</script>";
	}
	else{ $user_id=$_SESSION['user_id'];
	$id=$_GET['id'];
	$link=new SaeMysql();
	$check_sql="select * from activity_user_joiner where activity_id='$id' and joiner_id='$user_id'";
	$check=$link->getData($check_sql);
	if($check){
		echo "<script>alert('您已参加，请勿重复报名！');history.back();</script>";
	}
	else{
	    $sql="insert into activity_user_joiner (activity_id,joiner_id) values('$id','$user_id')";
		$link->runSql($sql);
		if($link->errno()==0){
		echo "<script>alert('报名成功');history.back();</script>";
	    }
        else die("error" . $link->errmsg());
    }}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">