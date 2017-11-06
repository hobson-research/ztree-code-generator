<?php
	// sha1() encrypted password
	$password = '';
	
	session_start();
	
	if( !isset( $_SESSION['loggedIn'] ) ) {
		$_SESSION['loggedIn'] = false;
	}
	
	if( isset( $_POST['password'] ) ) {
		if ( sha1( $_POST['password'] ) == $password ) {
			$_SESSION['loggedIn'] = true;
		} else {
			die('Incorrect password');
		}
	}
	
	if( !$_SESSION['loggedIn']):
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<title>Password Protected Page</title>
		<meta name="description" content="">
		<meta name="author" content="">
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.8.0/build/cssreset/cssreset-min.css">
		<style>
			
			html, body {
				height: 100%;
			}
			
			body {
				background: #f5f5f5;
				padding-top: 80px; 
			}
			
			h1 {
				color: #ff5544;
				font: bold 18px/28px Helvetica, Arial, sans-serif;
				padding-bottom: 15px;
				border-bottom: 1px solid #eee;
				margin-bottom: 10px; 
			}
			
			#box-signIn {
				width: 300px;
				background: #fff;
				padding: 30px 50px 50px 50px;
				border: 1px solid #eee; 
				margin: 0 auto;
			}
			
			@media only screen and (max-width: 479px) {
				#box-signIn {
					width: 240px; 
					padding: 20px 30px 30px 30px;
				}
			}
			
			form#signIn {
				
			}
			
				form#signIn label {
					color: #aaa; 
					font: normal 12px/22px Helvetica, Arial, sans-serif;
					text-transform: uppercase;
					letter-spacing: 2px; 
					display: block;
					margin: 25px 0 15px 0; 
				}
				
				form#signIn input[type="password"],
				form#signIn input[type="text"] {
					color: #333;
					border: 1px solid #eee;
					padding: 20px 9%; 
					width: 80%; 
					outline: none; 
					display: block; 
				}
				
					form#signIn input[type="password"]:focus,
					form#signIn input[type="text"]:focus {
						border: 1px solid #ff5544; 
					}
			
				form#signIn input.submit {
					color: #fff; 
					background: #ff5544; 
					font: bold 15px/25px Helvetica, Arial, sans-serif;
					text-transform: uppercase;
					letter-spacing: 2px; 
					margin-top: 40px; 
					width: 100%; 
					padding: 25px 0; 
					border: none; 
					cursor: pointer; 
										
					-moz-border-radius: 5px;
					-webkit-border-radius: 5px;
					border-radius: 5px; /* future proofing */
					-khtml-border-radius: 5px; /* for old Konqueror browsers */
				}
				
					form#signIn input.submit:hover {
						color: #ff5544; 
						background: #000; 
					}
					
		</style>
		
		
	</head>
	
	<body>
		<div id="box-signIn">
			<h1>Protected Page</h1>
			<form id="signIn" method="post">
				<label for="username" style="display: none;" >Username</label>
				<input type="text" id="username" name="username" style="display: none;" />
				
				<label for="password">Password</label>
				<input type="password" id="password" name="password" />
				<input type="submit" name="submit" class="submit" value="Sign In" />
			</form>
		</div>
	</body>
</html>
<?php 
	exit();
	endif;
?>
