<?php
session_start();
if($_POST['name']&&$_POST['pass'])
{
 $name=$_POST['name'];
 $pass=$_POST['pass'];
}
else 
{exit;}
include_once('mysql_connect.php');
$sql='select username,userpass from userdata where username="$name"';
$r=mysql_query($sql);
if(mysql_num_rows==0)
 {
  echo 'Not in';
  exit;
 }
else
{ 
 $row=mysql_fetch_assoc($r);
 if($pass!=$row['userpass'])
 {
  echo 'error password';
  exit;
 }
 esle 
 {
  $_SESSION['user']=$name; 
 }
}
?>
