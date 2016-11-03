<?php
require 'weixin.class.php';
if($_GET['code']){
    $ret = wxmessage::getAuthToken($_GET['code']);
    if(isset($ret['openid'])){
        $openid = $ret['openid'];
    }
}
echo $openid;
/*
$openid = 0;

echo $_GET['code']."<br>";
$token = wxmessage::getAuthToken($_GET['code']);
$openid = $token['openid'];
echo $openid;
*/

?>
<html>
<body>

<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>
