<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>活动详情</title>
<!-- 简单的样式定义 -->
<style>
    .head1{
		background-color:Aliceblue;
		margin:0;
		padding:7px;
		font-family:"微软雅黑";color:brown;
		font-size:35px;
		text-align:center;
	}
	.head2{
		background-color:#FFA07A;
		margin:0;
		padding:7px;
		font-family:"微软雅黑";color:brown;
		font-size:35px;
		text-align:center;
	}
	.nav{
		float:left;
		height:1300px;
		background-color:lightgrey;
		font-size:20px;
		font-family:"sans-serif";color:brown;
		padding:5px;
	}
	.tag{
		font-size:20px;
		font-family:"微软雅黑";color:brown;
		padding:0;
		spacing:0;
	}
	
	.footer{
		float:bottom;
		text-align:center;
		font-family:"微软雅黑";color:white;
		font-size:10px;
		background-color:black;
		padding:0px;
		height:23px;
		clear:both;
	}
	.pad{
		background-color:#6495ED;
		font-family:"微软雅黑";color:white;
	
	}
	.namepad{
		width:6em;
		background-color:#9932CC;
		font-family:"楷体";color:white;
		
	}
	.contentpad{
		background-color:#00FFFF;
		font-family:"微软雅黑";color:white;
		font-size:1.2em;
		border-radius:15px;
		border:1px solid lightblue;
		box-shadow:10px 10px 10px #888888;
	}
	.commentpad{
		border: 2px solid #6495ED;
		background-color:Aliceblue;
		font-family："微软雅黑";color:black;
		font-size:1.2em;
	}
	textarea:focus,input:focus{
		background-color:#FAFAD2;
		border-left:2.5px solid #B0C4DE;
		border-top:1px solid #B0C4DE;
		border-right:0;
		border-bottom:0;
	}
</style>
</head>
<?php
    //获取活动内容
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$show_id=$_GET['id'];}
	else{
		echo'<script type="text/javascript">location.href="./index1.php"</script>';
	}
	$link=new SaeMysql();
	$sql="select * from activity where id=$show_id";
    $result=$link->getLine($sql);
	//获取评论数目
	$sql1="select * from comments where activity_id=$show_id";
	$result1=$link->getData($sql1);
	$count=count($result1);
	//计算留言页数
	$pagesize=5;
	$totalpage=ceil($count / $pagesize);
	if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalpage){
		$page=$_GET['page'];
	}
	else $page=1;
	$start=($page-1)*$pagesize;
?>	
	
	
<body>
<div class="head1">
<p>活动详情</p>
</div>
<div class="nav">
<p><a href="../分页界面.php?page=1">查看所有活动</a></p>
</div>
<!-- 显示活动详情 -->
<div>
<form action="show_action.php?" method="post" name="commentarea">
<table width=87% align=right cellpadding=0 cellspacing=0>
   <tr class="head2"><th align=left colspan="3"><?php echo "活动名称:" . $result['activity_name']; ?></th><th >&nbsp;</th></tr>
   <tr><td rowspan='8'><?php        
				echo "<IMG SRC='../multi/getImage.php?id=$show_id' width=350 height=400>";
			?></td>
   <td width="40%" class='tag'>&nbsp;</td><td width="10%">&nbsp;</td><td width="20%">&nbsp;</td></tr>
   <tr><td class='tag'><?php echo "活动时间：" . $result['activity_time']; ?></td></tr>
   <tr><td class='tag'><?php echo "活动地点：" . $result['activity_place']; ?></td></tr>
   <tr><td class='tag'><?php echo "活动人数：" . $result['activity_population']; ?></td></tr>
   <tr><td class='tag'><?php echo "活动联系人：" . "还不知道数据库里加这个没有我就没连"; ?></td></tr>
   <tr><td class='tag'><?php echo "联系人电话："; ?></td></tr>
   <tr><td class='tag'><?php echo "联系人QQ："; ?></td></tr>
   <tr><td >&nbsp;</td></tr>
   <tr><td colspan='4' class='tag'><p><?php echo "活动内容：" . $result['activity_describe'];?></p></td></tr>
   <tr><td >&nbsp;</td></tr>
   <tr><td >&nbsp;</td></tr>
   <tr><td >&nbsp;</td></tr>
   <tr><td >&nbsp;</td></tr>
   <!--留言板-->
   <tr><td align=center colspan='2' style="font-family:'楷体';color:crimson; font-size:35px;">留言板</td></tr>
   <?php
        //读取留言内容
	    
		for($i=0;$i<5;++$i){
               $flag=false;			
   ?>
  <tr><td>&nbsp;</td></tr>
  <tr >
  <?php if($count-i>0) {?>
  <td align=left class="namepad"><?php echo $result1[$i]['user_id'] . "号用户"; ?></td><td class="namepad"><?php echo "发布于" . $result1[$i]['time_of_comments']; ?></td>
  <?php $flag=true;} else { ?>
  <td>&nbsp;</td><td>&nbsp;</td>
  <?php } 
        if($i==1){ ?>
  <td align=left colspan="2" style="font-family:'楷体';color:crimson;font-size:20px;"><b>发布留言</b></td>
  <?php }?>
  </tr>  
  <tr>
   <td>&nbsp;</td> <td>&nbsp;</td>
  <?php if($i==1){ ?>
  <td align=right style="font-family:'楷体';color:crimson;font-size:20px;">留言人:</td><td><input class="commentpad" type="text" name="user_name"></td>
  <?php }?>
  </tr>
  <tr>
  <?php if($flag){ ?>
  <td class="contentpad" style="text-indent:2em;padding-left:3em"><b><?php echo $result1['content'] ?></b></td><td>&nbsp;</td>
  <?php } else { ?>
  <td>&nbsp;</td><td>&nbsp;</td>
  <?php }
        if($i==2){ ?>
  <td colspan="2" rowspan="18"><textarea style="text-indent:2.4em;" class="commentpad" name="content" cols="40" rows="15"></textarea></td>
  <?php }?>
  </tr>
  <tr><td>&nbsp;</td></tr>
  
  <?php };
   ?>
  <tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="提交"><input type="reset" value="取消">
  <input type="hidden"  name="id" value=<?php echo $show_id?>></td></tr>
  <tr><td>&nbsp;</td></tr>
  
  
  <!-- 留言页面跳转-->
  <tr><td colspan='2' align=center color=grey>
  <?php if($totalpage!=0) echo $page. "/" .$totalpage;
        else { ?>
  <font color="grey">暂时没有留言哦</font>
  <?php }?>
  &nbsp;&nbsp;
  <?php if($page==1 || $page > $totalpage) {?>
  <font color="grey">首页</font>
  <?php } else{ ?>
  <a href="show.php?id=<?php echo $show_id ?>&&page=1">首页</a>
  <?php } ?>
  &nbsp;
  <?php if($page==1 || $page > $totalpage){?>
  <font color="grey">上一页</font>
  <?php } else{ ?>
  <a href="show.php?id=<?php echo $show_id ?>&&page=<?php echo $page-1 ?>">上一页</a>
  <?php } ?>
  &nbsp;
  <?php if($page==$totalpage || $page > $totalpage) { ?>
  <font color="grey">下一页</font>
  <?php } else { ?>
  <a href="show.php?id=<?php echo $show_id ?>&&page=<?php echo $page+1 ?>">下一页</a>
  <?php } ?>
  &nbsp;
  <?php if($page==$totalpage || $page > $totalpage) { ?>
  <font color="grey">尾页</font>
  <?php } else { ?>
  <a href='show.php?id=<?php echo $show_id ?>&&page=<?php echo $totalpage ?>'>尾页</a>
  <?php } ?>
</form>
</table>
</div>

<div class="nav">&nbsp;</div>
<div class="footer">
<p>版权@大学生拼拼平台</p>
</div>
</body>
</html>