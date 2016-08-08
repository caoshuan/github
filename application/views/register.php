<<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="/blackman/css/login.css">
	<link rel="stylesheet" type="text/css" href="/blackman/css/mobile.css" media="screen and (max-width : 568px)">
	<script type="text/javascript" src="/blackman/js/mobile.js"></script>
</head>
<body >
	<!--font color="blue"><h1 align="center">登录界面</h1></font><br-->
	
 <div id="header">
		<a href="/" class="logo">
			<img src="/blackman/images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li>
				<a href="/">home</a>
			</li>
			
			<li>
				<a href="/register">register</a>
			</li>
			
			<li class="selected">
				<a href="/login">login</a>
			</li>
		</ul>
	</div>
	<div id="body">
		<h1><span>come for register a new account</span></h1>
        </div>
        <div id="body">
		<form method="post" action="/registerverification/m">
			<input type="text" name="name" id="name" value="name<?php echo $_GET["nameErr"];?>">
			<input type="text" name="email" id="email" value="email<?php echo $_GET["emailErr"];?>">
                        <input type="text" name="password" id="password" value="password">
                        <input type="text" name="confirm" id="confirm" value="comfirm<?php echo $_GET["confirmerr"];?>">
                        
                        <input type="submit" name="send" id="send" value="register">       
                </form>
	</div> 
	<div id="footer">
		<div>
			<p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
			
		</div>
	</div>
</body>
</html>
