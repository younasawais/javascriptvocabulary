<?php
/************ Initialize *********************/
ob_start();
include 'includes/classes.php';
session_start ();
include 'includes/initializeGrammar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grammar Quiz</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="css/grammar.css">

</head>
<body>

<div class="container col-sm-12 col-xs-12 col-md-12 col-lg-12">
  
  <div class="navi">
    <button onclick="test()">Go Back</button>
    <h5>GRAMMAR</h5>
    <button>Reset</button>
  </div></br>

  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">Main</a></li>
    <li><a href="#setup">setup</a></li>
  </ul>
<!-- ***** Tabs start ***** -->
  <div class="tab-content">
    <!-- ***** Tab Home ***** -->
    <div id="home" class="tab-pane fade in active">
      <!-- ***** Top 1 ***** -->
      <div class="top1 clearfix">
        <p>Nr : <span class="yellow" id="nr">2 / 25</span></p>
        <p>Status : <span class="yellow" id="status">Finished</span></p>
      </div>
      <!-- ***** Top 2 ***** -->
      <div class="top2">
        <p>Word : <span class="yellow" id="givenWord">xxx</span></p>
      </div>
      <!-- ***** Middle 1 ***** -->
      <div class="middle1">
        <input type="text" class="inputAnswer" placeholder="Translation"></br>
        <button id="buttonSubmitWord" onclick="submitWordButton()">Submit Word</button></br>
      </div>
      <!-- ***** Middle 2 ***** -->
      <div class="middle2">
        <p class="comment" id="comment">Correct answer & comment </p>
        <button id="buttonNext" onclick="startButton()">Start/Restart/Next</button></br>      
        <p>Correct     : <span class="green" id="correct">x</span></p>
        <p>Incorrect   : <span class="red" id="incorrect">x</span></p>
        <p>Tries left   : <span class="yellow" id="triesLeft">x</span></p>
      </div>
			<button onclick="showHint()" id="btnShowHint">Show Hint</button>
    </div>
    <!-- ***** Tab setup ***** -->
    <div id="setup" class="tab-pane fade">
      <!-- ***** Top 1 ***** -->
      <div class="top11">
        <p id="totalWords">Total words : <span class="yellow">x</span></p>
        <p id="afterFilter">After Filter : <span class="yellow">x</span></p>
        <p id="libraryName">Library name : <span class="yellow">x</span></p>
        <p id="randomActive">Random  : <span class="yellow">x</span></p>
      </div>
      <!-- ***** Middle 1 ***** -->
      <div class="middle">
      <p id="range">Range</p>
      <input type="number" id="startRange" placeholder="start range"></br>
      <input type="number" id="endRange" placeholder="end range"></br>

<!--       <p>Category</p>
      <select id="categorySelect" name="categorySelect"> <!--Supplement an id here instead of using 'text'-->
  <!--       <option value="category1">Value 1</option> 
        <option value="category2" selected>Value 2</option>
        <option value="category3">Value 3</option>
      </select> -->
      <p>Random</p>
      <select id="swift"> <!--Supplement an id here instead of using 'text'-->
        <option value="yes">Yes</option> 
        <option value="no" selected>No</option>
      </select>
<!--       <p>Mode</p>
      <select id="mode" name="mode"> <!--Supplement an id here instead of using 'text'
        <option value="word2trans">Word -> trans</option> 
        <option value="trans2word" selected>Trans -> Word</option>
        <option value="def2word" selected>Def -> Word</option>        
      </select> -->

      <button id="submitConfig" onclick="submitConfigButton()">Submit Configurations</button></br>
      </div>
    </div>
  </div>
      <div class="bottom">
				<h4 >DEBUG</h4>
				<button onclick="btnShowVars()" id="btnShowVars">SHOW VARIABLES</button>
				<div id="debugConfiguration"></div>
      </div>
</div>
<script>

<?php
	include "js/phpTojs.php";
	include "js/script.php";
	include "js/classes.php";
?>
	
</script>
</body>
</html>
