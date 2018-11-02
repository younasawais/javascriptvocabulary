	function wordList(){
	<?php
		/*****  word transfer *****/
		echo "this.word = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->word[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  translation1 transfer *****/
		echo "this.translation1 = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->translate1[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  translation2 transfer *****/
		echo "this.translation2 = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->translate2[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  synonym transfer *****/
		echo "this.synonym = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->synonym[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  definition1 transfer *****/
		echo "this.definition1 = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->definition[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  definition2 transfer *****/
		echo "this.definition2 = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->definition2[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  example transfer *****/
		echo "this.example = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->example[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  example2 transfer *****/
		echo "this.example2 = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->example2[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
	?>
		
	<?php
		/*****  category transfer *****/
		echo "this.category = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->category[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
		?>
		
	<?php
		/*****  type transfer *****/
		echo "this.type = new Array(";
		
		for($i = 0 ; $i < count($_SESSION['wordList']->word) ; $i++){
			echo '"'.$_SESSION['wordList']->type[$i];
			if(($i+1) < count($_SESSION['wordList']->word)){
				echo '",';
			}
		}
		echo '");';
		?>
		}
