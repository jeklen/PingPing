<?php
    //身份认证
    session_start();
	if(!isset($_SESSION['user_id'])){
		echo "<script>alert('请从微信端进入');history.back();</script>";
	}
	else{ $user_id=strlen($_SESSION['user_id']);
	$comment=$_POST['content'];
	$id=$_POST['id'];
	$link=new SaeMysql();
	$sql="insert into comments (activity_id,user_id,time_of_comments,content) values('$id','$user_id',current_timestamp(),'$comment')";
	$link->runSql($sql);
	if($link->errno()==0){
		echo "<script>alert('评论成功');history.back();</script>";
	}
    else die("error" . $link->errmsg());
	}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">