<?php include('server.php'); ?>
<DOCTYPE html>
	<html>
	<head>
	   <title>sign up</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    	<div class="header">
    		<h2>Log In</h2>
    	</div>
    	<form id="login" method="post" action="login.php">
         <!-- display validation errors here -->
            <?php include('errors.php'); ?>
    		<div class='input-group'>
    		  <label> Username</label>	
    		  <input type="text" name="username">
    		</div>
    		<div class='input-group'>
    		  <label> Password</label>	
    		  <input type="password" name="password">
    		</div>
    		<div class='input-group'>
    		 <button type="submit" name="login" class="btn">log in</button>
    		</div>
    		<p> Not yet a member? <a href="index.php">sign up</a></p>
    	</form>
    </body>
	</html>