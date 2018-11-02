
function randomGen(){
	
	var paragraph = document.querySelector(".changeThis");
	paragraph.innerHTML = shuffleString();
}

function shuffleString() {
	var n = 9;
	var a = new Array("");
	for(var l = 0; l < n ; l++){
		a[l] = l;
	}
  

    for(var i = n - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
    return a.join("");
}



//   function shuffleString() {
//     var normalNumbers = new Array(0,1,2,3,4,5,6,7,8);
// 		var getsSmaller   = new Array(0,1,2,3,4,5,6,7,8);
// 		var randomArr     = new Array("");
// 		var end     			= normalNumbers.length()-1;
// 		var rand01;
// 		var random;
// 		for(z = 0 ; z < (normalNumbers.length() -1); z++){
// 			rand01 = Math.floor(Math.random()); //random val between 0 - 1
// 			random = rand01 * end;							// random between 0 - end
// 			randomArr[z] = getsSmaller[random];  // load random [2] to new array
			
// 		}
//       for(var i = randNumbers.length - 1; i > 0; i--) { // Go through the lentgh
        
//         var random = Math.floor(Math.random() * (i + 1));
//         randNumbers[i] = random;
// 				var tmp = randNumbers[i];
//         randNumbers[i] = randNumbers[random];
//         randNumbers[random] = tmp;
//       }
//       return randNumbers;
