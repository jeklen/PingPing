<?php
/**
 * Date: 2016/11/25
 * Time: 15:56
 */

/*
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
session_id($sessionId);
session_start();
$mysql = new SaeMysql();
$mysql->setCharset("utf8");
$query = "SELECT * FROM user WHERE id = '$sessionId'";
$result = $mysql->runSql($query);

$row = $result->fetch_assoc();
if ($row['dianzan'] == 0) {
    if ($result->num_rows == 1) {
        $sql = "update user set dianzan = 1 where id = '$sessionId'";
    }else {
        $sql = "insert into user (id, dianzan)";
        $sql .= "values('$sessionId', 1)";
    }
    $mysql->runSql($sql);
    header("location: diangezan.php");
    die;
}
 */
header("content-type:text/html;charset=utf-8");
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
    <link href="css/dianzan/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/dianzan.css" rel="stylesheet">
	<!--First Page CSS-->
	<link rel="stylesheet" href="css/dianzanpage1_1.css" type="text/css" />
	<link rel="stylesheet" href="css/dianzanpage1_2.css" type="text/css" />
	<link rel="stylesheet" href="fonts/iconfont.css" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



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
            <div class="box">
				<h1><img src="pic/indexpicture.png" width="300" height="150"></h1>
				<div class="content">
					<p>如果觉得我们做的不错的话，就给我们点个赞吧~</p>
				</div>
			</div>
			<div class="opera">
				<span id="btn">
					<i class="iconfont"></i> 点击
				</span>
			</div>
			<script src="js/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript">
			(function ($) {
				$.extend({
					tipsBox: function (options) {
						options = $.extend({
							obj: null, 
							str: "+1", 
							startSize: "12px", 
							endSize: "30px", 
							interval: 600, 
							color: "red", 
							callback: function () { } 
						}, options);
						$("body").append("<span class='num'>" + options.str + "</span>");
						var box = $(".num");
						var left = options.obj.offset().left + options.obj.width() / 2;
						var top = options.obj.offset().top - options.obj.height();
						box.css({
							"position": "absolute",
							"left": left + "px",
							"top": top + "px",
							"z-index": 9999,
							"font-size": options.startSize,
							"line-height": options.endSize,
							"color": options.color
						});
						box.animate({
							"font-size": options.endSize,
							"opacity": "0",
							"top": top - parseInt(options.endSize) + "px"
						}, options.interval, function () {
							box.remove();
							options.callback();
						});
					}
				});
			})(jQuery);
			function niceIn(prop){
				prop.find('i').addClass('niceIn');
				setTimeout(function(){
					prop.find('i').removeClass('niceIn');  
				},1000);    
			}
			$(function () {
				$("#btn").click(function () {
					$.tipsBox({
						obj: $(this),
						str: "+1",
						callback: function () {
						}
					});
					niceIn($(this));
				});
			});
			</script>
        </div>
    </div>
    <div class="row" id="showus">
        <div class="col-md-6 col-sm-12 ">
            <h1>我们</h1>
            <h2>我们是社会主义好青年</h2>
        </div>
    </div>
    <div class="row" id="contactgit">
        <div class="col-md-6 col-sm-12">
            <h1>联系我们</h1>
            <h2>我们的github<a href="https://github.com/ZhangQiaolun/PingPing"> 链接</a></h2>
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

<script>
    $(document).ready(function(e) {
        $('.row').hide();
        $('#zanshu').show();
        //do jQuery stuff when DOM is ready
    });
</script>


</body>

</html>
