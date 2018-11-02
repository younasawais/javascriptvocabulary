<?php
ob_start();
include 'includes/classes.php';
include 'includes/connect.php';
session_start();
if (isset($_SESSION['logStatus'])) {				// check if user is logged in
	if ($_SESSION['logStatus'] == "loggedin") {
		header('Location: index.php');			// redirect to dashboard
	}
}
?>
<!DOCTYPE html>
<head>

	<!--<meta name=viewport
  content="width=device-width, initial-scale=1.0, minimum-scale=0.5 maximum-scale=1.0">-->
<link rel="stylesheet" href="css/login.css">
<title>Quiz Login</title>

</head>
<body>
  <div class="greyOutSide">
	  	<div class="greenInSide">
	    	<div class="login"><h1>LOGIN</h1></div>
	  	</div>
			<div class="greenInSide, middle" >
				<form action="login.php" method="POST">
					<label class="leftlabel">USERNAME</label>
					<label class="rightlabel">PASSWORD</label>
					
					<input class="usernameinput" type="text" name="username">					
					<input class="passwordinput" type="password" name="password">
					<input class="submit" type="submit" name="submit" value="SUBMIT">
					<div class="clearfix"></div>
				</form><br>
			</div>
			<div class="greenInSide">	
 <?php 

  
  if (isset($_POST['submit'])) {
  	if($_POST['username']<>"" && $_POST['password']<>""){
  		$login = checkLogin($_POST['username'], $_POST['password']);
  		if (isset($login['category'])){ //Double Check
  			?>
  			<div class="loggedin"><p>YOU'RE LOGGED IN!</p></div> 
  			<?php 
  			
  			$_SESSION['user'] = new user();
  			$_SESSION['user']->username = $login['name'];
  			$_SESSION['user']->password = $login['password'];
  			$_SESSION['user']->category = $login['category'];
  			$_SESSION['logStatus'] = "loggedin";
  			
			header('Location: index.php');			// redirect to dashboard
			 
  			//$_SESSION['user_id'] ;
  		}else{
  			?>
  			<div class="wronginput"><p>WRONG USERNAME OR PASSWORD</p></div>  
  			<?php 
  		}
  	}else{
  		?>
  		<div class="wronginput"><p>CHECK INPUT FIELDS PLEASE</p></div>  
  		<?php 
  	}
  }
  ?>
			</div>
  </div>

 </body>
</html>