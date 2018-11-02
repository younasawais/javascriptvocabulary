<?php
/************** Initialize *********************/
ob_start();
include 'includes/classes.php';
session_start();

if (!($_SESSION['logStatus'] == "loggedin")) {
	header('Location: login.php');			// redirect to dashboard;
}

if(!isset($_SESSION['library'])){
	$_SESSION['library'] = "Import/Select library";
}

if (isset($_SESSION['wordList'])) {
	$wordlistAvailable = "yes";
}else{
	$wordlistAvailable = "no";
}
?>
<!DOCTYPE html>
	<head>
	<link rel="stylesheet" href="css/dashboard.css">
		<header>
			<title>DASHBOARD</title>
		</header>
	</head>
<body>
  <div class="greyOutSide">
    <div class="dashboard"><p>DASHBOARD</p></div>
    <!--  FIRST SECTION -->
    <div class="first">
      <div class="left">
        <p>CURRENT LIBRARY :<span><?php echo $_SESSION['library'] ?></span></p>
      </div>
      <div class="right">
        <p>Words : <span><?php echo words($wordlistAvailable);?></span></p>
      </div>
      <div class="clearfix"></div>
    </div>    
    <!--  SECOND SECTION -->
    
    <!--  THIRD SECTION -->
    <div class="third">
      <div class="selection">
	    <form action="index.php" method="POST"><br>
	      <input value="IMPORT" class="import" name="importLib" type="submit">
	      <input value="GRAMMAR" class="grammar" name="grammar" type="submit">
	      <input value="MULTIPLECHOICE" class="multiplechoice" name="multiplechoice" type="submit">
	      <input value="SENTENCES" class="sentences" name="sentences" type="submit">
	     </form>
     	 <?php  importLib();	
     	 		grammar();
     	 		multiplechoice();
     	 		sentences();	?>
		</div>
		<div class="clearfix"></div>
		  <div class="third-two">
			 <form action="index.php" method="POST"><br>
			  <input value="LOGOUT" class="exit" name="exit" type="submit">
			  <input value="RESET" class="restart" name="restart" type="submit">
			 </form>
			 <?php  logout();	
			 		restart();	?>
			<div class="clearfix"></div>
		  </div>
    </div>
  </div>
</body>
</html>
 <style>
	/***** GENERAL *****/
</style>
</html>
<?php 

function logout(){
	if (isset($_POST['exit'])) {
		$_SESSION['logStatus'] ="";
		$_SESSION['library']   ="";
		session_destroy();
		header('Location: login.php');			// redirect to dashboard
	}	 
}

function restart() {
	if (isset($_POST['restart'])) {
		$_SESSION['library'] ="";
	}	
}

function importLib() {
	if (isset($_POST['importLib'])) {
		header('Location: import.php');			// redirect to import
	}
}

function grammar() {
	if (isset($_POST['grammar'])) {
		header('Location: grammar.php');			// redirect to grammar
	}
}

function multiplechoice() {
	if (isset($_POST['multiplechoice'])) {
		header('Location: multipleChoice.php');			// redirect to multiplechoice TODO
	}
}

function sentences() {
	if (isset($_POST['sentences'])) {
		//header('Location: sentences.php');			// redirect to sentences TODO
	}
}

function words($wordlistAvailable){
	if ($wordlistAvailable=="yes") {
		return $_SESSION['words'];
	}else{
		return "0";
	}
}
?>