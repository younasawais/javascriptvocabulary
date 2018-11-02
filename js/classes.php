function configuration(){
  this.nr               = 0;
  this.currentWord;
  this.givenWord;
  this.wrongAnswer      = false;
  this.comment          = "Press Start!";
  this.status; // default, after start, after confirm & no tries, after finished
  this.libraryName      = "<?php echo $_SESSION['library']?>";
  this.triesLeft        = 3;
  this.categorySelected;
  this.startRange       = 1;
  this.endRange         = filteredList.word.length;
  this.swift            = "no";
  this.mode             = "wordTrans";
  this.correct          = 0;
  this.incorrect        = 0;
  this.hints            = 0;
  this.hintValue        = "";
  this.debugDiv         = "hide";
  this.swiftVal         = "no"; //showHide.swiftVal;
}

function wordListFiltered(){
  this.word             = new Array("");
  this.translation1     = new Array("");
  this.translation2     = new Array("");
  this.synonym          = new Array("");
  this.definition1      = new Array("");
  this.definition2      = new Array("");
  this.example          = new Array("");
  this.example2         = new Array("");
  this.category         = new Array("");
  this.type             = new Array("");
}

function showHideContent(){
  var buttonNext        = document.getElementById("buttonNext");
  var buttonSubmitWord  = document.getElementById("buttonSubmitWord");
  var btnShowHint       = document.getElementById("btnShowHint");
  var inputAnswer       = document.getElementsByClassName("inputAnswer")[0];
  var comment           = document.getElementById("comment");
  var nr                = document.getElementById("nr");
  var givenWord         = document.getElementById("givenWord");
  var status            = document.getElementById("status");
  var correct           = document.getElementById("correct");
  var incorrect         = document.getElementById("incorrect");
  var startRange        = document.getElementById("startRange");
  var endRange          = document.getElementById("endRange");
  var triesLeft         = document.getElementById("triesLeft");
  var totalWords        = document.getElementById("totalWords");
  var afterFilter       = document.getElementById("afterFilter");
  var libraryName       = document.getElementById("libraryName");
  var categorySelect    = document.getElementById("categorySelect");
  var mode              = document.getElementById("mode");
  var submitConfig      = document.getElementById("submitConfig");
  var debugConfig       = document.getElementById("debugConfiguration");
  var swift             = document.getElementById("swift");
  var randomActive      = document.getElementById("randomActive");
  var swiftVal          = swift.options[swift.selectedIndex].text;
  /*<?php include 'js/showhide.php'; ?>*/
}