<?php
    //身份认证
    session_start();
	if(!isset($_SESSION['user_id'])){
		echo "<script>alert('请从微信端进入');history.back();</script>";
	}
	else $user_id=$_SESSION['user_id'];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>活动详情</title>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="greenpad.css">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="./js/bootstrap.js"></script>
</head>
<?php
	//读取参与的活动
	$link=new SaeMysql();
	$sql="select * from activity where user_id='$user_id'";
	$sql3="delete * from activity where id=$show_id";
	$result=$link->getData($sql);
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
?>
<body>
   <div class="container-fluid" style="background-image:url(./bgi.jpg)">
      <ul class="nav nav-tabs">
	     <li><a href="./join.php"><i class="icon-home"></i>首页</a></li>
		 <li><a href="./join.php?location=2"><i class="icon-heart"></i>活动</a></li>
         <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>我的<span class="caret"></span></a>
		       <ul class="dropdown-menu">
			      <li><a href="my_start_activity.php">我发布的</a></li>
				  <li><a href="my_activity.php">我参与的</a></li>
			   </ul>
		 </li>
      </ul>
	  <div>&nbsp;</div>
	  <div>&nbsp;</div>
	  <div class="container">
			    <div class="row">
				    <div class="span12">
					<div class="dropdown" style="text-align:right">
					<a href="#" class="btn btn btn-success" data-toggle="dropdown">我的活动<span class="caret"></span></a>
					<ul class="dropdown-menu pull-right">
					    <li><a href="#">类型一</a></li>
						<li><a href="#">类型二</a></li>
					</ul>
					</li>
					</div>
					</div>
				</div>
				<div>&nbsp;</div>
				<?php if($result){foreach($result as $obj){ 
				        $id=$obj['id'];
						?>
				<div class="row">
				    <div class="span2">
					<IMG SRC=<?php
					            echo $obj['picdirectory'] ?> width=100% height=110%>
					</div>
					<div class="span10">
					<h4><?php echo $obj['activity_name'] ?></h4>
					<p></p>
					<p><span class="label label-info">活动简介</span></p>
					<p><?php echo $obj['activity_describe'] ?></p>
					<p style="text-align:right"><a class="btn btn-danger" href="./show.php?id=<?php echo $id?>"><i class="icon-star icon-white"></i>查看</a></p>
					<p style="text-align:right"><a class="btn btn-danger" href="./deleteactivity.php?id=<?php echo $id?>"><i class="icon-star icon-white"></i>删除活动</a></p>
					</div>
				</div>
				<?php } }?>
				<div class="pagination" style="text-align:center">
					<ul>
					   <li><a><?php if($totalpage!=0) echo $page. "/" .$totalpage;
                         else echo "暂无活动"; ?></a></li>
					   
				       <li><?php if($page==1 || $page > $totalpage) {?><a >首页</a>
					   <?php } else {?><a href="my_start_activity.php?page=1">首页</a><?php }?>
					   </li>
					   <li><?php if($page==1 || $page > $totalpage) {?><a >上一页</a>
					   <?php } else {?><a href="my_start_activity.php?page=<?php echo $page-1 ?>">上一页</a><?php }?>
					   </li>
					   <li><?php if($page==$totalpage || $page > $totalpage) { ?><a >下一页</a>
					   <?php } else {?><a href="my_start_activity.php?page=<?php echo $page+1 ?>">下一页</a><?php }?>
					   </li>
					   <li><?php if($page==$totalpage || $page > $totalpage) { ?><a >尾页</a>
					   <?php } else {?><a href="my_start_activity.php?page=<?php echo $totalpage ?>">尾页</a><?php }?>
					   </li>
				</div>
			</div>
	</div>
</body>
