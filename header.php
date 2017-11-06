<?php
	require('protect.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	
<?php

    function __autoload($className)  
    {  
        include_once 'includes/class.' . $className . '.php';  
    }  
		
	$db = new db("mysql:host=localhost;dbname=", "", "");
	
	$zOutput = new zOutputHandler;
?>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Ztree Helper</title>
	<meta name="description" content="A simple PHP application to help generate ztree code">
	<meta name="author" content="Ye Joo Park">
	
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Google Analytics
	================================================== -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-43739447-6', 'jessenhobson.com');
	ga('send', 'pageview');
	</script>
	
	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="css/presets.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/style.css">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	
	<!-- Typekit
	================================================== -->
	<script type="text/javascript" src="//use.typekit.net/euy2mbg.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body>

	<!-- Topbar: fixed + datascroll
	================================================== -->
	<div id="topbar" data-scrollspy="scrollspy" >
		<div id="topbar-inner">
			<div class="container">
				<div class="sixteen columns">
					<ul class="nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="generate.php">Generate Sets</a></li>
						<li><a href="viewzCode.php">Manager</a></li>
						<li><a href="viewzAudit.php">Auditor</a></li>
						<li><a href="check.php">Error Check</a></li>
					</ul>
				</div><!-- // .sixteen -->
			</div><!-- // .container -->
			<div class="clear"></div>
		</div><!-- // #topbar-inner -->
	</div><!-- // #topbar -->
	

	<!-- Header
	================================================== -->
	<div id="section-header">
		<div class="container">
			<div class="sixteen columns">
				<h1><a href="index.php" title="Home">Ztree Code Generator</a></h1>
			</div><!-- // .eight -->
			
		</div><!-- // .container -->
	</div><!-- // #section-header -->