<?php 
  require 'weixin.class.php'; 
  $flag=0;  
  ob_start(); 
  header("content-type:text/html;charset=utf-8");  
  if($_GET['code']){ 
         $flag=1;
         $ret = wxmessage::getAuthToken($_GET['code']); 
         if(isset($ret['openid'])){ 
             $openid = $ret['openid']; 
         } 
     
   $sessionId = md5($openid);
   session_id($sessionId);
   session_start();
   $_SESSION['user_id']=$sessionId;   
  }
  else {
   session_start();
  }   
  $user_id=$_SESSION['user_id'];
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>大学生拼拼</title>
<link rel="stylesheet" type="text/css" href="./css2/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css2/bootstrap-responsive.css">
<style>
   div.span5.outlined{
	   border:1px dotted black;
   }
   .navbar,.navbar-inner{
	   height:10px;
   }
   
</style>
<script>
 $(function () { 
	$("#box").carousel();
});
</script>
</head>
<body>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="./js/bootstrap.js"></script>




<!--
     //获取活动数目
	$link=mysql_connect("localhost:3306","root");
	mysql_select_db("activity") or die(mysql_error());
	$sql1="select count(*) from table1";
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
	//获取活动内容
	$sql2="select * from table1 order by activity_id desc limit $start,$pagesize";
	$result2=mysql_query($sql2) or die(mysql_error());
	
-->
<?php
    if(!isset($user_id)){
		echo "<script>alert('请从微信端进入才能发布活动哦');</script>";
    }
    $link=new SaeMysql();
    $sql1="select * from activity";
	// $result1=$link->getLine($sql1);
	//$count=$result1[0];
    //$result = $runSql($sql1);
    $result = $link->getData($sql1);
    $count = 0;
	if($result){foreach($result as $data ){
		$count++;
	}}
	//计算活动页数
	$pagesize=5;
	$totalpage=ceil($count / $pagesize);
	if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalpage){
		$page=$_GET['page'];
	}
	else $page=1;
	$start=($page-1)*$pagesize;
	//获取活动内容
	$sql2="select * from activity order by id desc limit $start,$pagesize";
	$result2=$link->getData($sql2);
	
?>
    	
   <div class="container-fluid" style="background-image:url(./bgi.jpg);">
      <ul class="nav nav-tabs">
	     <!--判断哪个标签页显示-->
	     <?php if(!isset($_GET['location']) || $_GET['location']!=2){ ?>
	     <li class="active">
		 <?php } else{?>
		 <li>
		 <?php }?>
		
		 <a href="#tab1" data-toggle="tab"><i class="icon-home"></i>首页</a></li>
		 <!--判断哪个标签页显示-->
		 <?php if(isset($_GET['location']) && $_GET['location']==2){ ?>
	     <li class="active">
		 <?php } else{?>
		 <li>
		 <?php }?>
		 
		 <a href="#tab2" data-toggle="tab"><i class="icon-heart"></i>活动</a></li>
		 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>我的<span class="caret"></span></a>
		       <ul class="dropdown-menu">
			      <li><a href="./my_start_activity.php">我发布的</a></li>
				  <li><a href="./my_activity.php">我参与的</a></li>
			   </ul>
		 </li>
      </ul>
	<div class="tab-content">
	     <!--判断哪个标签页显示-->
	     <?php if(!isset($_GET['location']) || $_GET['location']!=2){ ?>
	    <div class="tab-pane active" id="tab1">
		 <?php } else{?>
		<div class="tab-pane" id="tab1">
		 <?php }?>
		    <div class="container">
			    <div class="row">
				    <div class="span12">
					     <h1><img src="pic/indexpicture.png" width="200" height="100"></h1>
						 <div id="box" class="carousel slide" data-ride="carousel" data-interval="3000">
						   <ol class="carousel-indicators">
						      <li class="active" data-target="#box" data-slide-to="0"></li>
							  <li data-target="#box" data-slide-to="1"></li>
							  <li data-target="#box" data-slide-to="2"></li>
						   </ol>
						   <div class="carousel-inner">
						      <div class="item">
							     <img src="./group/1/multi/sample1.jpg" alt="图片无法显示">
								 <div class="carousel-caption">
								      <h4>你好</h4>
									  <p>&nbsp;</p>
									  <p>这里是大学生拼拼平台</p>
									  <p>&nbsp;</p>
									  <p>&nbsp;</p>
								 </div>
							  </div>
							  <div class="item active">
							     <img src="./group/1/multi/sample2.jpg" alt="图片无法显示">
								 <div class="carousel-caption">
								      <h4>你好</h4>
									  <p>&nbsp;</p>
									  <p>这里是大学生拼拼平台</p>
									  <p>&nbsp;</p>
									  <p>&nbsp;</p>
								 </div>
							  </div>
							  <div class="item">
							     <img src="./group/1/multi/sample3.jpg" alt="图片无法显示">
								 <div class="carousel-caption">
								      <h4>你好</h4>
									  <p>&nbsp;</p>
									  <p>这里是大学生拼拼平台</p>
									  <p>&nbsp;</p>
									  <p>&nbsp;</p>
								 </div>
							  </div>
							</div>
							<a class="left carousel-control" href="#box" data-slide="prev">&lsaquo;</a>
							<a class="right carousel-control" href="#box" data-slide="next">&rsaquo;</a>
						</div>
						
						 <a href="#" class="btn btn-info btn-large"><i class="icon-th-large icon-white"></i>了解更多</a>
					</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div class="span12"><h2>热门活动</h2>
					     <div class="row">
						 <?php foreach($result2 as $one){ ?> 
						    <div class="span5 outlined"><p><img src=<?php echo $one['picdirectory'];?>></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></div>
						 <?php } ?>
						 </div>
					</div>
				</div>
			</div>
		</div>
		
		 <!--判断哪个标签页显示-->
	     <?php if(isset($_GET['location']) && $_GET['location']==2){ ?>
	    <div class="tab-pane active" id="tab2">
		 <?php } else{?>
		  <div class="tab-pane" id="tab2">
		 <?php }?>
		    <div class="container">
			    <div class="row">
				    <div class="span12">
					<div class="dropdown" style="text-align:right">
					<a href="#" class="btn btn-large btn-info" data-toggle="dropdown">所有活动<span class="caret"></span></a>
					<ul class="dropdown-menu pull-right">
					    <li><a href="#">类型一</a></li>
						<li><a href="#">类型二</a></li>
					</ul>
					</li>
					</div>
					</div>
				</div>
				<div>&nbsp;</div>
				<?php if($result2){foreach($result2 as $obj){ ?>
				<div class="row">
				    <div class="span2">
				    <IMG SRC=<?php $id=$obj['id'];
					            echo $obj['picdirectory'] ?> width=100% height=150%>
					</div>
					<div class="span10">
					<h4><?php echo $obj['activity_name'] ?></h4>
					<p></p>
					<p><span class="label label-info">活动简介</span></p>
					<p><?php echo $obj['activity_describe'] ?></p>
					<p style="text-align:right"><a class="btn btn-success" href="./show.php?id=<?php echo $id?>"><i class="icon-star icon-white"></i>了解详情</a></p>
					</div>
				</div>
				<?php } }?>
				<div class="pagination" style="text-align:center">
					<ul>
					   <li><a><?php if($totalpage!=0) echo $page. "/" .$totalpage;
                         else echo "暂无活动"; ?></a></li>
					   
				       <li><?php if($page==1 || $page > $totalpage) {?><a >首页</a>
					   <?php } else {?><a href="join.php?location=2&&page=1">首页</a><?php }?>
					   </li>
					   <li><?php if($page==1 || $page > $totalpage) {?><a >上一页</a>
					   <?php } else {?><a href="join.php?location=2&&page=<?php echo $page-1 ?>">上一页</a><?php }?>
					   </li>
					   <li><?php if($page==$totalpage || $page > $totalpage) { ?><a >下一页</a>
					   <?php } else {?><a href="join.php?location=2&&page=<?php echo $page+1 ?>">下一页</a><?php }?>
					   </li>
					   <li><?php if($page==$totalpage || $page > $totalpage) { ?><a >尾页</a>
					   <?php } else {?><a href="join.php?location=2&&page=<?php echo $totalpage ?>">尾页</a><?php }?>
					   </li>
				</div>
			</div>
		</div>
	</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div class="navbar" style="background-image:url(./group/1/multi/bgi.jpg);">
	  <div class="navbar-inner">
	      <p style="text-align:center">版权@大学生拼拼平台</p>
	  </div>
	</div>
</html