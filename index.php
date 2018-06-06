<?php include('server.php'); ?>
<DOCTYPE html>
	<html>
	<head>
	   <title>sign up</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    	<div class="header">
    		<h2>sign up</h2>
    	</div>
    	<form id="login" method="post" action="index.php">
    		<!-- display validation errors here -->
    		<?php include('errors.php'); ?>
    		<div class='input-group'>
    		  <label> Username</label>	
    		  <input type="text" name="username" value="<?php echo $username; ?>">
    		</div>
    		<div class='input-group'>
    		  <label> Email</label>	
    		  <input type="text" name="email" value="<?php echo $email; ?>">
    		</div>
    		<div class='input-group'>
    		  <label> Password</label>	
    		  <input type="Password" name="password_1">
    		</div>
    		<div class='input-group'>
    		  <label> Confirm Password</label>	
    		  <input type="Password" name="password_2">
    		</div>
    		<div class='input-group'>
    		 <button type="submit" name="signup" class="btn">sign up</button>
    		</div>
    		<p> Already a member? <a href="login.php">sign in</a></p>
    	</form>
    </body>
	</html>