
document.onload = initialize();
var fullWordList; 
var filteredList;
var config;
var showHide;

function initialize(){
  fullWordList    = new wordList(); 
  filteredList    = new wordList();
  config          = new configuration();
  config.status   ="default";
  showHide        = new showHideContent();
  debugVal();
  
}

/**************** Debug ******************/
function debugVal(){
  var debugConfiguration    = document.getElementById("debugConfiguration");
  debugConfiguration.innerHTML = 
    '<p>Nr : <span id="debugValues">' + config.nr + "</span></p>" + 
    '<p>Status : <span id="debugValues">' + config.status + "</span></p>" + 
    '<p>Library Name : <span id="debugValues">' + config.libraryName + "</span></p>" + 
    '<p>Tries Left : <span id="debugValues">' + config.triesLeft + "</span></p>" + 
    '<p>Category Selected : <span id="debugValues">' + config.categorySelected + "</span></p>" + 
    '<p>Start Range : <span id="debugValues">' + config.startRange + "</span></p>" + 
    '<p>End Range : <span id="debugValues">' + config.endRange + "</span></p>" + 
    '<p>Swift : <span id="debugValues">' + config.swift + "</span></p>" + 
    '<p>Mode : <span id="debugValues">' + config.mode + "</span></p>" + 
    '<p>Correct : <span id="debugValues">' + config.correct + "</span></p>" + 
    '<p>Incorrect : <span id="debugValues">' + config.incorrect +  "</span></p>";
}

/**************** reference code ******************/
  //filteredList.word = fullWordList.word.slice();
  //var newArray = oldArray.slice();
function test(){
  prompt("dasd");
}

/************** Show / Hide tabs *************/
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});