<?php
    $show_id=$_GET['id'];
	$link=mysql_connect("localhost:3306","root") or die(mysql_error());
	mysql_select_db("activity") or die(mysql_error());
	$sql="select * from table1 where activity_id=$show_id";
    $result=mysql_query($sql);
    $row=mysql_fetch_object($result);
	Header( "Content-type: image/jpg");
    echo $row->picture;
	 ?>