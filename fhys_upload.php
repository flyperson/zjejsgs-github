<?php
require ("conn.php");
$sjc = $_POST["sjc"];
$xmid = $_POST["xmid"];
$gclb = $_POST["gclb"];
$mc = $_POST["mc"];
$sclb = $_POST["sclb"];
$checkId = $_POST["checkId"];

$filenames1 = explode( "~*^*~",$filenames);
for ($i = 1; $i < count($filenames1); $i++) {
	$sql = "select * from 测点布置附件表 where 测点附件='$filenames1[$i]' and 时间戳='" . $sjc . "' and 项目类别='".$gclb."' and 实测类别='".$sclb."'  ";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		$jsonresult = '1';
	} else {

		$sqli = "insert into 测点布置附件表 (测点附件,时间戳,建筑工程id,工程名称,项目类别,实测类别,质量检查id) values ('$filenames1[$i]','$sjc','$xmid','$mc','$gclb','$sclb','$checkId')";

		if ($conn -> query($sqli) === TRUE) {
			$jsonresult = 'success';
		} else {
			$jsonresult = 'error';
		}
 
	}
}

$json = '{"result":"' . $jsonresult . '"		
			}';
echo $json;
$conn -> close();
?>