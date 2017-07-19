<?php
require ("../conn.php");
$sjc = $_POST["sjc"];
$bhao = $_POST["bhao"];
$left = $_POST["left"];
$top = $_POST["top"];
$pageX1 = $_POST["pageX1"];
$pageY1 = $_POST["pageY1"];
$gclb = $_POST["gclb"];
if ($bhao) {
	$sql = "select * from 实测实量新建测点  where 测点编号='" . $bhao . "' and 时间戳='" . $sjc . "' and 项目类别='" . $gclb . "'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		$sqli = "update 实测实量新建测点 set pageX='$left', pageY='$top',pageX1='$pageX1', pageY1='$pageY1' where 测点编号='" . $bhao . "' and 时间戳='" . $sjc . "' and 项目类别='" . $gclb . "' ";
		if ($conn -> query($sqli) === TRUE) {
			$jsonresult = 'success';
		} else {
			$jsonresult = 'error';
		}
	} else {
		$jsonresult = '1';
	}

	$json = '{"result":"' . $jsonresult . '"}';
	echo $json;
	$conn -> close();

}
?>