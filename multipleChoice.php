<?php
/************ Initialize *********************/
ob_start();
include 'includes/classes.php';
session_start ();
include 'includes/initializeMulti.php';

$_SESSION["general"]->checkWordListAvailable (); // Redirect to dashboard if no wordList
$_SESSION["general"]->startNext ();
$_SESSION["general"]->submitAnswer ();
$_SESSION["general"]->goback ();
$_SESSION["general"]->restart ();
$_SESSION["general"]->submitRange ();
$_SESSION["general"]->submitCategory();
$_SESSION["general"]->submitMode();
$_SESSION["general"]->submitSelections();

$_SESSION['wordList']->initiateCyclus (); //TODO Initiate visibility values according to grammarStatus

?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/multipleChoice.css">
<title>multipleChoice Exercise</title>
</head>
<body>
	<div class="greyOutSide">
		<div class="dashboard">
			<p>MULTIPLE CHOICE</p>
		</div>
		<!--  FIRST SECTION -->
		<div class="first">
			<div class="left">
				<p>
					WORD/DEFINITION : <span> <?php echo $_SESSION['wordListFiltered']->translations() ?></span>
				</p>
			</div>
			<div class="right">
				<!-- <p>
					NR : <span>1</span> 
				</p> -->
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="third">
			<div class="third-one">
				<div class="third-one-left">
					<table>
						<tbody>
						<tr>
							<td>NR :</td>
							<td><?php echo ($_SESSION["currentNumber"]+1)?></td>
						</tr>
						<tr>
							<td>TOTAL WORDS :</td>
							<td><?php echo $_SESSION['words'];?></td>
						</tr>
						<tr>
							<td>AFTER FILTER:</td>
							<td><?php echo $_SESSION["wordList"]->totalWordsFiltered();?></td>
						</tr>
						<tr>
							<td>LIBRARY :</td>
							<td><?php echo $_SESSION['library'];?></td>
						</tr>
						<form action="multipleChoice.php" method="post">
							<tr>
								<td>START RANGE :</td>
								<td><input class="startRange" type="number" name="startRange"></td>
							</tr>
							<tr>
								<td>END RANGE :</td>
								<td><input class="endRange" type="number" name="endRange"></td>
							</tr>
							<tr>
								<td><input class="submitRange" type="submit"
									value="Submit Range" name="submitRange"
									<?php echo $_SESSION['visibility']->submitRangeButton() ?>></td>
								<td><?php echo "Range : ". $_SESSION['wordListFiltered']->startRange . " - ". $_SESSION['wordListFiltered']->endRange?></td>
							</tr>
						</form>
						<form action="multipleChoice.php" method="post">
							<tr>
								<td><input class="submitMode" type="submit" value="SET MODE" name="submitMode"></td>
								<td>
									<select class="dropdown" name="dropdownMode">
										<option value="wordToTrans">WORD -> TRANSL.</option>
										<option value="transToWord">TRANSL. -> WORD </option>
										<option value="defToWord">DEFIN. -> WORD</option>
										<option value="wordToDef">WORD -> DEFIN.</option>
									</select>
								</td>
							</tr>
						</form>
						<form action="multipleChoice.php" method="post">
							<tr>
								<td><input class="submitCategory" type="submit" value="SET CATEGORY" name="submitCategory"></td>
								<td>
									<select class="dropdown" name="dropdown"><?php $_SESSION["general"]->categorySelection();?>
									</select>
								</td>
							</tr>
						</form>
						<form action="multipleChoice.php" method="post">
							<tr>
								<td><input class="submitSelections" type="submit" value="SET SELECTION" name="submitSelections"></td>
								<td>
									<select class="dropdown" name="dropdownSelections">
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
								</td>
							</tr>
						</form>
						<tr>
							<td>CORRECT :</td>
							<td><?php echo $_SESSION['wordListFiltered']->totalRight() ?></td>
						</tr>
						<tr>
							<td>INCORRECT :</td>
							<td><?php echo $_SESSION['wordListFiltered']->totalWrong() ?></td>
						</tr>

					</tbody></table>
				</div>
				<div class="third-one-right">
					<form action="multipleChoice.php" method="POST">
					<?php
						$_SESSION['wordListFiltered']->multiSelections();
					?>
					</form>
					<p><?php echo $_SESSION["visibility"]->showBar()['valueLine1']?></p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<div class="third-two">
				<form action="multipleChoice.php" method="POST"><br> 
					<input value="GO BACK" class="exit" name="exit" type="submit">
					<?php $_SESSION['visibility']->startNextButton() ?>
					 
					<input value="RESTART" class="restart" name="restart" type="submit">
				</form>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</body></html>