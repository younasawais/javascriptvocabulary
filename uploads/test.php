<form action="test.php" method="post">
	<select class="dropdown" name="dropdown">
		<option value="NL-EN" selected>DUTCH - ENGLISH</option>
		<option value="AR-EN">ARABIC - ENGLISH</option>
	</select></br>
	<input class="submitDropdown" type="submit" value="Submit" name="SubmitDropdown"/>
</form>

<?php 
	require_once '../includes/PHPExcel/Classes/PHPExcel.php';
	$temp = "test.xlsx";
	$excelReader = PHPExcel_IOFactory::createReaderForFile($temp);
	$excelObj = $excelReader->load($temp);
	$worksheet = $excelObj->getActiveSheet();
	$lastRow = $worksheet->getHighestRow();
	
	$temp2[0] = $worksheet->getCell('A'.'2')->getValue();
	$temp2[1] = $worksheet->getCell('B'.'2')->getValue();
	$temp2[2] = $worksheet->getCell('C'.'2')->getValue();
	$temp2[3] = $worksheet->getCell('D'.'2')->getValue();
	$temp2[4] = $worksheet->getCell('E'.'2')->getValue();
	$temp2[5] = $worksheet->getCell('F'.'2')->getValue();
	
	foreach ($temp2 as $i) {
		echo $i . "<br>";
	}
	
submitDropdown();

function submitDropdown(){
	if (isset($_POST['dropdown'])) {
		echo $_POST['dropdown'];
	}
}




// $excel = new PHPExcel();
// $excel->setActiveSheetIndex(0);
// $excel->setCellValue('A1','Hello');
// $excel->setCellValue('A2','World');
// $excel->getCell('B','5')->getValue();




?>