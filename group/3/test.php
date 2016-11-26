<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2016/11/25
 * Time: 21:09
 */
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

</head>

<body>

<div class="navbar-collapse collapse">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="#menu1">menu 1</a></li>
            <li><a href="#menu2">menu 2</a></li>
            <li><a href="#menu3">menu 3</a></li>
        </ul>
</div>

<div class="container">
    <!-- my rough idea is like this-->
    <div class="content" id="menu1"> content from menu 1</div>
    <div class="content" id="menu2"> Content from menu 2</div>
    <div class="content" id="menu3"> Content from menu 2</div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script>
    $(".dropdown-menu a").on('click',function(e) {
        e.preventDefault(); // stops link form loading
        $('.content').hide(); // hides all content divs
        $('#' + $(this).attr('href') ).show(); //get the href and use it find which div to show
    });
</script>

</body>

</html>
