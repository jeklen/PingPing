<?php
   $activity_id=$_POST['id'];
   $user_name=$_POST['user_name'];
   $content=$_POST['content'];
   $link=mysql_connect("localhost:3306","root") or die(mysql_error());
   mysql_select_db("activity");
   $sql="insert into comment values(null,'$activity_id','$user_name',default,'$content')";
   $result=mysql_query($sql) or die(mysql_error());
   mysql_close($link);
   if($result){
	   echo "<script type='text/javascript'>alert('留言发表成功！');location.href='show.php?id=$activity_id'</script>";
   }
   else echo "发生了错误";

?>