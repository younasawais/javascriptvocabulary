/*Ignore this*/

  this.getInput = function(){
    return inputAnswer;
  }

  this.getButtonSubmit = function(){
    return buttonSubmitWord;
  }

  this.getStartRange = function(){
    return startRange;
  }

  this.getEndRange = function(){
    return endRange;
  }

  this.getSwiftVal = function(){
    swiftVal = swift.options[swift.selectedIndex].text;
    return swiftVal;
  }
  
 this.checkStatus = function(){
    switch (config.status) {
      case "default":
        /** HIDE **/
        givenWord.style.display           = "none";
        buttonSubmitWord.style.display    = "none";
        btnShowHint.style.display         = "none";
        triesLeft.style.display           = "none";
        correct.style.display             = "none";
        incorrect.style.display           = "none";
        /** SHOW **/
        buttonNext.style.display          = "inline";
        submitConfig.style.display        = "inline";

        /** Value Next Button **/
        buttonNext.innerHTML              = "START";
        //comment.innerHTML = "Press Start";

          break;
      case "start":
        /** HIDE **/
        buttonNext.style.display          = "none";
        submitConfig.style.display        = "none";
        /** SHOW **/
        buttonSubmitWord.style.display    = "inline";
        givenWord.style.display           = "inline";
        btnShowHint.style.display         = "inline";
        triesLeft.style.display           = "inline";
        correct.style.display             = "inline";
        incorrect.style.display           = "inline";

        /** Value Next Button **/
        buttonNext.innerHTML              = "(hidden)";
 
          break;
      case "confirm":
        /** HIDE **/
        buttonSubmitWord.style.display    = "none";
        btnShowHint.style.display         = "none";
        submitConfig.style.display        = "none";

        /** SHOW **/
        givenWord.style.display           = "inline";
        buttonNext.style.display          = "inline";
        triesLeft.style.display           = "inline";
        correct.style.display             = "inline";
        incorrect.style.display           = "inline";

        /** Value Next Button **/
        buttonNext.innerHTML              = "NEXT";

          break;
      case "afterNext":
        /** HIDE **/
        buttonNext.style.display          = "none";
        submitConfig.style.display        = "none";
        btnShowHint.style.display         = "inline";

        /** SHOW **/
        givenWord.style.display           = "inline";
        buttonSubmitWord.style.display    = "inline";
        triesLeft.style.display           = "inline";
        correct.style.display             = "inline";
        incorrect.style.display           = "inline";

        /** Value Next Button **/
        buttonNext.innerHTML              = "(hidden)";

          break;
      case "finished":
        /** HIDE **/
        givenWord.style.display           = "none";
        buttonSubmitWord.style.display    = "none";
        triesLeft.style.display           = "none";
        correct.style.display             = "none";
        incorrect.style.display           = "none";
        btnShowHint.style.display         = "none";

        /** SHOW **/
        buttonNext.style.display          = "inline";
        submitConfig.style.display        = "inline";

        /** Value Next Button **/
        buttonNext.innerHTML              = "RESTART";
      }
      
/********  Update All values ********/
   nr.innerHTML               = (config.nr + 1) +" / "+filteredList.word.length;
   status.innerHTML           = config.status;
   correct.innerHTML          = config.correct;
   incorrect.innerHTML        = config.incorrect;
   triesLeft.innerHTML        = config.triesLeft;
   totalWords.innerHTML       = 'Total word : <span class="yellow">'+ fullWordList.word.length+"</span>";
   afterFilter.innerHTML      = 'After filter : <span class="yellow">'+ filteredList.word.length+"</span>";
   libraryName.innerHTML      = 'Library : <span class="yellow">' + config.libraryName+"</span>";
   givenWord.innerHTML        = config.givenWord;
   inputAnswer.value          = "";
   comment.innerHTML          = config.comment + config.hintValue;
   randomActive.innerHTML     = 'Random  : <span class="yellow">' + config.swiftVal +'</span>';
  
   /**** Show Hide Debug Div ****/
   if(config.debugDiv == "hide"){
     debugConfig.style.display = "none";
   }else if(config.debugDiv == "show"){
     debugConfig.style.display = "inline";
   }
   debugVal();  // Show variables after every button press
  } 





//Ignore this/*