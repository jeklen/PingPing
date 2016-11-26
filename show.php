<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>活动详情</title>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="greenpad.css">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="./js/bootstrap.js"></script>
<style>
   .pad{
	   background-color:#F0F8FF;
	   border-radius:30px;
   }
   .pad2{
	   background-color:#F5F5DC;
	   border-radius:20px;
	   color:#20B2AA;
   }
   h2,h4 {
	   font-family:"微软雅黑";
   }
   blockquote{
	   font-size:1.3em;
	   line-height:2em;
   }
   comment_head{
	   font-size:3em;
	   font-weight;2em;
   }
   h4.small{
	   font-size:1em;
	   font-weight:1.1em;
   }
</style>
   
   
<script>

</script>
<!--  写代码测试用的
    //获取活动内容
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$show_id=$_GET['id'];}
	else{
		echo'<script type="text/javascript">location.href="../123.php"</script>';
	}
	$link=mysql_connect("localhost:3306","root") or die(mysql_error());
	mysql_select_db("activity") or die(mysql_error());
	$sql="select * from table1 where activity_id=$show_id";
    $result=mysql_query($sql);
    $row=mysql_fetch_object($result);
	mysql_close($link);
	//获取评论数目
	$link=mysql_connect("localhost:3306","root") or die(mysql_error());
	mysql_select_db("activity") or die(mysql_error());
	$sql1="select count(*) from comment where activity_id=$show_id";
	$result1=mysql_query($sql1) or die(mysql_error());
	$row1=mysql_fetch_array($result1);
	$count=$row1[0];
	//计算留言页数
	$pagesize=5;
	$totalpage=ceil($count / $pagesize);
	if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalpage){
		$page=$_GET['page'];
	}
	else $page=1;
	$start=($page-1)*$pagesize;
	//读取留言内容
	$link=mysql_connect("localhost:3306","root") or die(mysql_error());
	mysql_select_db("activity") or die(mysql_error());
	$sql2="select * from comment where activity_id=$show_id order by time desc limit $start,$pagesize";
	$result2=mysql_query($sql2) or die(mysql_error());
-->

<?php
    //获取活动内容
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$show_id=$_GET['id'];}
	else{
		echo'<script type="text/javascript">location.href="../../../join.php"</script>';
	}
	$link=new SaeMysql();
	$sql="select * from activity where id=$show_id";
    $result=$link->getLine($sql);
	//获取评论数目
	$sql1="select * from comments where activity_id=$show_id";
	$result1=$link->getData($sql1);
	$count = 0;
	if($result1){foreach($result1 as $data ){
		$count++;
	}}
	//获取用户信息
	$sql2="select * from user where activity_id_initiate=$show_id";
	$result2=$link->getLine($sql2);
	//计算留言页数
	$pagesize=5;
	$totalpage=ceil($count / $pagesize);
	if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalpage){
		$page=$_GET['page'];
	}
	else $page=1;
	$start=($page-1)*$pagesize;
	//获取评论内容
	$sql1="select * from comments where activity_id=$show_id order by time_of_comments desc limit $start,$pagesize";
	$result1=$link->getData($sql1);
?>		
<body>
   <div class="container-fluid" style="background-image:url(./bgi.jpg)">
      <ul class="nav nav-tabs">
	     <li><a href="./join.php"><i class="icon-home"></i>首页</a></li>
		 <li><a href="./join.php?location=2"><i class="icon-heart"></i>活动</a></li>
         <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>我的<span class="caret"></span></a>
		       <ul class="dropdown-menu">
			      <li><a href="./my_start_activity.php">我发布的</a></li>
				  <li><a href="./my_activity.php">我参与的</a></li>
			   </ul>
		 </li>
      </ul>
	  <div>&nbsp;</div>
	  <div>&nbsp;</div>
	  <div class="container">
	     <div class="row">
		   <div class="span8 pad">
		   <p><span class="label label-info">活动详情</span><h2 style="text-align:center"><i class="icon-flag"></i><?php echo $result['activity_name'];?></h2></p>
		   <p>&nbsp;</p>
		   <p style="text-align:center"><IMG SRC=<?php  echo $result['picdirectory'] ?> width=50% height=50%></p>
		   <p>&nbsp;</p>
		   <blockquote style="font-family:'宋体'"><?php echo $result['activity_describe'];?></blockquote>
		   </div>
		   <div class="span4 width5 pad">
		   <p><span class="label label-success label-big pull-right" style="text-align:right">快来拼拼吧~</span></p>
		   <p><h3 style="text-align:center;"><i class="icon-tag icon-white"></i>活动具体</h3></p>
		   <p style="text-indent:2em;"><?php echo "活动时间：" . $result['activity_time']; ?></p>
		   <p style="text-indent:2em;"><?php echo "活动地点：" . $result['activity_place']; ?></p>
           <p style="text-indent:2em;"><?php echo "活动人数：" . $result['activity_population'] ?></p>
           <p style="text-indent:2em;"><?php echo "活动联系人：" . $result2['user_name'] ?></p>
           <p style="text-indent:2em;"><?php echo "联系人电话：" .$result2['tel'] ?></p>
           <p style="text-indent:2em;"><?php echo "联系人QQ：" .$result2['qq'] ?></p>
		   <p>&nbsp;</p>
		   <p style="text-align:center;"><a class="btn btn-large btn-warning" href="./join_action.php?id=<?php echo $show_id ?>">我要加入</a></p>
		   </div>
		 </div>
		 <div>&nbsp;</div>
	     <div>&nbsp;</div>
		 <div style="text-align:right"><a href="#mymodal" class="btn" data-toggle="modal" >发表评论</a></div>
		 <div id="mymodal" class="elegant-aero modal hide fade">
		 <form action="../../../insertComment.php" method="post" name="comment">
		          <h1>评论<i class="icon-edit"></i><h1>
				  <p>&nbsp;</p>
				  <p style="text-align:center"><textarea rows="15" cols="50" placeholder="请在这里写下评论~" name="content"></textarea></p>
				  <input type='hidden' name="id" value=<?php echo $show_id ?> />
				  <p style="text-align:right"><input type="submit" class="button" name="comment" value="提交" /></p>
		 </form>
		 </div>
		 <div id="comment"><h2>评论区<i class="icon-edit"></i></h2></div>
		 <div class="row">
		   <div class="span12 pad2">
		   <?php if($result1) {foreach($result1 as $row){?>
		   <div class="row">
		   <div class="span2">
				      <a href="#" class="thumbnail"><img src="userimg.jpg" width=50% height=50%></a>
		   </div>
		   <div class="span10" style="border-bottom:0.1em solid lightgrey;">
		   <p><h4><?php echo $row['user_id']. "号用户" ; ?></h4><h4 class="small" style="text-align:right;"><?php echo "发布于" . $row{'time_of_comments'}; ?></h4></p>
		   <p style="text-indent:2em;font-size:1.2em;"><?php echo $row['content'] ?></p>
		   <p style="text-align:right;"><a href="#" class="btn btn-info">回复</a></p>
		   </div>
		   </div>
		   <?php } }?>
		   </div>
		 </div>
		 <div class="pagination" style="text-align:center">
					<ul>
					   <li><a><?php if($totalpage!=0) echo $page. "/" .$totalpage;
                         else echo "暂无评论"; ?></a></li>
					   
				       <li><?php if($page==1 || $page > $totalpage) {?><a >首页</a>
					   <?php } else {?><a href="show_2.php?id=<?php echo $show_id ?>&&page=1#comment">首页</a><?php }?>
					   </li>
					   <li><?php if($page==1 || $page > $totalpage) {?><a >上一页</a>
					   <?php } else {?><a href="show_2.php?id=<?php echo $show_id ?>&&page=<?php echo $page-1 ?>#comment">上一页</a><?php }?>
					   </li>
					   <li><?php if($page==$totalpage || $page > $totalpage) { ?><a >下一页</a>
					   <?php } else {?><a href="show_2.php?id=<?php echo $show_id ?>&&page=<?php echo $page+1 ?>#comment">下一页</a><?php }?>
					   </li>
					   <li><?php if($page==$totalpage || $page > $totalpage) { ?><a >尾页</a>
					   <?php } else {?><a href="show_2.php?id=<?php echo $show_id ?>&&page=<?php echo $totalpage ?>#comment">尾页</a><?php }?>
					   </li>
				</div>
	  </div>
   </div>