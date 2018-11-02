<!DOCTYPE html>
<html>
<head>
<title>Grammar Exercise</title>
<style>
/***** GENERAL *****/
*{
  margin: 0 0 0 0;
  padding: 0 0 0 0;
  font-family: Impact, Haettenschweiler, "Franklin Gothic Bold";}

.greyOutSide{
  width: 980px;
  min-height: 550px;
  background-color: #87deaa;
  margin-left: auto;
  margin-right: auto;  }

.greyOutSide * {
  margin-left: auto;
  margin-right: auto; }

/***** DASHBOARD *****/
.dashboard{
  text-align: center;
  font-size: 60px;
  width: 870px;
  letter-spacing: 10px;
  color: #c8c4b7;
  min-height: 88px;
  background-color: #165044; }

/******** FIRST *****/
.first{
  margin-top: 5px;
  padding-bottom: 10px;
  width: 870px;
  min-height: 60px;
  padding-top: 5px;
  background-color: #165044; }

.first p{
  color : #c8c4b7;
  margin-top: 15px;
  margin-left: 30px;
  font-size: 30px;
  letter-spacing: 2px;
}
.first p span{
  color : #e5ff80;
  margin-left: 10px;
  font-size: 30px;
}

.first .left{
  color : #e5ff80;
  margin-left: 10px;
  font-size: 30px;
  float: left;
}

.first .right{
  color : #e5ff80;
  margin-left: 10px;
  font-size: 30px;
  float: right;
}
.first .right p{
  color : #c8c4b7;
  margin-top: 15px;
  margin-right: 30px;
  font-size: 30px;
  letter-spacing: 2px;
}
/******* SECOND  *****/
.second{
  margin-top: 5px;
  padding-bottom: 10px;
  width: 870px;
  min-height: 60px;
  background-color: #165044; }

.second form label{
  color : #c8c4b7;
  margin-top: 15px;
  margin-left: 40px;
  font-size: 30px;
  letter-spacing: 2px;
}

.answer{
  color : #165044;
  text-align: center;
  margin-left: 20px;
  width: 380px;
  font-size: 30px;
  letter-spacing: 2px;
}

.submit{
  background-color: #0b2822;
  color : #aaffee;
  border: none;
  padding: 0 40px 0 40px;
  margin-left: 20px;
  font-size: 30px;
  letter-spacing: 2px;
}
/******** THIRD *****/
.third{
  margin-top: 5px;
  width: 870px;
  min-height: 400px;
  background-color: #165044; }

.third-one-left{
  float: left;
}
.third-one-right{
  float: right;
  height: 260px;
  width: 500px;
  background-color: #217867;
}

table{
  padding: 20px 0 0 20px;
  color : #c8c4b7;
  margin-top: 15px;
  margin-right: 30px;
  font-size: 20px;
  letter-spacing: 2px;
}
tr td:nth-child(2) {
  color: #e5ff80;
  padding: 5px 0 0 20px;
}

.third-one-right p:nth-child(1) {
  color: #800000;
  font-size: 50px;
  text-align: center;
  margin-top: 20px;
  letter-spacing: 5px;
}
.third-one-right p:nth-child(2) {
  color: #c8c4b7;
  font-size: 50px;
  text-align: center;
  margin-top: 10px;
  letter-spacing: 5px;
}
.third-one-right p:nth-child(3) {
  color: #e5ff80;
  font-size: 50px;
  text-align: center;
  margin-top: 10px;
  letter-spacing: 5px;
}

.showHint, .submitRange{
  background-color: #0b2822;
  color : #aaffee;
  border: none;
  padding: 5px 10px 2px 5px;
  margin-left: 0px;
  font-size: 20px;
  letter-spacing: 2px;
}

.third-two{
  margin: 50px 0 0 0;
}
.exit{
  width: 100px;
  height: 40px;
  color: #ffaaaa;
  font-size: 20px;
  background-color: #2b0000;
  float: left;
  border: none;
  margin-top: 80px;
}
.next{
  width: 200px;
  height: 60px;
  margin: 60px 0 0 250px;
  color: #aaffee;
  font-size: 30px;
  background-color: #0b2822;
  border: none;
}
.restart{
  width: 100px;
  height: 40px;
  float:  right;
  color: #ffaaaa;
  font-size: 20px;
  background-color: #2b0000;
  border: none;
  margin-top: 80px;
}
/******** Clearfix  ***********/
.clearfix:before,
.clearfix:after {
	content:"";
	display:table;}
    
.clearfix:after {
	clear:both;}
/******* End CSS *******/
/** Sample **/
/*
.blabla{
  color : green;
  margin-top: 5px;
  margin-left: 5px;
  padding-top: 5px;
  padding-bottom: 10px;}
*/
</style>
</head>
<body>
  <div class="greyOutSide">
    <div class="dashboard"><p>GRAMMAR TRAINING</p></div>
    <!--  FIRST SECTION -->
    <div class="first">
      <div class="left">
        <p>WORD : <span> XXXX</span></p>
      </div>
      <div class="right">
        <p>NR : <span> XX</span></p>
      </div>
      <div class="clearfix"></div>
    </div>    
    <!--  SECOND SECTION -->
    <div class="second">
     <form action="action_page.php"><br>
      <label>TRANSLATION  :</label>
      <input class="answer"type="text" name="answer">
      <input class="submit" type="submit" value="Submit">
     </form>
    </div>
    <!--  THIRD SECTION -->
    <div class="third">
      <div class="third-one">
        <div class="third-one-left">
           <table>
            <tr>
              <td>TOTAL WORDS :</td>
              <td>XXX</td>
            </tr>
            <tr>
              <td>START RANGE :</td>
              <td><input class="startRange"type="text" name="startRange"></td>
            </tr>
            <tr>
              <td>END RANGE :</td>
               <td><input class="endRange"type="text" name="endRange"></td>
            </tr>
            <tr>
              <td>
              <form action="action_page.php">
                <input class="submitRange" type="submit" value="Submit">
             </form>
              </td>
			   <td>XXX</td>
            </tr>
            <tr>
              <td>CORRECT :</td>
              <td>XXX</td>
            </tr>
            <tr>
              <td>INCORRECT :</td>
              <td>XXX</td>
            </tr>
            <tr>
              <td>PERCENTAGE :</td>
              <td>XXX</td>
            </tr>
            <tr>
              <td>TRIES LEFT :</td>
              <td>XXX</td>
            </tr>
            <tr>
              <td><button class="showHint">SHOW HINT </button></td>
              <td>XXX</td>
            </tr>
          </table>
        </div>
        <div class="third-one-right">
          <p>INCORRECT</p>
          <p>RIGHT ANSWER</p>
          <p>XXXXXXX</p>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <div class="third-two">
         <button class="exit">EXIT</button>
         <button class="next">NEXT</button>
         <button class="restart">RESTART</button>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
 </body>
</html>