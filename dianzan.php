<?php
/**
 * Date: 2016/11/25
 * Time: 15:56
 */
require 'weixin.class.php';
ini_set('session.use_cookies', 0);
if($_GET['code']){
    $ret = wxmessage::getAuthToken($_GET['code']);
    if(isset($ret['openid'])){
        $openid = $ret['openid'];
    }
}
ob_start();
$sessionId = md5($openid);
header("content-type:text/html;charset=utf-8");
session_id($sessionId);
session_start();
$mysql = new SaeMysql();
$mysql->setCharset("utf8");
$query = "SELECT * FROM user WHERE id = '$sessionId' AND dianzan = 1";
$result = $mysql->runSql($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["id"];
    }
}
if (!$mysql->affectedRows()) {
    header("Location: diangezan.php");die;
}
?>
<!DOCTYPE html>
<html class="full" lang="en" xmlns="http://www.w3.org/1999/html">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>赞一下我们</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        $(document).ready(function(e) {
            e.preventDefault(); // stops link form loading
            $('.row').hide();
            $('#zanshu').show();
            //do jQuery stuff when DOM is ready
        });
    </script>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">拼拼团队</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="bottom-menu nav navbar-nav">
                <li>
                    <a href="#zanshu" class="link">点个赞</a>
                </li>
                <li>
                    <a href="#showus" class="link">我们</a>
                </li>
                <li>
                    <a href="#contactgit" class="link">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row" id="zanshu">
        <div class="col-md-6 col-sm-12">
            <h1>The First Page</h1>
            <?php echo "hello world"; ?>
            <p>The first page</p>
        </div>
    </div>
    <div class="row" id="showus">
        <div class="col-md-6 col-sm-12 ">
            <h1>The Second Page</h1>
            <?php echo "hello world"; ?>
            <p>The second page</p>
        </div>
    </div>
    <div class="row" id="contactgit">
        <div class="col-md-6 col-sm-12">
            <h1>The Third Page</h1>
            <?php echo "the second page"; ?>
            <p>The third page</p>
        </div>
    </div>

    <!-- /.row -->
</div>

<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script>
    $(".bottom-menu a").on('click',function(e) {
        e.preventDefault(); // stops link form loading
        $('.row').hide(); // hides all content divs
        $($(this).attr('href') ).show(); //get the href and use it find which div to show
    });
</script>



</body>

</html>