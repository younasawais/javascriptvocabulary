/* TODO : 
  - after next, example & correct still shows 
  - after next, the first word still shows and not next one
*/
document.onload = initialize();
var fullWordList; 
var filteredList;
var config;
var showHide;

function initialize(){
  fullWordList    = new wordList(); 
  filteredList    = new wordList();
  config          = new configuration();
  config.status   = "default";
  showHide        = new showHideContent();
  showHide.checkStatus();
}

/************** Button Start / Next  **********/
function startButton(){
  if(config.status == "default"){              // After default
    config.status         = "start";
    config.incorrect      = 0;
    config.correct        = 0;

		if(filteredList.translation2[config.nr] !== ""){ //check if trans 2 available
			config.givenWord      = 
								filteredList.translation1[config.nr] + "  OR  " + 
								filteredList.translation2[config.nr]; 
		}else{
			config.givenWord      = 
								filteredList.translation1[config.nr];
		}
		if(filteredList.synonym[config.nr] !== ""){   // add synonym to given word
			config.givenWord		 += ' (synonym : ' + filteredList.synonym[config.nr] + ' )';
		}
		
    config.comment        = 'Defenition : <span class="yellow">'  + filteredList.definition1[config.nr] + "</span>";
		if(filteredList.definition2[config.nr]!==""){     		 //if Definition 2 available, add to comment
			config.comment						 += '</span> <br> Definition 2: <span class="yellow">' +
                                    filteredList.definition2[config.nr];
		}
		config.comment			 += exampleHiddenWord();
    config.currentWord    = filteredList.word[config.nr];
    showHide.getInput().focus();
    showHide.getInput().select();
  } else if(config.status == "confirm"){       // After Confirm
    config.status         = "afterNext";
    config.nr++;
    config.currentWord    = filteredList.word[config.nr];
		if(filteredList.translation2[config.nr] !== ""){
			config.givenWord    = 
								filteredList.translation1[config.nr] + "  OR  " + 
								filteredList.translation2[config.nr];
		}else{
			config.givenWord    = 
								filteredList.translation1[config.nr];
		}
		if(filteredList.synonym[config.nr] !== ""){   // add synonym to given word
			config.givenWord	 += ' (synonym : ' + filteredList.synonym[config.nr] + ' )';
		}
    config.comment        = 'Defenition : <span class="yellow">'  + filteredList.definition1[config.nr];
		if(filteredList.definition2[config.nr]!==""){     		 //if Definition 2 available, add to comment
			config.comment		 += '</span> <br> Definition 2: <span class="yellow">' +
                                    filteredList.definition2[config.nr];
		}
		config.comment			 += exampleHiddenWord();
			/*'</span> <br> Example: <span class="yellow">' + filteredList.example[config.nr];  add this*/
    config.triesLeft      = 3;
    
  } else if(config.status == "finished"){      // After finished
    config.status         = "default";
    config.nr             = 0;
    config.triesLeft      = 3;
    config.givenWord      = "";
    config.comment        = "Set configuration & press start.";
    config.currentWord    = ""; 
  }

showHide.checkStatus();
}

/************** Submit Button  **********/
function submitWordButton(){
  var finished = false;
  showHide.getInput().value       = showHide.getInput().value.toLowerCase();  //input to lowercase
  config.currentWord              = config.currentWord.toLowerCase();
  
  if( config.currentWord == showHide.getInput().value ){ // Right answer
    config.correct++;
    
    if( filteredList.word.length == ( config.nr + 1 )){
      config.status               = "finished";
    }else{
      config.status               = "confirm";
    }
    config.hintValue              = "";
    config.hints                  = 0;
    config.comment                = 'Correct! <br>Example: <span class="yellow"> ' +
                                    filteredList.example[config.nr];
		if(filteredList.example2[config.nr]!==""){     		 //if example 2 available, add to comment
			config.comment						 += '</span> <br> Example 2: <span class="yellow">' +
                                    filteredList.example2[config.nr];
		}
    if( filteredList.word.length == ( config.nr + 1 )){  //If last word = finished
      config.status               = "default";
      config.triesLeft            = 3;
      config.hintValue            = "";
      config.hints                = 0;
      config.comment             += '<p>Correct = <span class="green">' + config.correct + '</span></p>'+
                                    '<p>Incorrect = <span class="red">' + config.incorrect + '</span></p>' + 
                                    '<p class="darkGreen">Please press Start or set configurations</p>';    
      finished                    = true;}
  }else if(config.triesLeft === 1){                     // Wrong answer & next try
    config.incorrect++;
    config.triesLeft--;
    config.hintValue              = "";
    config.hints                  = 0;
    config.comment                = 'Correct answer is : <span class="yellow">' + config.currentWord + 
                                    '</span> <br> Example: <span class="yellow">' +
                                    filteredList.example[config.nr];
		if(filteredList.example2[config.nr]!==""){     		 //if example 2 available, add to comment
			config.comment						 += '</span> <br> Example 2: <span class="yellow">' +
                                    filteredList.example2[config.nr];
		}
    if( filteredList.word.length == ( config.nr + 1 )){  //If last word = finished
      config.status               = "default";
      config.triesLeft            = 3;
      config.hintValue            = "";
      config.hints                = 0;
      config.comment             += '<p>Correct = <span class="green">' + config.correct + '</span></p>'+
                                    '<p>Incorrect = <span class="red">' + config.incorrect + '</span></p>' + 
                                    '<p class="darkGreen">Please press Start or set configurations</p>';    
      finished                    = true;
      
    }else{
      config.status               = "confirm";
    }
    
  }else{                                                 // Wrong answer & No tries left
    config.triesLeft--;
    config.wrongAnswer            = true;
    config.comment                = "Incorrect! You have " + config.triesLeft + " left!";
    config.hintValue              = "";
    config.hints                  = 0;
  }
  showHide.checkStatus();
  if(finished){
    config.nr                     = 0;
  }
}

/************** Return example hidden words *******/
function exampleHiddenWord(){
	var returnVal;
	var newExample1;
	var newExample2;
	newExample1 = filteredList.example[config.nr].replace(filteredList.word[config.nr]," ...("+filteredList.type[config.nr]+")"); 
	returnVal = '</span> <br> Example: <span class="yellow">' + newExample1 ;
	if( filteredList.example2[config.nr] !== "" ){ 														 // if second example available
		newExample2 = filteredList.example2[config.nr].replace(filteredList.word[config.nr]," ...("+filteredList.type[config.nr]+")"); 
		returnVal  += '</span> <br> Example 2: <span class="yellow">' + newExample2;
	}
	return returnVal;
}

/************** Button Show Hint  **********/
function showHint(){
  if( config.hints < config.currentWord.length ){
    config.hints++;
    config.hintValue       =  '<br>Hints :<span class="green"> ' +
                    config.currentWord.substring( 0, config.hints ) + "</span>";
   }else{
    config.hintValue       =  '<br>Hints :<span class="green"> ' + config.currentWord.substring( 0, config.hints ) + 
                              "</span><br>Max Hints Shown";
   }
  showHide.checkStatus();
} 

/************** Button Submit Config  **********/
function submitConfigButton(){
  updateFilteredList();
  showHide.checkStatus();
} 




/************** Filter All  **********/
function updateFilteredList(){
	filteredList    			= new wordList();
	if(showHide.getStartRange().value !== "" || showHide.getEndRange().value !== ""){
		  config.startRange     = Number(showHide.getStartRange().value) -1;
  		config.endRange       = Number(showHide.getEndRange().value);
		  var rangeLength = config.endRange - config.startRange;
  /*** Filter out range ***/
  for(var r = 0 ; r < rangeLength; r++){
    filteredList.word[r]          = fullWordList.word[config.startRange + r];
    filteredList.translation1[r]  = fullWordList.translation1[config.startRange + r];
    filteredList.translation2[r]  = fullWordList.translation2[config.startRange + r];
    filteredList.synonym[r]       = fullWordList.synonym[config.startRange + r];
    filteredList.definition1[r]   = fullWordList.definition1[config.startRange + r];
    filteredList.definition2[r]   = fullWordList.definition2[config.startRange + r];
    filteredList.example[r]       = fullWordList.example[config.startRange + r];
    filteredList.example2[r]      = fullWordList.example2[config.startRange + r];
    filteredList.category[r]      = fullWordList.category[config.startRange + r];
    filteredList.type[r]          = fullWordList.type[config.startRange + r];
  }
  /*** Delete last indexes ***/
  for(var s = 0 ; s < (fullWordList.word.length - rangeLength) ; s++){
    filteredList.word.pop();
    filteredList.translation1.pop();
    filteredList.translation2.pop();
    filteredList.synonym.pop();
    filteredList.definition1.pop();
    filteredList.definition2.pop();
    filteredList.example.pop();
    filteredList.example2.pop();
    filteredList.category.pop();
    filteredList.type.pop();
  }  
}

/*** If swift is "yes" ***/
config.swiftVal       = showHide.getSwiftVal();
if(config.swiftVal === "Yes"){
	var numbersMixed 		= randomOrder(filteredList.word.length - 1);
	var tempList 				= new wordListFiltered();

	for(var i = 0 ; i < filteredList.word.length ; i++){
		tempList.word[i] 					= filteredList.word[numbersMixed[i]];
		tempList.translation1[i] 	= filteredList.translation1[numbersMixed[i]];
		tempList.translation2[i] 	= filteredList.translation2[numbersMixed[i]];
		tempList.synonym[i] 			= filteredList.synonym[numbersMixed[i]];
		tempList.definition1[i] 	= filteredList.definition1[numbersMixed[i]];
		tempList.definition2[i] 	= filteredList.definition2[numbersMixed[i]];
		tempList.example[i] 			= filteredList.example[numbersMixed[i]];
		tempList.example2[i] 			= filteredList.example2[numbersMixed[i]];
		tempList.category[i] 			= filteredList.category[numbersMixed[i]];
		tempList.type[i] 					= filteredList.type[numbersMixed[i]];
	}

	for(i = 0 ; i < filteredList.word.length ; i++){
		filteredList.word[i]          = tempList.word[i];
		filteredList.translation1[i]  = tempList.translation1[i];
		filteredList.translation2[i]  = tempList.translation2[i];
		filteredList.synonym[i]       = tempList.synonym[i];
		filteredList.definition1[i]   = tempList.definition1[i];
		filteredList.definition2[i]   = tempList.definition2[i];
		filteredList.example[i]       = tempList.example[i];
		filteredList.example2[i]      = tempList.example2[i];
		filteredList.category[i]      = tempList.category[i];
		filteredList.type[i]          = tempList.type[i];
	}
 }  
}


/********** random order *************/
function randomOrder(lengthArray){
	var n = lengthArray + 1; //filteredList.word.length;
	var a = new Array("");
	for(var l = 0; l < n ; l++){
		a[l] = l;
	}
  
  for(var p = n - 1; p > 0; p--) {
      var j = Math.floor(Math.random() * (p + 1));
      var tmp = a[p];
      a[p] = a[j];
      a[j] = tmp;
  }
  return a;
}

/************** Show Hide Debug Div **********/
function btnShowVars(){
  if(config.debugDiv == "hide"){
    config.debugDiv = "show";
  }else if(config.debugDiv == "show"){
    config.debugDiv = "hide";
  }
  showHide.checkStatus();
}

/**************** Debug ******************/
function debugVal(){
  var debugConfiguration    = document.getElementById("debugConfiguration");
  debugConfiguration.innerHTML = 
    '<p>Nr : <span id="debugValues">' + config.nr + "</span></p>" + 
    '<p>Current Word : <span id="debugValues">' + config.currentWord + "</span></p>" + 
    '<p>input Answer : <span id="debugValues">' + showHide.getInput().value + "</span></p>" + 
    '<p>Given Word : <span id="debugValues">' + config.givenWord + "</span></p>" + 
    '<p>Wrong Answer : <span id="debugValues">' + config.wrongAnswer + "</span></p>" + 
    '<p>Status : <span id="debugValues">' + config.status + "</span></p>" + 
    '<p>Library Name : <span id="debugValues">' + config.libraryName + "</span></p>" + 
    '<p>Tries Left : <span id="debugValues">' + config.triesLeft + "</span></p>" + 
    '<p>Category Selected : <span id="debugValues">' + config.categorySelected + "</span></p>" + 
    '<p>Start Range : <span id="debugValues">' + config.startRange + "</span></p>" + 
    '<p>End Range : <span id="debugValues">' + config.endRange + "</span></p>" + 
    '<p>Mode : <span id="debugValues">' + config.mode + "</span></p>" + 
    '<p>Correct : <span id="debugValues">' + config.correct + "</span></p>" + 
    '<p>Incorrect : <span id="debugValues">' + config.incorrect +  "</span></p>" +
    '<p>Debug div : <span id="debugValues">' + config.debugDiv +  "</span></p>" +
    '<p>Hints : <span id="debugValues">' + config.hints +  "</span></p>" +
    '<p>Random : <span id="debugValues">' + config.swiftVal +  "</span></p>" +
    '<p>Filtered List length : <span id="debugValues">' + filteredList.word.length + "</span></p>";
}

/****** Enter Key ******/
document.getElementsByTagName("body")[0].addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    if( config.status == "start" || config.status == "afterNext"){
      document.getElementById("buttonSubmitWord").click();              // Submit Button
    }else if(config.status == "default" || config.status == "confirm" || config.status == "finished"){
      document.getElementById("buttonNext").click();                    // Start/Next button
    }
  }
}); 

/************** Show / Hide tabs *************/
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});

