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
<title>Grammar Exercise</title>
<link rel="stylesheet" type="text/css" href="css/import.css">

</head>
<body>
  <div class="greyOutSide">
    <div class="dashboard"><p>IMPORT - SELECT LIBRARY</p></div>
    <!--  SECOND SECTION -->
    <div class="second">
		<div class="second-left">
			<p>SELECT EXISTING LIBRARY</p>
			<form action="import.php" method="post">
				<select class="dropdown" name="dropdown">
					<option value="NL-EN" selected>DUTCH - ENGLISH</option>
					<option value="AR-EN">ARABIC - ENGLISH</option>
					<option value="TEST">TEST - APP</option>
				</select></br>
				<input class="submitDropdown" type="submit" value="Submit" name="SubmitDropdown"/>
			</form>
			<?php 
			$wordlistAvailable = submitDropdown("uploads/Library English-Dutch.xlsx");
			?>
			<div class="downloadXLS">
				<p> Excel template </p>
				<p><a href="http://www.localforces.com/javascriptlang/uploads/Library English-Dutch.xlsx"> Click here to download</a></p>
			</div>
			<p> UPLOAD Excel DOC:  </p>
			<form action="import.php" method="post" enctype="multipart/form-data">
				<input class="upload" type="file" name="Upload" id="fileToUpload"></br>
				<input class="submitUpload" type="submit" value="Submit" name="submitUpload">
			</form>
			<?php 
			$wordlistAvailable = uploadFile($wordlistAvailable);
			?>
		</div>
		<div class="second-right">
			<div class="second-right-first">
				<p>IMPORTED LIST </p>
			</div>
			<div class="second-right-second">
				<div class="second-right-second-left">
					<?php 
					showWords($wordlistAvailable);
					
					?>		
				</div>
				<div class="second-right-second-right">
					<p>ERRORS IN FILE</p>
					<p>- first sheet has problems</p>
					<p>- some cells are empty</p>
					<p>- only letters allowed</p>
					<p>- Check underneath cells</p>
					<p>A5, B17, B20..</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
    </div>
    <!--  THIRD SECTION -->
    <div class="third">
      <div class="third-one">
      	<form action="import.php" method="POST"><br>
		  <input value="GO BACK" class="exit" name="exit" type="submit">
		  <input value="RESTART" class="restart" name="restart" type="submit">
		</form>
		 <?php  goback();	
		 		restart();	?>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
 </body>
</html>

<?php 

function uploadFile($wordlistAvailable){
	if (isset($_POST['submitUpload'])) {
		// process the form data
		$tmp_file = $_FILES['Upload']['tmp_name'];                // tmp_name:name from local drive ,
		$target_file = basename($_FILES['Upload']['name']);    // name of the folder , base: filter bad chars
		$upload_dir = "uploads";
		if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {   // temp file name, upload directory, final saving name
			fileToServer($upload_dir."/".$target_file);
			$_SESSION['library'] = "CUSTOM LIBRARY";
			return "yes";
		} else {
			$error = $_FILES['Upload']['error'];           // save error of the uploading process
			return "no";
		}
	}else{
		return $wordlistAvailable;
	}		
}

function submitDropdown($file){
	if (isset($_POST['dropdown'])) {
		if ($_POST['dropdown']=="NL-EN") {
			$file = 'uploads/Library English-Dutch.xlsx';
			$_SESSION['library'] = $_POST['dropdown'];
			fileToServer($file);
			return "yes";
		}elseif($_POST['dropdown']=="AR-EN") {
			echo "Not yet setted";
		}elseif($_POST['dropdown']=="TEST") {
			$file = 'uploads/test.xlsx';
			$_SESSION['library'] = $_POST['dropdown'];
			fileToServer($file);
			return "yes";
		}
	}
	return "no";
}

/******************** XLSX to OBJECT in SESSION  ***************************/
function fileToServer($file){

/***** PHPExcel modules *******/
	require_once 'includes/PHPExcel/Classes/PHPExcel.php';
	$excelReader = PHPExcel_IOFactory::createReaderForFile($file);
	$excelObj = $excelReader->load($file);
	$worksheet = $excelObj->getActiveSheet();
	$lastRow = $worksheet->getHighestRow();
	
/***** XLSX to Objects *******/
	$_SESSION['wordList'] = new wordList();
	$columnWord = "notEmpty";
	for ($i = 2; $columnWord<>""; $i++) {
		$columnWord = $worksheet->getCell('A'."$i")->getValue();
		if($columnWord<>""){
			array_push($_SESSION['wordList']->word,$worksheet->getCell('A'."$i")->getValue());
			array_push($_SESSION['wordList']->translate1,$worksheet->getCell('B'."$i")->getValue());
			array_push($_SESSION['wordList']->translate2,$worksheet->getCell('C'."$i")->getValue());
			array_push($_SESSION['wordList']->synonym,$worksheet->getCell('D'."$i")->getValue());
			array_push($_SESSION['wordList']->definition,$worksheet->getCell('E'."$i")->getValue());
			array_push($_SESSION['wordList']->definition2,$worksheet->getCell('F'."$i")->getValue());
			array_push($_SESSION['wordList']->example,$worksheet->getCell('G'."$i")->getValue());
			array_push($_SESSION['wordList']->example2,$worksheet->getCell('H'."$i")->getValue());
			array_push($_SESSION['wordList']->category,$worksheet->getCell('I'."$i")->getValue());
			array_push($_SESSION['wordList']->type,$worksheet->getCell('J'."$i")->getValue());
		}else{
			//count($_SESSION['wordList']->word);
		}
	}
	/*** Load categories in session & delete duplicate ****/
	for ($i = 0; $i <= count($_SESSION['wordList']->word); $i++) {  		//Go through wordlist
		if(isset($_SESSION['wordList']->category[$i])){																// Check if not empty
			$inArray = in_array($_SESSION['wordList']->category[$i], $_SESSION['wordList']->categoryList);
			if (!$inArray) {	// Check if already exist in []
				array_push($_SESSION['wordList']->categoryList, $_SESSION['wordList']->category[$i]);	// Push in array
			}
		}
	}
	array_unshift($_SESSION['wordList']->categoryList,"ALL");
}

/******************** Show submitted words  ***************************/
function showWords($wordlistAvailable){
	if($wordlistAvailable=="no") {
		echo "<p>Total Words : <span>0<span> </p>";
		echo '<p style="color:#c6c425;">word = translate = definition </p>';
	}else{
		$_SESSION['words'] = count($_SESSION['wordList']->word);
		echo "<p>Total Words : <span>{$_SESSION['words']}<span> </p>";
		echo '<p style="color:#c6c425;">word = translate = definition </p>';
		for ($i = 0; $i < $_SESSION['words']; $i++) {
			echo "<p>". ($i+1) .". ";
			wordEmpty($_SESSION['wordList']->word[$i],$_SESSION['wordList']->translate1[$i]);
			wordEmpty($_SESSION['wordList']->translate1[$i],$_SESSION['wordList']->translate2[$i]);
			wordEmpty($_SESSION['wordList']->translate2[$i],$_SESSION['wordList']->synonym[$i]);
			wordEmpty($_SESSION['wordList']->synonym[$i],$_SESSION['wordList']->definition[$i]);
			wordEmpty($_SESSION['wordList']->definition[$i],$_SESSION['wordList']->example[$i]);
			wordEmpty($_SESSION['wordList']->example[$i],$_SESSION['wordList']->category[$i]);
			wordEmpty($_SESSION['wordList']->category[$i],"");
			echo "</p>";
			}
	  }
}

/******************** Don't show empty cells  ***************************/
function wordEmpty($empty,$next){ // echo if element is not emtpy
	if ($empty<>"") {
		echo $empty;
		if ($next<>"") {
			echo " : ";
		}
	}
}

/******************** Go back to dashboard  ***************************/
function goback(){
	if (isset($_POST['exit'])) {
		header('Location: index.php');			// redirect to dashboard
	}
}

/********************** Delete Session  ******************************/
function restart() {
	if (isset($_POST['restart'])) {
		$_SESSION['library'] ="Import/Select library";
		//$wordlistAvailable=="no";
		unset($_SESSION['wordList']);
	}
}

?>
